<?php

namespace sisOdonto\Http\Controllers;

use Illuminate\Http\Request;
use sisOdonto\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisOdonto\Http\Requests\IngresoFormRequest;
use sisOdonto\Ingreso;
use sisOdonto\Insumo;
use sisOdonto\DetalleIngreso;

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


		if($request){
    		$query=trim($request->get('searchText'));
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
            
    		return view('inicio.inicio.inicio',["turnos"=>$turnospendientes,"finalizados"=>$finalizados, "searchText"=>$query]);}
    	}
    
}
