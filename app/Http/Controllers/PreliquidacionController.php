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
        
    	$liquidacion=DB::table('odontograma as pre')
            ->join('profesional as pro','pro.idprofesional','=','pre.idprofesional')
            ->join('persona as per','per.idpersona','=','pro.idpersona')
            ->join('paciente as pac','pac.idpaciente','=','pre.idpaciente')
            ->join('persona as p','p.idpersona','=','pac.idpersona')
            //->where(DB::raw("(DATE_FORMAT(fechaRegistro,'%m'))"),$fecha)
            ->select('pre.idpaciente as idpaciente','pre.id','pre.ultimaliq','pre.idprofesional as idprofesional','pre.estados','pre.fecha_hora as fecha_hora', DB::raw('CONCAT(p.nombre, " ",p.apellido) AS pacientenombre'),DB::raw('CONCAT(per.nombre, " ",per.apellido) AS profesionalnombre'))->get();
            //->orderby('fechaRegistro','DESC')->take(1)->get();
            //dd($liquidacion);
        return view("profesional.liquidacion.create",["liquidaciones"=>$liquidacion]);
    }
    public function store(LiquidacionFormRequest $request)
    {
        $i = 0;
        $pres =0;
        $pac = 0;
        $fecha=Carbon::now();

        $prestacion = $request->get('prestaciones');
        $paciente = $request->get('paciente');
        $profesional = $request->get('profesional');


        foreach ($prestacion as $prest) {

            $prestaciones = explode("," , $prestacion[$pres]);

            foreach ($prestaciones as $pre) {

            $liquidacion=new Preliquidacion;
            $liquidacion->idprofesional = $profesional;
            $liquidacion->idpaciente = $paciente[$pac];
            $liquidacion->idprestacion = $pre;



            $obrasocial= Paciente::select('idobra_social')->where('idpaciente',$liquidacion->idpaciente)->
                select('idobra_social')->first();

            $coseguro = DB::table('prestacion_obrasocial as preo')
                ->join('prestacion as pre','pre.idprestacion','=','preo.idprestacion')
                ->where('pre.codigo','=',$pre)
                ->where('preo.idobrasocial','=',$obrasocial->idobra_social)
                ->select('preo.coseguro','preo.codigo')->first();
            //dd($pre);
            
            $liquidacion->idobrasocial=$obrasocial->idobra_social;
            $liquidacion->coseguro=$coseguro->coseguro;
            $liquidacion->codigo=$coseguro->codigo;
            $liquidacion->fecha=$fecha;
            $liquidacion->save();
            $i=$i+1;
            }

            $pres ++;
            $pac ++;
        }

        $ultimaliq = $request->get('ultimaliq');
        $idodonto = $request->get('idodontograma');

        $odontograma=Odontograma::findOrFail($idodonto);
        $odontograma->ultimaliq=$ultimaliq;
        $odontograma->update();

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


    }
}
