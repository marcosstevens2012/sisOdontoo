<?php

namespace sisOdonto\Http\Controllers;

use Illuminate\Http\Request;
use sisOdonto\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisOdonto\Turno;
use sisOdonto\Persona;
use sisOdonto\Profesional;
use sisOdonto\Paciente;

use sisOdonto\Liquidaciones;
use DB;
use PDF; 
use Carbon\Carbon; //Fecha zona horaria
use Response;
use Illuminate\Support\Collection;
use Dompdf\Dompdf;
use Dompdf\Options;


class PdfliquidacionesController extends Controller
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


            $profesionales = DB::table('persona as p')
	           ->join('profesional as pro','p.idpersona','=','pro.idpersona')
	           ->join('consultorio as con','con.idconsultorio','=','pro.consultorio')
	           ->select('p.nombre as nombre','p.apellido as apellido','p.idpersona','pro.idprofesional','con.numero as consultorio')
	           ->orderBy('p.apellido','asc')
	           ->get();
            return view('liquidacion.pdfliquidaciones.index',["searchText"=>$query, "fechamax"=>$fechamax, "profesionales"=>$profesionales]);
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
    $profesional=$request->get('profesionales');
    $estado =$request->get('estado');


    $vistaurl="liquidacion.Pdfliquidaciones.show";

    //dd($estado);
    if( $fecha_f == "" && $fecha_i == "" ){
    $liquidacion=DB::table('preliquidacion as l')
            ->join('profesional as pro','pro.idprofesional','=','l.idprofesional')
            ->join('persona as per','per.idpersona','=','pro.idpersona')
            ->join('paciente as pac','pac.idpaciente','=','l.idpaciente')
            ->join('persona as p','p.idpersona','=','pac.idpersona')
            ->join('prestacion as pre','pre.codigo','=','l.idprestacion')
            ->select('l.*',DB::raw('CONCAT(p.apellido, " ",p.nombre) AS paciente'), 'l.idpaciente' ,'pre.nombre as prestacion',DB::raw('CONCAT(per.apellido, " ",per.nombre) AS profesional'))
            ->get();
    }
    
    if( $fecha_f != "" && $fecha_i != "" ){
    $liquidacion=DB::table('preliquidacion as l')
            ->join('profesional as pro','pro.idprofesional','=','l.idprofesional')
            ->join('persona as per','per.idpersona','=','pro.idpersona')
            ->join('paciente as pac','pac.idpaciente','=','l.idpaciente')
            ->join('persona as p','p.idpersona','=','pac.idpersona')
            ->join('prestacion as pre','pre.codigo','=','l.idprestacion')
            ->select('l.*',DB::raw('CONCAT(p.apellido, " ",p.nombre) AS paciente'), 'l.idpaciente' ,'pre.nombre as prestacion',DB::raw('CONCAT(per.apellido, " ",per.nombre) AS profesional'))
            ->whereBetween('l.fecha',[$fecha_i, $fecha_f])
            ->get();
    }

    if( $profesional != "" && $estado == ""){

            $liquidacion=DB::table('preliquidacion as l')
            ->join('profesional as pro','pro.idprofesional','=','l.idprofesional')
            ->join('persona as per','per.idpersona','=','pro.idpersona')
            ->join('paciente as pac','pac.idpaciente','=','l.idpaciente')
            ->join('persona as p','p.idpersona','=','pac.idpersona')
            ->join('prestacion as pre','pre.codigo','=','l.idprestacion')
            ->select('l.*',DB::raw('CONCAT(p.apellido, " ",p.nombre) AS paciente'), 'l.idpaciente' ,'pre.nombre as prestacion',DB::raw('CONCAT(per.apellido, " ",per.nombre) AS profesional'))
            ->where('l.idprofesional','=',$profesional)
            ->get();
            //dd($liquidacion);
    }

    if( $profesional != "" && $estado != ""){

            $liquidacion=DB::table('preliquidacion as l')
            ->join('profesional as pro','pro.idprofesional','=','l.idprofesional')
            ->join('persona as per','per.idpersona','=','pro.idpersona')
            ->join('paciente as pac','pac.idpaciente','=','l.idpaciente')
            ->join('persona as p','p.idpersona','=','pac.idpersona')
            ->join('prestacion as pre','pre.codigo','=','l.idprestacion')
            ->select('l.*',DB::raw('CONCAT(p.apellido, " ",p.nombre) AS paciente'), 'l.idpaciente' ,'pre.nombre as prestacion',DB::raw('CONCAT(per.apellido, " ",per.nombre) AS profesional'))
            ->where('l.idprofesional','=',$profesional)
            ->where('l.liquidado','=',$estado)
            ->get();
            //dd($liquidacion);
    }

    $date = date_create($fecha_i);
    $fecha_inicio=date_format($date, 'd-m-Y');


    $date = date_create($fecha_f);
    $fecha_fin=date_format($date, 'd-m-Y');

    $date = Carbon::now();
    $usuario=\Auth::user()->name; 
    //dd($date);
    $view =  \View::make($vistaurl, compact('liquidacion', 'date','usuario','fecha_inicio','fecha_fin','profesional'))->render();
    $pdf = \App::make('dompdf.wrapper');
    $pdf->setPaper('A4','landscape');
    //$pdf->setOrientation('landscape');
    //$customPaper = array(0,0,500,700);

    //$pdf->setpaper($customPaper);
    $pdf->loadHTML($view);
    
    return $pdf->stream('reporte',['fecha_inicio'=>$fecha_inicio,'fecha_fin'=>$fecha_fin,'date'=>$date,'usuario'=>$usuario,"liquidacion"=>$liquidacion]);
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
        
    }
}
