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


class PdfturnoController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //constructor
    public function __construct(){
    


    }
    public function index()
    {

            $turno=DB::table('turno as i')
            ->join('paciente as p','i.idpaciente','=','p.idpaciente')
            ->join('profesional as pro','pro.idprofesional','=','i.idprofesional')
            ->join('persona as per','per.idpersona','=','p.idpersona')
            ->join('prestacion as pre','pre.idprestacion','=','i.idprestacion')
            ->select('p.idproveedor','i.fecha_hora','per.nombre','per.apellido','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.impuesto','i.estado',DB::raw('sum(di.cantidad*precio_compra) as total'))
            ->groupBy('i.idingreso','i.fecha_hora','per.nombre','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.estado', 'p.idproveedor')
            ->paginate(7);
            return view('pdf.index',["turno"=>$turno]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    $vistaurl="turno.pdf.reporte_por_turno";
    $turnop=DB::table('turno as i')
            ->join('profesional as pro','pro.idprofesional','=','i.idprofesional')
            ->join('persona as per','per.idpersona','=','pro.idpersona')
            ->join('paciente as pac','pac.idpaciente','=','i.idpaciente')
            ->join('persona as p','p.idpersona','=','pac.idpersona')
            ->join('prestacion as pre','pre.idprestacion','=','i.idprestacion')
            ->where('i.idturno','=', $id)
            ->select(DB::raw('CONCAT(per.nombre," ",per.apellido) AS profesional'),
                    DB::raw('CONCAT(p.nombre," ",p.apellido) AS paciente'), 'i.fecha','i.hora_inicio', 'i.idestado', 
                    'i.idconsultorio','i.idturno')
         ->first();


    $date = Carbon::now();
    
    //dd($date);
    $view =  \View::make($vistaurl, compact('turnop', 'date'))->render();
    $pdf = \App::make('dompdf.wrapper');
    //$pdf->setPaper('A4');
    $pdf->setpaper('A4','landscape');
    $options = new Options();
    $options->set('enable_html5_parser', true);
    //$customPaper = array(0,0,500,700);
    //$pdf->set_paper($customPaper);
    $pdf->loadHTML($view);
    return $pdf->stream('reporte',["ventas"=>$turnop , "date"=>$date]);
    // return $this->crearPDF($venta, $vistaurl,$tipo);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
