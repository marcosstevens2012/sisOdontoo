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
use sisOdonto\Detalleliquidacion;
use sisOdonto\Preliquidacion;

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
        $fecha=Carbon::now();

        if($request){
            $search=trim($request->get('searchText'));
            $fecha_inicio=trim($request->get('fecha_inicio'));
            $fecha_fin=trim($request->get('fecha_fin'));
            $estado=trim($request->get('estado_t'));
            $paciente=trim($request->get('paciente'));
            $profesional=trim($request->get('profesional'));
            $obra=trim($request->get('idobra_social'));
            //dd($profesional);

            if( $paciente!="" && $search ==""  && $fecha_fin == "" && $fecha_inicio == "" && $profesional != "" && $obra == ""){

                $liquidaciones=DB::table('preliquidacion as liq')
                ->join('profesional as pro','pro.idprofesional','=','liq.idprofesional')
                ->join('persona as per','per.idpersona','=','pro.idpersona')
                ->join('paciente as pac','pac.idpaciente','=','liq.idpaciente')
                ->join('obrasocial as obr','obr.idobrasocial','=','liq.idobrasocial')
                ->join('persona as p','p.idpersona','=','pac.idpersona')
                ->join('prestacion as pre','pre.codigo','=','liq.idprestacion')
                ->where('liq.idpaciente','=',$paciente)->where('liq.idprofesional','=',$profesional)
                ->select('liq.*','pre.nombre as prestacion','obr.nombre as obrasocial', DB::raw('CONCAT(p.nombre, " ",p.apellido) AS pacientenombre'),DB::raw('CONCAT(per.nombre, " ",per.apellido) AS profesionalnombre'))
                ->get();

                $pacientes = DB::table('persona as p')
                ->join('paciente as pac','p.idpersona','=','pac.idpersona')
                ->select('p.nombre as nombre','p.apellido as apellido','p.idpersona','pac.idpaciente','p.documento')
                ->where('pac.condicion','=','Activo')
                ->orderBy('p.apellido','asc')
                ->get();


            
                $profesional = DB::table('persona as p')
                ->join('profesional as pro','p.idpersona','=','pro.idpersona')
                ->join('consultorio as con','con.idconsultorio','=','pro.consultorio')
                ->select('p.nombre as nombre','p.apellido as apellido','p.idpersona','pro.idprofesional','con.numero as consultorio')
                ->orderBy('p.apellido','asc')
                ->get();

                $obra = DB::table('obrasocial')->get();

                return view('liquidacion.liquidacion.index',["liquidaciones"=>$liquidaciones, "searchText"=>$search, "fecha_inicio"=>$fecha_inicio, "fecha_fin"=>$fecha_fin,"estado"=>$estado,"obra"=>$obra,"paciente"=>$pacientes,"profesional"=>$profesional]);
            }


            if( $paciente=="" && $search==""  && $fecha_fin == "" && $fecha_inicio == "" && $profesional == "" && $obra == ""){

        		$liquidaciones=DB::table('preliquidacion as liq')
                ->join('profesional as pro','pro.idprofesional','=','liq.idprofesional')
                ->join('persona as per','per.idpersona','=','pro.idpersona')
                ->join('paciente as pac','pac.idpaciente','=','liq.idpaciente')
                ->join('obrasocial as obr','obr.idobrasocial','=','liq.idobrasocial')
                ->join('persona as p','p.idpersona','=','pac.idpersona')
                ->join('prestacion as pre','pre.codigo','=','liq.idprestacion')
                ->select('liq.*','pre.nombre as prestacion','obr.nombre as obrasocial', DB::raw('CONCAT(p.nombre, " ",p.apellido) AS pacientenombre'),DB::raw('CONCAT(per.nombre, " ",per.apellido) AS profesionalnombre'))
                ->get();

                $pacientes = DB::table('persona as p')
                ->join('paciente as pac','p.idpersona','=','pac.idpersona')
                ->select('p.nombre as nombre','p.apellido as apellido','p.idpersona','pac.idpaciente','p.documento')
                ->where('pac.condicion','=','Activo')
                ->orderBy('p.apellido','asc')
                ->get();


            
                $profesional = DB::table('persona as p')
                ->join('profesional as pro','p.idpersona','=','pro.idpersona')
                ->join('consultorio as con','con.idconsultorio','=','pro.consultorio')
                ->select('p.nombre as nombre','p.apellido as apellido','p.idpersona','pro.idprofesional','con.numero as consultorio')
                ->orderBy('p.apellido','asc')
                ->get();

                $obra = DB::table('obrasocial')->get();

    		    return view('liquidacion.liquidacion.index',["liquidaciones"=>$liquidaciones, "searchText"=>$search, "fecha_inicio"=>$fecha_inicio, "fecha_fin"=>$fecha_fin, "estado"=>$estado,"obra"=>$obra,"paciente"=>$pacientes,"profesional"=>$profesional]);
            }


            if( $paciente!="" && $search==""  && $fecha_fin == "" && $fecha_inicio == "" && $profesional == "" && $obra == ""){

                $liquidaciones=DB::table('preliquidacion as liq')
                ->join('profesional as pro','pro.idprofesional','=','liq.idprofesional')
                ->join('persona as per','per.idpersona','=','pro.idpersona')
                ->join('paciente as pac','pac.idpaciente','=','liq.idpaciente')
                ->join('obrasocial as obr','obr.idobrasocial','=','liq.idobrasocial')
                ->join('persona as p','p.idpersona','=','pac.idpersona')
                ->join('prestacion as pre','pre.codigo','=','liq.idprestacion')
                ->select('liq.*','liq.idpaciente','pre.nombre as prestacion','obr.nombre as obrasocial', DB::raw('CONCAT(p.nombre, " ",p.apellido) AS pacientenombre'),DB::raw('CONCAT(per.nombre, " ",per.apellido) AS profesionalnombre'))
                ->where('liq.idpaciente','=',$paciente)
                ->get();
                //dd($liquidaciones);
                $pacientes = DB::table('persona as p')
                ->join('paciente as pac','p.idpersona','=','pac.idpersona')
                ->select('p.nombre as nombre','p.apellido as apellido','p.idpersona','pac.idpaciente','p.documento')
                ->where('pac.condicion','=','Activo')
                ->orderBy('p.apellido','asc')
                ->get();
            
                $profesional = DB::table('persona as p')
                ->join('profesional as pro','p.idpersona','=','pro.idpersona')
                ->join('consultorio as con','con.idconsultorio','=','pro.consultorio')
                ->select('p.nombre as nombre','p.apellido as apellido','p.idpersona','pro.idprofesional','con.numero as consultorio')
                ->orderBy('p.apellido','asc')
                ->get();

                $obra = DB::table('obrasocial')->get();

        
                return view('liquidacion.liquidacion.index',["liquidaciones"=>$liquidaciones, "searchText"=>$search, "fecha_inicio"=>$fecha_inicio, "fecha_fin"=>$fecha_fin,"estado"=>$estado,"obra"=>$obra,"paciente"=>$pacientes,"profesional"=>$profesional]);
            
            }

            if( $paciente=="" && $search!=""  && $fecha_fin == "" && $fecha_inicio == "" && $profesional == "" && $obra == ""){

                $liquidaciones=DB::table('liquidacion as liq')
                ->join('profesional as pro','pro.idprofesional','=','liq.idprofesional')
                ->join('persona as per','per.idpersona','=','pro.idpersona')
                ->join('paciente as pac','pac.idpaciente','=','liq.idpaciente')
                ->join('obrasocial as obr','obr.idobrasocial','=','liq.idobrasocial')
                ->join('persona as p','p.idpersona','=','pac.idpersona')
                ->join('prestacion as pre','pre.codigo','=','liq.idprestacion')
                ->select('liq.*','liq.idpaciente','pre.nombre as prestacion','obr.nombre as obrasocial', DB::raw('CONCAT(p.nombre, " ",p.apellido) AS pacientenombre'),DB::raw('CONCAT(per.nombre, " ",per.apellido) AS profesionalnombre'))
                ->where('pre.nombre','=',$search)
                ->get();

                $pacientes = DB::table('persona as p')
                ->join('paciente as pac','p.idpersona','=','pac.idpersona')
                ->select('p.nombre as nombre','p.apellido as apellido','p.idpersona','pac.idpaciente','p.documento')
                ->where('pac.condicion','=','Activo')
                ->orderBy('p.apellido','asc')
                ->get();
            
                $profesional = DB::table('persona as p')
                ->join('profesional as pro','p.idpersona','=','pro.idpersona')
                ->join('consultorio as con','con.idconsultorio','=','pro.consultorio')
                ->select('p.nombre as nombre','p.apellido as apellido','p.idpersona','pro.idprofesional','con.numero as consultorio')
                ->orderBy('p.apellido','asc')
                ->get();

                $obra = DB::table('obrasocial')->get();

                
                return view('liquidacion.liquidacion.index',["liquidaciones"=>$liquidaciones, "searchText"=>$search, "fecha_inicio"=>$fecha_inicio, "fecha_fin"=>$fecha_fin,"estado"=>$estado,"obra"=>$obra,"paciente"=>$pacientes,"profesional"=>$profesional]);
            
            }

            if( $paciente=="" && $search==""  && $fecha_fin != "" && $fecha_inicio != "" && $profesional == "" && $obra == ""){

                $liquidaciones=DB::table('preliquidacion as liq')
                ->join('profesional as pro','pro.idprofesional','=','liq.idprofesional')
                ->join('persona as per','per.idpersona','=','pro.idpersona')
                ->join('paciente as pac','pac.idpaciente','=','liq.idpaciente')
                ->join('obrasocial as obr','obr.idobrasocial','=','liq.idobrasocial')
                ->join('persona as p','p.idpersona','=','pac.idpersona')
                ->join('prestacion as pre','pre.codigo','=','liq.idprestacion')
                ->whereBetween('liq.fecha', [$fecha_inicio, $fecha_fin])
                ->select('liq.*','liq.idpaciente','pre.nombre as prestacion','obr.nombre as obrasocial', DB::raw('CONCAT(p.nombre, " ",p.apellido) AS pacientenombre'),DB::raw('CONCAT(per.nombre, " ",per.apellido) AS profesionalnombre'))
                ->where('pre.nombre','=',$search)
                ->get();

                $pacientes = DB::table('persona as p')
                ->join('paciente as pac','p.idpersona','=','pac.idpersona')
                ->select('p.nombre as nombre','p.apellido as apellido','p.idpersona','pac.idpaciente','p.documento')
                ->where('pac.condicion','=','Activo')
                ->orderBy('p.apellido','asc')
                ->get();
            
                $profesional = DB::table('persona as p')
                ->join('profesional as pro','p.idpersona','=','pro.idpersona')
                ->join('consultorio as con','con.idconsultorio','=','pro.consultorio')
                ->select('p.nombre as nombre','p.apellido as apellido','p.idpersona','pro.idprofesional','con.numero as consultorio')
                ->orderBy('p.apellido','asc')
                ->get();

                $obra = DB::table('obrasocial')->get();

                
                return view('liquidacion.liquidacion.index',["liquidaciones"=>$liquidaciones, "searchText"=>$search, "fecha_inicio"=>$fecha_inicio, "fecha_fin"=>$fecha_fin,"estado"=>$estado,"obra"=>$obra,"paciente"=>$pacientes,"profesional"=>$profesional]);
            
            }

             if( $paciente=="" && $search==""  && $fecha_fin =="" && $fecha_inicio =="" && $profesional !="" && $obra !=""){

                $liquidaciones=DB::table('preliquidacion as liq')
                ->join('profesional as pro','pro.idprofesional','=','liq.idprofesional')
                ->join('persona as per','per.idpersona','=','pro.idpersona')
                ->join('paciente as pac','pac.idpaciente','=','liq.idpaciente')
                ->join('obrasocial as obr','obr.idobrasocial','=','liq.idobrasocial')
                ->join('persona as p','p.idpersona','=','pac.idpersona')
                ->join('prestacion as pre','pre.codigo','=','liq.idprestacion')
                ->select('liq.*','liq.idpaciente','pre.nombre as prestacion','obr.nombre as obrasocial', DB::raw('CONCAT(p.nombre, " ",p.apellido) AS pacientenombre'),DB::raw('CONCAT(per.nombre, " ",per.apellido) AS profesionalnombre'))
                ->where('pro.idprofesional','=',$profesional)
                ->where('obr.idobrasocial','=',$obra)
                ->get();

                $pacientes = DB::table('persona as p')
                ->join('paciente as pac','p.idpersona','=','pac.idpersona')
                ->select('p.nombre as nombre','p.apellido as apellido','p.idpersona','pac.idpaciente','p.documento')
                ->where('pac.condicion','=','Activo')
                ->orderBy('p.apellido','asc')
                ->get();
            
                $profesional = DB::table('persona as p')
                ->join('profesional as pro','p.idpersona','=','pro.idpersona')
                ->join('consultorio as con','con.idconsultorio','=','pro.consultorio')
                ->select('p.nombre as nombre','p.apellido as apellido','p.idpersona','pro.idprofesional','con.numero as consultorio')
                ->orderBy('p.apellido','asc')
                ->get();

                $obra = DB::table('obrasocial')->get();

                
                return view('liquidacion.liquidacion.index',["liquidaciones"=>$liquidaciones, "searchText"=>$search, "fecha_inicio"=>$fecha_inicio, "fecha_fin"=>$fecha_fin,"estado"=>$estado,"obra"=>$obra,"paciente"=>$pacientes,"profesional"=>$profesional]);
            
            }

             if( $paciente=="" && $search==""  && $fecha_fin =="" && $fecha_inicio =="" && $profesional =="" && $obra !=""){

                $liquidaciones=DB::table('preliquidacion as liq')
                ->join('profesional as pro','pro.idprofesional','=','liq.idprofesional')
                ->join('persona as per','per.idpersona','=','pro.idpersona')
                ->join('paciente as pac','pac.idpaciente','=','liq.idpaciente')
                ->join('obrasocial as obr','obr.idobrasocial','=','liq.idobrasocial')
                ->join('persona as p','p.idpersona','=','pac.idpersona')
                ->join('prestacion as pre','pre.codigo','=','liq.idprestacion')
                ->select('liq.*','liq.idpaciente','pre.nombre as prestacion','obr.nombre as obrasocial', DB::raw('CONCAT(p.nombre, " ",p.apellido) AS pacientenombre'),DB::raw('CONCAT(per.nombre, " ",per.apellido) AS profesionalnombre'))
                
                ->where('obr.idobrasocial','=',$obra)
                ->get();

                $pacientes = DB::table('persona as p')
                ->join('paciente as pac','p.idpersona','=','pac.idpersona')
                ->select('p.nombre as nombre','p.apellido as apellido','p.idpersona','pac.idpaciente','p.documento')
                ->where('pac.condicion','=','Activo')
                ->orderBy('p.apellido','asc')
                ->get();
            
                $profesional = DB::table('persona as p')
                ->join('profesional as pro','p.idpersona','=','pro.idpersona')
                ->join('consultorio as con','con.idconsultorio','=','pro.consultorio')
                ->select('p.nombre as nombre','p.apellido as apellido','p.idpersona','pro.idprofesional','con.numero as consultorio')
                ->orderBy('p.apellido','asc')
                ->get();

                $obra = DB::table('obrasocial')->get();

                
                return view('liquidacion.liquidacion.index',["liquidaciones"=>$liquidaciones, "searchText"=>$search, "fecha_inicio"=>$fecha_inicio, "fecha_fin"=>$fecha_fin,"estado"=>$estado,"obra"=>$obra,"paciente"=>$pacientes,"profesional"=>$profesional]);
            
            }
    	}
    }
    public function create(){
        $date = Carbon::now();
        
    	$liquidacion=DB::table('todontograma as pre')
            ->join('profesional as pro','pro.idprofesional','=','pre.codigoProfesional')
            ->join('persona as per','per.idpersona','=','pro.idpersona')
            ->join('paciente as pac','pac.idpaciente','=','pre.codigoPaciente')
            ->join('persona as p','p.idpersona','=','pac.idpersona')
            ->select('pre.codigoPaciente as idpaciente','pre.codigoOdontograma','pre.ultimaliq','pre.codigoProfesional as idprofesional','pre.estados','pre.fechaRegistro as fecha_hora', DB::raw('CONCAT(p.nombre, " ",p.apellido) AS pacientenombre'),DB::raw('CONCAT(per.nombre, " ",per.apellido) AS profesionalnombre'))
            ->orderby('fechaRegistro','DESC')->take(1)->get();
            dd($liquidacion->idprofesional);
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

            $liquidacion=new Liquidacion;
            $liquidacion->idprofesional = $profesional;
            $liquidacion->idpaciente = $paciente[$pac];
            $liquidacion->idprestacion = $pre;



            $obrasocial= Paciente::select('idobra_social')->where('idpaciente',$liquidacion->idpaciente)->
                select('idobra_social')->first();

            $coseguro = DB::table('prestacion_obrasocial as preo')
                ->join('prestacion as pre','pre.idprestacion','=','preo.idprestacion')
                ->where('pre.codigo','=',$pre)
                ->where('preo.idobrasocial','=',$obrasocial->idobra_social)
                ->select('preo.coseguro','preo.codigo','preo.orden')->first();
            //dd($pre);
            
            $liquidacion->idobrasocial=$obrasocial->idobra_social;
            $liquidacion->coseguro=$coseguro->coseguro;
            $liquidacion->orden=$coseguro->orden;
            $liquidacion->codigo=$coseguro->codigo;
            $liquidacion->estado='Activo';
            $liquidacion->fecha=$fecha;
            $liquidacion->save();
            $i=$i+1;
            }

            $pres ++;
            $pac ++;
        }

        $ultimaliq = $request->get('ultimaliq');
        $idodonto = $request->get('idodontograma');

        $odontograma=todontograma::findOrFail($idodonto);
        $odontograma->ultimaliq=$ultimaliq;
        $odontograma->update();

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
        $turno=Preliquidacion::findOrFail($id);
        $turno->liquidado=('1');
        $turno->update();
        
        
        return Redirect::to('liquidacion/liquidacion');

        
    }
}
