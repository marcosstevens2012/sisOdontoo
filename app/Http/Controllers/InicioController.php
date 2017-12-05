<?php

namespace sisOdonto\Http\Controllers;

use Illuminate\Http\Request;
use sisOdonto\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisOdonto\Http\Requests\IngresoFormRequest;
use sisOdonto\Ingreso;
use sisOdonto\Insumo;
use sisOdonto\DetalleIngreso;

use DB;
use Carbon\Carbon; //Fecha zona horaria
use Response;
use Illuminate\Support\Collection;

class InicioController extends Controller
{
	public function index(Request $request){


		if($request){
    		$query=trim($request->get('searchText'));
    		$ingresos=DB::table('ingreso as i')
    		->join('proveedor as p','i.idproveedor','=','p.idproveedor')
    		->join('persona as per','p.idpersona','=','per.idpersona')
    		->join('detalle_ingreso as di','i.idingreso','=','di.idingreso')
    		->select('i.idingreso','i.fecha_hora','per.nombre','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.impuesto','i.estado',DB::raw('sum(di.cantidad*precio_compra) as total'))
    		->where('i.num_comprobante','LIKE','%'.$query.'%')

    		->orderBy('i.idingreso','desc')
    		->groupBy('i.idingreso','i.fecha_hora','per.nombre','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.impuesto','i.estado')
    		->paginate(100);
    		return view('inicio.inicio.inicio',["ingresos"=>$ingresos,"searchText"=>$query]);}
    	}
    
}
