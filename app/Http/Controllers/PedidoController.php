<?php

namespace sisOdonto\Http\Controllers;

use Illuminate\Http\Request;
use sisOdonto\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisOdonto\Http\Requests\PedidoFormRequest;
use sisOdonto\Pedido;
use sisOdonto\Pieza;
use sisOdonto\Mecanico;
use sisOdonto\DetallePedido;

use DB;
use Carbon\Carbon; //Fecha zona horaria
use Response;
use Illuminate\Support\Collection;

class PedidoController extends Controller
{
    //constructor
    public function __construct(){

    }
    public function index(Request $request){
    	if($request){
    		$query=trim($request->get('searchText'));
    		$pedido=DB::table('pedido as p')
    		->join('mecanico as m','p.idmecanico','=','m.idmecanico')
    		->join('persona as per','m.idpersona','=','per.idpersona')
    		->join('detalle_pedido as dp','p.idpedido','=','dp.idpedido')
    		->select('p.idpedido','p.fecha_hora','p.idmecanico','p.estado','per.nombre','per.apellido')
    		->where('per.nombre','LIKE','%'.$query.'%')
    		->orderBy('p.idpedido','desc')
    		->groupBy('p.idpedido','p.fecha_hora','p.idmecanico','p.estado','per.nombre','per.apellido')
    		->paginate(100);
    		return view('mecanico.pedido.index',["pedidos"=>$pedido,"searchText"=>$query]);
    	}
    }
    public function create(){
    	$persona=DB::table('persona as p')
        ->join('mecanico as mec','mec.idpersona','=','p.idpersona')
        ->where('p.condicion','=','Activo')
        ->get();
        $pieza=DB::table('pieza as pie')
        ->get();
        return view("mecanico.pedido.create",["personas"=>$persona,"piezas"=>$pieza]);
    }
    public function store(pedidoFormRequest $request){
        
            
            $pedido = new Pedido;
            $pedido->idmecanico=$request->get('idmecanico');
            $mytime = Carbon::now();
            $pedido->fecha_hora = $mytime->toDateTimeString();
            $pedido->estado='Activo';
            $pedido->observaciones=$request->get('observaciones');
            $pedido->save();

            $idpieza=$request->get('idpieza');
            $cantidad = $request->get('cantidad');
            
            //recorre los articulos agregados
            $cont = 0;
            while ($cont < count($idpieza)) {
                # code...
                    $detalle = new DetallePedido();
                    $detalle->idpedido=$pedido->idpedido;
                    $detalle->idpieza=$idpieza[$cont];
                    $detalle->cantidad=$cantidad[$cont];
                    $detalle->save();
                    $cont=$cont+1;
            }
       
           
        return Redirect::to('mecanico/pedido');
    }

    public function show($id){
        
    }
       public function destroy($id)
    {
        $pedido=Pedido::findOrFail($id);
        $turno->idestado=('3');
        $turno->update();

        $estados = new PedidoeEstado;
        $date = Carbon::now();
        $date->toDateTimeString();  
        $estados->idpedido=$pedido->idpedido;
        $estados->idestado_turno=$turno->idestado;
        $estados->fin=$date;
        $estados->save();

        
        
        return Redirect::to('mecanico/pedido');

        
    }
}
