<?php

namespace sisOdonto\Http\Controllers;

use Illuminate\Http\Request;
use sisOdonto\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisOdonto\Http\Requests\liquidacionFormRequest;
use sisOdonto\Turno;
use sisOdonto\Paciente;
use sisOdonto\Profesional;
use sisOdonto\Detalleliquidacion;

use DB;
use Carbon\Carbon; //Fecha zona horaria
use Response;
use Illuminate\Support\Collection;

class LiquidacionController extends Controller
{
    //constructor
    public function __construct(){

    }
    public function index(Request $request){
    	if($request){
    		$query=trim($request->get('searchText'));
    		$liquidacion=DB::table('turno as tur')
    		->join('profesional as p','tur.idprofesional','=','p.idprofesional')
            ->join('paciente as pac','pac.idpaciente','=','tur.idpaciente')
            ->join('persona as per','p.idpersona','=','per.idpersona')
            ->join('obrasocial as obr','obr.idobrasocial','=','pac.idobra_social')
            ->join('prestacion as pre','pre.idprestacion','=','tur.idprestacion')
    		->select('tur.*','per.nombre as profesional','per.apellido','obr.nombre as obrasocial','pre.nombre as prestacion','tur.idprofesional')
    		->paginate(100);
            
    		return view('profesional.liquidacion.index',["liquidaciones"=>$liquidacion,"searchText"=>$query]);
    	}
    }
    public function create(){
    	$persona=DB::table('persona as p')
        ->join('mecanico as mec','mec.idpersona','=','p.idpersona')
        ->where('p.condicion','=','Activo')
        ->get();
        $pieza=DB::table('pieza as pie')
        ->get();
        return view("mecanico.liquidacion.create",["personas"=>$persona,"piezas"=>$pieza]);
    }
    public function store(liquidacionFormRequest $request){
        
            
            $liquidacion = new liquidacion;
            $liquidacion->idmecanico=$request->get('idmecanico');
            $mytime = Carbon::now();
            $liquidacion->fecha_hora = $mytime->toDateTimeString();
            $liquidacion->estado='Activo';
            $liquidacion->observaciones=$request->get('observaciones');
            $liquidacion->save();

            $idpieza=$request->get('idpieza');
            $cantidad = $request->get('cantidad');
            
            //recorre los articulos agregados
            $cont = 0;
            while ($cont < count($idpieza)) {
                # code...
                    $detalle = new Detalleliquidacion();
                    $detalle->idliquidacion=$liquidacion->idliquidacion;
                    $detalle->idpieza=$idpieza[$cont];
                    $detalle->cantidad=$cantidad[$cont];
                    $detalle->save();
                    $cont=$cont+1;
            }
       
           
        return Redirect::to('mecanico/liquidacion');
    }

    public function show($id){
        
    }
    public function destroy($id){

        
    }
}
