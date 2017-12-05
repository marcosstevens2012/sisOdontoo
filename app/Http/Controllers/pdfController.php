<?php

namespace sisOdonto\Http\Controllers;

use Illuminate\Http\Request;
use sisOdonto\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisOdonto\Ingreso;
use sisOdonto\Persona;
use sisOdonto\DetalleIngreso;
use sisOdonto\Proveedor;
use DB;
use Dompdf\Dompdf;
use Carbon\Carbon; //Fecha zona horaria
use Response;
use Illuminate\Support\Collection;



class PdfController extends Controller
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

    		$ingreso=DB::table('ingreso as i')
    		->join('proveedor as p','i.idproveedor','=','p.idproveedor')
            ->join('persona as per','per.idpersona','=','p.idpersona')
    		->join('detalle_ingreso as di','i.idingreso','=','di.idingreso')
    		->select('p.idproveedor', 'i.idingreso','i.fecha_hora','per.nombre','per.apellido','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.impuesto','i.estado',DB::raw('sum(di.cantidad*precio_compra) as total'))
    		->orderBy('i.idingreso','desc')
    		->groupBy('i.idingreso','i.fecha_hora','per.nombre','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.estado', 'p.idproveedor')
    		->paginate(7);
    		return view('pdf.index',["ingresos"=>$ingreso]);
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
    $vistaurl="pdf.reporte_por_venta";
    $ventap=DB::table('ingreso as i')
         ->join('proveedor as p','i.idproveedor','=','p.idproveedor')
         ->join('persona as per','per.idpersona','=','p.idpersona')
         ->join('detalle_ingreso as di','di.idingreso','=','i.idingreso')
         ->where('p.idproveedor','=', $id)
         ->select((DB::raw('sum(di.cantidad*precio_compra) as total_venta')),'i.tipo_comprobante','i.fecha_hora','i.idproveedor','estado','i.idingreso')
         ->get();
    $date = date('Y-m-d');
    $view =  \View::make($vistaurl, compact('ventap', 'date', 'ventas'))->render();
    $pdf = \App::make('dompdf.wrapper');
    
    $pdf->loadHTML($view);
    return $pdf->stream('reporte',["ventas"=>$ventap]);
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
