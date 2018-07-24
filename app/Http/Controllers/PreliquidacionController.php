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
use sisOdonto\Todontograma;
use sisOdonto\Odontograma;
use sisOdonto\Detalleliquidacion;
use sisOdonto\Preliquidacion;
use DB;
use Carbon\Carbon; //Fecha zona horaria
use Response;
use Illuminate\Support\Collection;

class PreliquidacionController extends Controller
{
    //constructor
    public function __construct(){

        $this->middleware('auth');

    }
    public function index(Request $request){ 
        
    }
    public function create(){
        //$date = Carbon::now();
       // $fecha = strftime('%m');
        //$fechaa = $fecha - 01;
        
    	$liquidacion=DB::table('todontograma as pre')
            ->join('profesional as pro','pro.idprofesional','=','pre.CodigoProfesional')
            ->join('persona as per','per.idpersona','=','pro.idpersona')
            ->join('paciente as pac','pac.idpaciente','=','pre.CodigoPaciente')
            ->join('persona as p','p.idpersona','=','pac.idpersona')
            //->where(DB::raw("(DATE_FORMAT(fechaRegistro,'%m'))"),$fecha)
            ->select('pre.CodigoPaciente as idpaciente','pre.CodigoOdontograma', 'pre.CodigoProfesional as idprofesional','pre.estados','pre.fechaRegistro as fecha_hora','pre.ultimaliq', DB::raw('CONCAT(p.nombre, " ",p.apellido) AS pacientenombre'),DB::raw('CONCAT(per.nombre, " ",per.apellido) AS profesionalnombre'))->get();
            //->orderby('fechaRegistro','DESC')->take(1)->get();
            //dd($liquidacion);
        return view("profesional.liquidacion.create",["liquidaciones"=>$liquidacion]);
    }
    public function store(LiquidacionFormRequest $request)
    {
        $i = 0;
        $pres =0;
        $dien = 0;
        $pac = 0;
        $d = 0;
        

        $prestacion = $request->get('prestaciones');
        $paciente = $request->get('paciente');
        $profesional = $request->get('profesional');
        $diente = $request->get('dientes');
        $fecha=$request->get('fecha_hora');


        //dd($diente);
        //dd($prestacion);
        foreach ($prestacion as $prest) {

            //$prestaciones = explode("," , $prestacion[$pres]);
            //$dientes = explode(",", $diente[$dien]);
            //$dientes = $diente[$dien];
            //$prestaciones = $prestacion[$pres];

            //dd($prestaciones);
            //foreach ($prestaciones as $pre) {
            
            $liquidacion=new Preliquidacion;
            $liquidacion->idprofesional = $profesional;
            $liquidacion->idpaciente = $paciente[$pac];
            $liquidacion->idprestacion = $prest;
            $liquidacion->diente = $diente[$d]; 
            $d ++;

            $obrasocial= Paciente::select('idobra_social')->where('idpaciente',$liquidacion->idpaciente)->
                select('idobra_social')->first();

            $coseguro = DB::table('prestacion_obrasocial as preo')
                ->join('prestacion as pre','pre.idprestacion','=','preo.idprestacion')
                ->where('pre.codigo','=',$prest)
                ->where('preo.idobrasocial','=',$obrasocial->idobra_social)
                ->select('preo.coseguro','preo.codigo')->first();
            //dd($pre);
            
            $liquidacion->idobrasocial=$obrasocial->idobra_social;
            $liquidacion->coseguro=$coseguro->coseguro;
            $liquidacion->codigo=$coseguro->codigo;
            $liquidacion->fecha=$fecha[$i];
            $liquidacion->save();
            $i=$i+1;
            //}

            $pres ++;
            $pac ++;
            $dien ++;
        }
        //$ultimaliq = $request->get('ultimaliq');       
        
        $idodonto = $request->get('CodigoOdontograma');
        //dd($idodonto);

        $odontograma=todontograma::findOrFail($idodonto);
        foreach ($odontograma as $odontog) {
        $odontog->ultimaliq = '1';
        $odontog->update();
        }



        /*if ($obrasocial = '7'){
            $saldo = Paciente::findOrFail($liquidacion->idpaciente);
            $saldo->saldo = $request('costo');
            $saldo->save();
        }*/

        return Redirect::to('liquidacion/liquidacion'); //redirecciona a la vista turno

    }

    public function show($id){

    }
    public function destroy($id){

       //if($stock_cons->val3=="todo"){
        //Preliquidacion::findOrFail($id);
        //$turno->liquidado=('1');
        //$turno->update();
        $mate=Preliquidacion::select()->where('idprofesional','=',$id)->get();

        //dd($mate);

        foreach ($mate as $m) {
            //dd($m);
            
            $seg=Preliquidacion::findOrFail($m->id);
            $seg->liquidado=('1');
            //dd($seg);
            $seg->update();
            
        }
        
         return Redirect::to('liquidacion/liquidacion');

    }
}
