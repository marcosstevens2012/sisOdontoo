<?php

namespace sisOdonto\Http\Controllers;

use Illuminate\Http\Request;
use sisOdonto\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisOdonto\Http\Requests\TransaccionFormRequest;
use sisOdonto\Transaccion;
use sisOdonto\DetalleTransaccion; 

use DB;
use Carbon\Carbon; //Fecha zona horaria
use Response;
use Illuminate\Support\Collection;

class TransaccionController extends Controller
{
    //constructor
    public function __construct(){

    }
    public function index(Request $request){
    	if($request){
    		$query=trim($request->get('searchText'));
    		$transacciones=DB::table('transaccion as tra')
    		->join('detalle_transaccion as di','tra.idtransaccion','=','di.idtransaccion')
    		->join('paciente as pac','pac.idpersona','=','di.idpaciente')
    		->join('persona as per','per.idpersona','=','pac.idpersona')
    		->join('prestacion as pre','pre.idprestacion','=','di.idprestacion')
    		->select('tra.idtransaccion','tra.fecha_hora','per.nombre','tra.tipo_comprobante','tra.serie_comprobante','tra.num_comprobante','tra.estado','tra.monto')
    		->where('tra.num_comprobante','LIKE','%'.$query.'%')

    		->orderBy('tra.idtransaccion','desc')
    		->groupBy('tra.idtransaccion','tra.fecha_hora','per.nombre','tra.num_comprobante','tra.estado')
    		->paginate(7);
    		return view('transaccion.transaccion.index',["transacciones"=>$transacciones,"searchText"=>$query]);
    	}
    }
    public function create(){
    	$persona=DB::table('persona as p')
    	->join('proveedor as pro','pro.idpersona','=','p.idpersona')
        ->where('p.condicion','=','1')
    	->get();
    	$prestacion=DB::table('prestacion as pre')
    	->join('prestacion_profesional as pro','pre.idprestacion','=','pro.idprestacion')
    	->select('pre.nombre','pre.idprestacion','pro.costo')
    	->get();
    	$formapago=DB::table('forma_pago')->get();
    	return view("transaccion.transaccion.create",["personas"=>$persona,"prestaciones"=>$prestacion, "formapago"=>$formapago]);
    }
    public function store(transaccionFormRequest $request){
        try {
            DB::beginTransaction();
            $transaccion = new transaccion;
            $transaccion->idpaciente=$request->get('idpaciente');
            $transaccion->tipo_comprobante=$request->get('tipo_comprobante');
            $transaccion->num_comprobante=$request->get('num_comprobante');
            $transaccion->total_transaccion=$request->get('total_transaccion');
            
            $mytime = Carbon::now();
            $transaccion->fecha_hora = $mytime->toDateTimeString();
            $transaccion->estado='A';
            $transaccion->save();
            
            $idinsumo = $request->get('idarticulo');
            $cantidad = $request->get('cantidad');
            $descuento = $request->get('descuento');
            $precio_transaccion = $request->get('precio_transaccion');

            //recorre los articulos agregados
            $cont = 0;
            while ($cont < count($idarticulo)) {
                # code...
                $detalle = new Detalletransaccion();
                $detalle->idtransaccion=$transaccion->idtransaccion;
                $detalle->idprestacion=$idprestacion[$cont];
                $detalle->descuento=$descuento[$cont];
                $detalle->precio=$precio[$cont];
                $detalle->save();
                $cont=$cont+1;
            }
            DB::commit();
         } catch (\Exception $e) {
            DB::rollback(); 
        }
           
        return Redirect::to('transaccions/transaccion');
    }
    public function show($id){
        $ingreso=DB::table('ingreso as i')
            ->join('persona as p','i.idproveedor','=','p.idpersona')
            ->join('detalle_ingreso as di','i.idingreso','=','di.idingreso')
            ->select('i.idingreso','i.fecha_hora','p.nombre','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.impuesto','i.estado',DB::raw('sum(di.cantidad*precio_compra) as total'))
            ->where('i.idingreso','=',$id)
             ->groupBy('i.idingreso','i.fecha_hora','p.nombre','i.tipo_comprobante','i.serie_comprobante', 'i.num_comprobante','i.impuesto','i.estado')
            ->first();
            $detalles=DB::table('detalle_ingreso as d')
            ->join('insumo as a', 'd.idarticulo','=', 'a.idinsumo')
            ->select('a.nombre as articulo','d.cantidad', 'd.precio_compra', 'd.precio_transaccion')
            ->where('d.idingreso','=',$id)

            ->get();//obengo todos los detalles;
            return view("insumo.ingreso.show",["ingreso"=>$ingreso,"detalles"=>$detalles]);
    }
    public function destroy($id){
        $ingreso=Ingreso::findOrFail($id); //coincida con el id
        $ingreso->Estado='C';
        $ingreso->update();
        return Redirect::to('insumo/ingreso');
    }
}
