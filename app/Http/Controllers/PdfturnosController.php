<?php

namespace sisOdonto\Http\Controllers;

use Illuminate\Http\Request;
use sisOdonto\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisOdonto\Turno;
use sisOdonto\Persona;
use sisOdonto\Profesional;
use sisOdonto\Proveedor;
use Illuminate\Support\Facades\Auth;

use DB;
use PDF; 
use Carbon\Carbon; //Fecha zona horaria
use Response;
use Illuminate\Support\Collection;
use Dompdf\Dompdf;
use Dompdf\Options;


class PdfturnosController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //constructor
    public function __construct(){
    
    }
    public function index(Request $request)
    {    
            if($request){
            $query=trim($request->get('searchText'));
            $fechamax = Carbon::now();
            $fechamax = $fechamax->format('Y-m-d');
            return view('turno.pdfgeneral.show',["searchText"=>$query, "fechamax"=>$fechamax]);
        } 
    }
    

 
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

    $fecha=Carbon::now();

            $search=trim($request->get('searchText'));
            $fecha_inicio=trim($request->get('fecha_inicio'));
            $fecha_fin=trim($request->get('fecha_fin'));
            $estado=trim($request->get('estado'));

            $vistaurl="turno.pdfgeneral.show";

            if( $estado!="" && $search!=""  && $fecha_fin != "" && $fecha_inicio != ""){
                
                $turnos=DB::table('turno as t')
                ->join('profesional as pro','pro.idprofesional','=','t.idprofesional')
                ->join('persona as per','per.idpersona','=','pro.idpersona')
                ->join('paciente as pac','pac.idpaciente','=','t.idpaciente')
                ->join('persona as p','p.idpersona','=','pac.idpersona')
                ->join('prestacion as pre','pre.idprestacion','=','t.idprestacion')
                ->join('estado_turno as est','t.idestado','=','est.idestado_turno')

                ->where(function ($query) use ($search) {
                  $query = $query->orWhere('p.nombre','like','%'.$search.'%');
                  $query = $query->orWhere('est.nombre','like','%'.$estado.'%');
                  //$query = $query->orWhere('a.tags','like',"%$search%");
                });
                $turnos = $turnos->whereBetween('t.fecha_inicio', [$fecha_inicio, $fecha_fin])
                ->select('t.idturno', DB::raw('CONCAT(p.apellido, " ",p.nombre) AS paciente'), 't.idpaciente' ,'pre.nombre as prestacion',DB::raw('CONCAT(per.apellido, " ",per.nombre) AS profesional'), 't.idconsultorio as consultorio','est.estado as estado', 't.hora_inicio', 't.hora_fin', 't.fecha','t.tiempo_at','t.idestado')
                ->get();
              
            }
            if( $estado!="" && $search==""  && $fecha_fin != "" && $fecha_inicio != ""){
                
                $turnos=DB::table('turno as t')
                ->join('profesional as pro','pro.idprofesional','=','t.idprofesional')
                ->join('persona as per','per.idpersona','=','pro.idpersona')
                ->join('paciente as pac','pac.idpaciente','=','t.idpaciente')
                ->join('persona as p','p.idpersona','=','pac.idpersona')
                ->join('prestacion as pre','pre.idprestacion','=','t.idprestacion')
                ->join('estado_turno as est','t.idestado','=','est.idestado_turno')

                ->where(function ($query) use ($estado) {
               
                $query = $query->orWhere('t.estado','like','%'.$estado.'%');
                  //$query = $query->orWhere('a.tags','like',"%$search%");
                });
                $turnos = $turnos->whereBetween('t.fecha_inicio', [$fecha_inicio, $fecha_fin])
                 ->select('t.idturno', DB::raw('CONCAT(p.apellido, " ",p.nombre) AS paciente'), 't.idpaciente' ,'pre.nombre as prestacion',DB::raw('CONCAT(per.apellido, " ",per.nombre) AS profesional'), 't.idconsultorio as consultorio','est.estado as estado', 't.hora_inicio', 't.hora_fin', 't.fecha','t.tiempo_at','t.idestado')
                ->get();
              
            }
            if( $estado!="" && $search!=""  && $fecha_fin == "" && $fecha_inicio == ""){
                //dd($estado.'estado');
                $turnos=DB::table('turno as t')
                ->join('profesional as pro','pro.idprofesional','=','t.idprofesional')
                ->join('persona as per','per.idpersona','=','pro.idpersona')
                ->join('paciente as pac','pac.idpaciente','=','t.idpaciente')
                ->join('persona as p','p.idpersona','=','pac.idpersona')
                ->join('prestacion as pre','pre.idprestacion','=','t.idprestacion')
                ->join('estado_turno as est','t.idestado','=','est.idestado_turno')

                ->where(function ($query) use ($search) {
                  $query = $query->orWhere('p.nombre','like','%'.$search.'%');
                  //$query = $query->orWhere('p.estado','like','%'.$estado.'%');
                  //$query = $query->orWhere('a.tags','like',"%$search%");
                });
                $turno = $turnos->where('t.estado','like','%'.$estado.'%');
                $turnos = $turnos->select('t.idturno', DB::raw('CONCAT(p.apellido, " ",p.nombre) AS paciente'), 't.idpaciente' ,'pre.nombre as prestacion',DB::raw('CONCAT(per.apellido, " ",per.nombre) AS profesional'), 't.idconsultorio as consultorio','est.estado as estado', 't.hora_inicio', 't.hora_fin', 't.fecha','t.tiempo_at','t.idestado')
                ->get();
              
            }
               if( $estado!="" && $search==""  && $fecha_fin == "" && $fecha_inicio == ""){
                //dd($estado.'estado');
                $turnos=DB::table('turno as t')
                ->join('profesional as pro','pro.idprofesional','=','t.idprofesional')
                ->join('persona as per','per.idpersona','=','pro.idpersona')
                ->join('paciente as pac','pac.idpaciente','=','t.idpaciente')
                ->join('persona as p','p.idpersona','=','pac.idpersona')
                ->join('prestacion as pre','pre.idprestacion','=','t.idprestacion')
                ->join('estado_turno as est','t.idestado','=','est.idestado_turno')
                ->select('t.idturno', DB::raw('CONCAT(p.apellido, " ",p.nombre) AS paciente'), 't.idpaciente' ,'pre.nombre as prestacion',DB::raw('CONCAT(per.apellido, " ",per.nombre) AS profesional'), 't.idconsultorio as consultorio','est.estado as estado', 't.hora_inicio', 't.hora_fin', 't.fecha','t.tiempo_at','t.idestado')
                ->where('t.idestado','like','%'.$estado.'%');
                $turnos= $turnos->select('t.idturno', DB::raw('CONCAT(p.apellido, " ",p.nombre) AS paciente'), 't.idpaciente' ,'pre.nombre as prestacion',DB::raw('CONCAT(per.apellido, " ",per.nombre) AS profesional'), 't.idconsultorio as consultorio','est.estado as estado', 't.hora_inicio', 't.hora_fin', 't.fecha','t.tiempo_at','t.idestado')
                ->get();
              
            }
              if( $estado =="" && $search ==""  && $fecha_fin != "" && $fecha_inicio !=""){
                
                $turnos=DB::table('turno as t')
                ->join('profesional as pro','pro.idprofesional','=','t.idprofesional')
                ->join('persona as per','per.idpersona','=','pro.idpersona')
                ->join('paciente as pac','pac.idpaciente','=','t.idpaciente')
                ->join('persona as p','p.idpersona','=','pac.idpersona')
                ->join('prestacion as pre','pre.idprestacion','=','t.idprestacion')
                ->join('estado_turno as est','t.idestado','=','est.idestado_turno')
                ->whereBetween('t.fecha', [$fecha_inicio, $fecha_fin])
                ->select('t.idturno', DB::raw('CONCAT(p.apellido, " ",p.nombre) AS paciente'), 't.idpaciente' ,'pre.nombre as prestacion',DB::raw('CONCAT(per.apellido, " ",per.nombre) AS profesional'), 't.idconsultorio as consultorio','est.estado as estado', 't.hora_inicio', 't.hora_fin', 't.fecha','t.tiempo_at','t.idestado')
                ->get();
               
              
            }

              if( $estado =="" && $search ==""  && $fecha_fin == "" && $fecha_inicio == ""){
                
                $turnos=DB::table('turno as t')
                    ->join('profesional as pro','pro.idprofesional','=','t.idprofesional')
                    ->join('persona as per','per.idpersona','=','pro.idpersona')
                    ->join('paciente as pac','pac.idpaciente','=','t.idpaciente')
                    ->join('persona as p','p.idpersona','=','pac.idpersona')
                    ->join('prestacion as pre','pre.idprestacion','=','t.idprestacion')
                    ->join('estado_turno as est','t.idestado','=','est.idestado_turno')
                    
                    ->select('t.idestado')
                    ->select('t.idturno', DB::raw('CONCAT(p.apellido, " ",p.nombre) AS paciente'), 't.idpaciente' ,'pre.nombre as prestacion',DB::raw('CONCAT(per.apellido, " ",per.nombre) AS profesional'), 't.idconsultorio as consultorio','est.estado as estado', 't.hora_inicio', 't.hora_fin', 't.fecha','t.tiempo_at','t.idestado')
                ->get();
               
              
            }
            if( $estado =="" && $search !=""  && $fecha_fin == "" && $fecha_inicio == ""){
                
               $turnos=DB::table('turno as t')
                    ->join('profesional as pro','pro.idprofesional','=','t.idprofesional')
                    ->join('persona as per','per.idpersona','=','pro.idpersona')
                    ->join('paciente as pac','pac.idpaciente','=','t.idpaciente')
                    ->join('persona as p','p.idpersona','=','pac.idpersona')
                    ->join('prestacion as pre','pre.idprestacion','=','t.idprestacion')
                    ->join('estado_turno as est','t.idestado','=','est.idestado_turno')
                    
                    ->select('t.idestado')
                    ->select('t.idturno', DB::raw('CONCAT(p.apellido, " ",p.nombre) AS paciente'), 't.idpaciente' ,'pre.nombre as prestacion',DB::raw('CONCAT(per.apellido, " ",per.nombre) AS profesional'), 't.idconsultorio as consultorio','est.estado as estado', 't.hora_inicio', 't.hora_fin', 't.fecha','t.tiempo_at','t.idestado')
                    ->where('t.fecha','>',$fecha)
                    ->where('p.nombre','LIKE','%'.$search.'%')
                    
                    ->orwhere('per.nombre','LIKE','%'.$search.'%')
                    ->orwhere('per.apellido','LIKE','%'.$search.'%')
                    ->orwhere('p.apellido','LIKE','%'.$search.'%')
                    ->orderBy('t.fecha','asc')->get();
               
              
            
       }
       
        $options = new Options();
        $options->set('enable_html5_parser', true);
        $usuario=Auth::user()->name;
        $carbon = new \Carbon\Carbon();
        $date = $carbon->now();
        $date = $date->format('d-m-Y');
        $pdf=PDF::loadView('turno.pdfgeneral.index',['fecha_inicio'=>$fecha_inicio,'fecha_fin'=>$fecha_fin,'estado'=>$estado,'date'=>$date,'usuario'=>$usuario,"turnos"=>$turnos,"nombre_c"=>$search]);
         $pdf->setpaper('A4','landscape');

      return $pdf->stream('Turnos.pdf');

    }
     
    public function show($id){}
    
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
