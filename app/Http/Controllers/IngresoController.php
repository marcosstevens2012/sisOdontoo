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

class IngresoController extends Controller
{
    //constructor
    public function __construct(){

    }
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
    		->paginate(7);
    		return view('insumo.ingreso.index',["ingresos"=>$ingresos,"searchText"=>$query]);
    	}
    }
    public function create(){
    	$persona=DB::table('persona as p')
    	->join('proveedor as pro','pro.idpersona','=','p.idpersona')
        ->where('p.condicion','=','1')
    	->get();
    	$insumos=DB::table('insumo as art')
    	->select(DB::raw('CONCAT(art.codigo, " ",art.nombre) AS insumo'),'art.idinsumo')
    	->where('art.estado','=','Activo')
    	->get();
    	return view("insumo.ingreso.create",["personas"=>$persona,"insumos"=>$insumos]);
    }
    public function store(IngresoFormRequest $request){
        try {
            DB::beginTransaction();
            $ingreso = new Ingreso;
            $ingreso->idproveedor=$request->get('idproveedor');
            $ingreso->tipo_comprobante=$request->get('tipo_comprobante');
            $ingreso->serie_comprobante=$request->get('serie_comprobante');
            $ingreso->num_comprobante=$request->get('num_comprobante');
            $mytime = Carbon::now();
            $ingreso->fecha_hora = $mytime->toDateTimeString();
            $ingreso->estado='Activo';
            $ingreso->save();

            $idarticulo=$request->get('idinsumo');
            $cantidad = $request->get('cantidad');
            $precio_compra = $request->get('precio_compra');
            $precio_venta = $request->get('precio_venta');

            //recorre los articulos agregados
            $cont = 0;
            while ($cont < count($idarticulo)) {
                # code...
                    $detalle = new DetalleIngreso();
                    $detalle->idingreso=$ingreso->idingreso;
                    $detalle->idarticulo=$idarticulo[$cont];
                    $detalle->cantidad=$cantidad[$cont];
                    $detalle->precio_compra=$precio_compra[$cont];
                    $detalle->precio_venta=$precio_venta[$cont];
                    $detalle->save();
                    $cont=$cont+1;
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();}
           
        return Redirect::to('insumo/ingreso');
    }

    public function show($id){
        $ingreso=DB::table('ingreso as i')
            ->join('proveedor as p','i.idproveedor','=','p.idproveedor')
            ->join('persona as per', 'per.idpersona','=','p.idpersona')
            ->join('detalle_ingreso as di','i.idingreso','=','di.idingreso')
            ->select('i.idingreso','i.fecha_hora','per.nombre','per.apellido','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.impuesto','i.estado',DB::raw('sum(di.cantidad*precio_compra) as total'))
            ->where('i.idingreso','=',$id)
             ->groupBy('i.idingreso','i.fecha_hora','per.nombre','i.tipo_comprobante','i.serie_comprobante', 'i.num_comprobante','i.impuesto','i.estado')
            ->first();
            $detalles=DB::table('detalle_ingreso as d')
            ->join('insumo as a', 'd.idarticulo','=', 'a.idinsumo')
            ->select('a.nombre as articulo','d.cantidad', 'd.precio_compra', 'd.precio_venta')
            ->where('d.idingreso','=',$id)

            ->get();//obengo todos los detalles;
            return view("insumo.ingreso.show",["ingreso"=>$ingreso,"detalles"=>$detalles]);
    }
    public function destroy($id){
        $ingreso=Ingreso::findOrFail($id); //coincida con el id
        $ingreso->Estado='Cancelado';

        $detalle = DetalleIngreso::where('idingreso',$ingreso->idingreso)
        ->select('idarticulo')
        ->get();

        $detalle->toArray();
        dd($detalle);
        $idarticulo=$detalle->idarticulo;
        $cantidad = $detalle->cantidad;

            //recorre los articulos agregados
        $cont = 0;
        while ($cont < count($detalle)) {
                # code...
            $insumo=Insumo::findOrFail($detalle->idarticulo);
            $insumo->stock = ($insumo->stock - $cantidad);
            $insumo->update();
            $cont=$cont+1;
            }

        return Redirect::to('insumo/ingreso');
    }
}
