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
            return view('turno.pdfgeneral.index',["searchText"=>$query, "fechamax"=>$fechamax]);
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

    $fecha_i=$request->get('fecha_inicio');
    $fecha_f=$request->get('fecha_fin');
    $estado_t=$request->get('estado_t');

    $vistaurl="turno.pdfgeneral.show";


    $turnop=DB::table('turno as t')
            ->select('t.idturno')
            ->whereBetween('t.fecha',[$fecha_i, $fecha_f])
            ->orderBy('t.idturno','desc')
            ->paginate(7);

    if($estado_t=='1'){
             // dd('En Espera');
                $turnos=DB::table('turno as t')
                ->join('profesional as pro','pro.idprofesional','=','t.idprofesional')
                ->join('persona as per','per.idpersona','=','pro.idpersona')
                ->join('paciente as pac','pac.idpaciente','=','t.idpaciente')
                ->join('persona as p','p.idpersona','=','pac.idpersona')
                ->join('prestacion as pre','pre.idprestacion','=','t.idprestacion')
                ->join('estado_turno as est','t.idestado','=','est.idestado_turno')
                //de la union eligo los campos que requiero
                ->select('t.idestado')
                ->select('t.idturno', DB::raw('CONCAT(p.apellido, " ",p.nombre) AS paciente'), 't.idpaciente' ,'pre.nombre as prestacion',DB::raw('CONCAT(per.apellido, " ",per.nombre) AS profesional'), 't.idconsultorio as consultorio','est.estado as estado', 't.hora_inicio', 't.hora_fin', 't.fecha','t.tiempo_at','t.idestado')
                ->whereBetween('t.fecha', [$fecha_i, $fecha_f])
                ->where('t.idestado','=',1)->get();
                
              $estado_filtro='Pendiente';
            }

    if($estado_t=='2'){
             // dd('En Espera');
                $turnos=DB::table('turno as t')
                ->join('profesional as pro','pro.idprofesional','=','t.idprofesional')
                ->join('persona as per','per.idpersona','=','pro.idpersona')
                ->join('paciente as pac','pac.idpaciente','=','t.idpaciente')
                ->join('persona as p','p.idpersona','=','pac.idpersona')
                ->join('prestacion as pre','pre.idprestacion','=','t.idprestacion')
                ->join('estado_turno as est','t.idestado','=','est.idestado_turno')
                //de la union eligo los campos que requiero
                ->select('t.idestado')
                ->select('t.idturno', DB::raw('CONCAT(p.apellido, " ",p.nombre) AS paciente'), 't.idpaciente' ,'pre.nombre as prestacion', DB::raw('CONCAT(per.apellido, " ",per.nombre) AS profesional'), 't.idconsultorio as consultorio','est.estado as estado', 't.hora_inicio', 't.hora_fin', 't.fecha','t.tiempo_at','t.idestado')
                ->whereBetween('t.fecha', [$fecha_i, $fecha_f])
                ->where('t.idestado','=',2)->get();
                
              $estado_filtro='Finalizado';
            }

    if($estado_t=='3'){
             // dd('En Espera');
                $turnos=DB::table('turno as t')
                ->join('profesional as pro','pro.idprofesional','=','t.idprofesional')
                ->join('persona as per','per.idpersona','=','pro.idpersona')
                ->join('paciente as pac','pac.idpaciente','=','t.idpaciente')
                ->join('persona as p','p.idpersona','=','pac.idpersona')
                ->join('prestacion as pre','pre.idprestacion','=','t.idprestacion')
                ->join('estado_turno as est','t.idestado','=','est.idestado_turno')
                //de la union eligo los campos que requiero
                ->select('t.idestado')
                ->select('t.idturno', DB::raw('CONCAT(p.apellido, " ",p.nombre) AS paciente'), 't.idpaciente' ,'pre.nombre as prestacion',DB::raw('CONCAT(per.apellido, " ",per.nombre) AS profesional'), 't.idconsultorio as consultorio','est.estado as estado', 't.hora_inicio', 't.hora_fin', 't.fecha','t.tiempo_at','t.idestado')
                ->whereBetween('t.fecha', [$fecha_i, $fecha_f])
                ->where('t.idestado','=',3)->get();
                
              $estado_filtro='Cancelado';
            }

    if($estado_t=='4'){
             // dd('En Espera');
                $turnos=DB::table('turno as t')
                ->join('profesional as pro','pro.idprofesional','=','t.idprofesional')
                ->join('persona as per','per.idpersona','=','pro.idpersona')
                ->join('paciente as pac','pac.idpaciente','=','t.idpaciente')
                ->join('persona as p','p.idpersona','=','pac.idpersona')
                ->join('prestacion as pre','pre.idprestacion','=','t.idprestacion')
                ->join('estado_turno as est','t.idestado','=','est.idestado_turno')
                //de la union eligo los campos que requiero
                ->select('t.idestado')
                ->select('t.idturno', DB::raw('CONCAT(p.apellido, " ",p.nombre) AS paciente'), 't.idpaciente' ,'pre.nombre as prestacion',DB::raw('CONCAT(per.apellido, " ",per.nombre) AS profesional'), 't.idconsultorio as consultorio','est.estado as estado', 't.hora_inicio', 't.hora_fin', 't.fecha','t.tiempo_at','t.idestado')
                ->whereBetween('t.fecha', [$fecha_i, $fecha_f])->get();
                
              $estado_filtro='Cancelado';
            }
    //dd($turnos);
    $date = date_create($fecha_i);
    $fecha_inicio=date_format($date, 'd-m-Y');


    $date = date_create($fecha_f);
    $fecha_fin=date_format($date, 'd-m-Y');

    $date = Carbon::now();
    $usuario=\Auth::user()->name; 
    //dd($date);
    $view =  \View::make($vistaurl, compact('turnos', 'date','usuario','fecha_inicio','fecha_fin','estado_filtro'))->render();
    $pdf = \App::make('dompdf.wrapper');
    //$pdf->setPaper('A4');
    $pdf->setOrientation('landscape');
    $customPaper = array(0,0,500,700);

    $pdf->setpaper($customPaper);
    $pdf->loadHTML($view);
    
    return $pdf->stream('reporte',['fecha_inicio'=>$fecha_inicio,'fecha_fin'=>$fecha_fin,'date'=>$date,'usuario'=>$usuario,"turnos"=>$turnos,"estado_filtro"=>$estado_filtro]);
    // return $this->crearPDF($venta, $vistaurl,$tipo);

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
