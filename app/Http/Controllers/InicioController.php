<?php

namespace sisOdonto\Http\Controllers;

use Illuminate\Http\Request;
use sisOdonto\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

use sisOdonto\Http\Requests\IngresoFormRequest;
use Illuminate\Support\Facades\Validator;
use sisOdonto\Ingreso;
use sisOdonto\Turno;
use sisOdonto\Insumo;
use sisOdonto\DetalleIngreso;

use sisOdonto\Event;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use DB;
use Carbon\Carbon; //Fecha zona horaria
use Response;
use Illuminate\Support\Collection;

class InicioController extends Controller
{

     public function __construct(){
        
        $this->middleware('auth');

    }
	public function index(Request $request){

    		$turnos = DB::table('turno')
            ->count();
            $turnosconsultorio = DB::table('turno')
            ->where('idestado','=',3)
            ->count();

            $turnospendientes = DB::table('turno')
            ->join('estado_turno as est','est.idestado_turno','=','turno.idestado')
            ->select('turno.*')
    		->where('est.estado','=','Pendiente')
      		->count();

            $finalizados = DB::table('turno')
            ->join('estado_turno as est','est.idestado_turno','=','turno.idestado')
            ->select('turno.*')
            ->where('est.estado','=','Finalizado')
            ->count();

            $usuarioactual=\Auth::user();
        
                $events = [];
                $data = Turno::all();
                if($data->count()) {
                    foreach ($data as $key => $value) {
                        $events[] = Calendar::event(
                            $value->idpaciente,
                            true,
                            new \DateTime($value->fecha),
                            new \DateTime($value->fecha.' +1 day'),
                            null,
                            // Add color and link on event
                         [
                             'color' => '#33D7FF',
                             'url' => 'pass here url and any route',
                         ]
                        );
                    }
                
            $calendar = Calendar::addEvents($events);

                
    		return view('inicio.inicio.inicio',["espera"=> $turnosconsultorio, "turnos"=>$turnospendientes, "turnostotales"=>$turnos, "calendar"=>$calendar,"finalizados"=>$finalizados, "usuario"=>$usuarioactual]);}
    	}
    
}
