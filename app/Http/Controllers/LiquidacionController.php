<?php

namespace sisOdonto\Http\Controllers;

use Illuminate\Http\Request;
use sisOdonto\Http\Requests;
use Illuminate\Database\Eloquent\Model;
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
    		$liquidaciones=DB::table('liquidacion')
            /*->join('profesional as pro','pro.idprofesional','=','liq.profesional')
            ->join('paciente as pac','pac.idpaciente','=','liq.paciente')
            ->join('obrasocial as obr','obr.idobrasocial','=','liq.idobrasocial')
            ->join('persona as p','p.idpersona','=','pac.idpersona')
            ->join('prestacion as pre','pre.idprestacion','=','liq.idprestacion')
            ->select('liq.*','pre.nombre as prestacion','obr.nombre as obrasocial', DB::raw('CONCAT(p.nombre, " ",p.apellido) AS pacientenombre'))*/
            ->get();

    		return view('profesional.liquidacion.index',["liquidaciones"=>$liquidaciones, "searchText"=>$query]);
    	}
    }
    public function create(){

    	$liquidacion=DB::table('preliquidacion')
            ->select('idprofesional','idpaciente','fecha_hora','estados')
            ->get();


        //foreach ($liquidacion as $liq) {
            //$resultado = count($liquidacion->estados);
            //$resul = $liq->fechaRegistro > $liq[$i-1]->fechaRegistro;
            //$resul = strlen($liq->estados);
            //dump($liq->estados);    
        //}
        
        return view("profesional.liquidacion.create",["liquidaciones"=>$liquidacion]);
    }
    public function store(LiquidacionFormRequest $request)    
    {
        $i = 0;
        

        $prestacion = $request->get('prestaciones');
        $paciente = $request->get('paciente');
        $profesional = $request->get('profesional');
        $prestaciones = explode("," , $prestacion[0]);
        //$i ++;
        $date = Carbon::now();
        $date->toDateString();

        //dd($paciente);
        /*$cont = 0;
            while ($cont < count($idarticulo)) {
                
                $cont=$cont+1;
        }*/ 

        foreach ($prestaciones as $pre) {
            $liquidacion=new Liquidacion;
            $liquidacion->fecha=$date; 
            $liquidacion->idprofesional = $profesional;
            $liquidacion->idpaciente = $paciente[0];
            $liquidacion->idprestacion = $pre;

            

            $obrasocial= Paciente::select('idobra_social')->where('idpaciente',$liquidacion->idpaciente)->
                select('idobra_social')->first();

            $coseguro = DB::table('prestacion_obrasocial as preo')
                ->where('preo.idprestacion','=',$pre)
                ->where('preo.idobrasocial','=',$obrasocial->idobra_social)
                ->select('preo.coseguro')->first();

            dump($coseguro);
            
            $liquidacion->idobrasocial=$obrasocial->idobra_social;
            $liquidacion->coseguro=$coseguro->coseguro;
            $liquidacion->estado='Activo';
            $liquidacion->save();
            $i=$i+1;
        }

        //dd($prestaciones);
        
        /*if ($obrasocial = '7'){
            $saldo = Paciente::findOrFail($liquidacion->idpaciente);
            $saldo->saldo = $request('costo');
            $saldo->save();
        }*/

        return Redirect::to('profesional/liquidacion'); //redirecciona a la vista turno

    }

    public function show($id){
        
    }
    public function destroy($id){

        
    }
}
