<?php

namespace sisOdonto\Http\Controllers;

use Illuminate\Http\Request;
use sisOdonto\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisOdonto\Http\Requests\liquidacionFormRequest;
use sisOdonto\Turno;
use sisOdonto\Paciente;
use sisOdonto\Liquidacion;
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
        
        $this->middleware('auth');

    }
    public function index(Request $request){
    	if($request){
    		$query=trim($request->get('searchText'));
    		$liquidacion=DB::table('todontograma')
            /*->join('profesional as pro','pro.idprofesional','=','liq.profesional')
            ->join('paciente as pac','pac.idpaciente','=','liq.paciente')
            ->join('obrasocial as obr','obr.idobrasocial','=','liq.idobrasocial')
            ->join('persona as p','p.idpersona','=','pac.idpersona')
            ->join('prestacion as pre','pre.idprestacion','=','liq.idprestacion')
            ->select('liq.*','pre.nombre as prestacion','obr.nombre as obrasocial', DB::raw('CONCAT(p.nombre, " ",p.apellido) AS pacientenombre'))*/
            ->get();

            
            //dd($liquidacion);
    		return view('profesional.liquidacion.index',["liquidaciones"=>$liquidacion, "searchText"=>$query]);
    	}
    }
    public function create(){
    	$liquidacion=DB::table('todontograma')
        ->get();
        return view("profesional.liquidacion.create",["liquidaciones"=>$liquidacion]);
    }
    public function store(LiquidacionFormRequest $request)
        
        {
        $liquidacion=new Liquidacion;
        $liquidacion->estado='Activo';
        $liquidacion->save();

        return Redirect::to('profesional/liquidacion'); //redirecciona a la vista turno

    }

            
           
     

    public function show($id){
        
    }
    public function destroy($id){

        
    }
}
