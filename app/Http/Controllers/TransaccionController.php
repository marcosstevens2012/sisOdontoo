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
        
        $this->middleware('auth');

    }
    public function index(Request $request){
    	if($request){
    		$query=trim($request->get('searchText'));
    		$transacciones=DB::table('transaccion as tra')
    		->join('detalle_transaccion as di','tra.idtransaccion','=','di.idtransaccion')
    		->join('paciente as pac','pac.idpaciente','=','tra.idpaciente')
    		->join('persona as per','per.idpersona','=','pac.idpersona')
    		->join('prestacion as pre','pre.idprestacion','=','di.idprestacion')
    		->select('tra.idtransaccion','tra.fecha_hora','per.*','tra.total_transaccion')
    		->where('per.nombre','LIKE','%'.$query.'%')

    		->orderBy('tra.idtransaccion','desc')
    		->groupBy('tra.idtransaccion','tra.fecha_hora','per.nombre')
    		->paginate(7);
    		return view('transaccion.transaccion.index',["transacciones"=>$transacciones,"searchText"=>$query]);
    	}
    }
    public function create(){
       
        $prestacion=DB::table('prestacion as pre')
            ->join('prestacion_obrasocial as preo','preo.idprestacion','=','pre.idprestacion')
            ->where('preo.idobrasocial','=',4) 
            ->get();

            $pacientes = DB::table('paciente as pac')
            ->join('persona as per','per.idpersona','=','pac.idpersona')
            ->join('turno as tur','tur.idpaciente','=','pac.idpaciente')
            ->get();

            $formapago=DB::table('forma_pago')->get();
        return view("transaccion.transaccion.create",["prestaciones"=>$prestacion, "pacientes"=>$pacientes,"formapago"=>$formapago]);
    }
    public function store(TransaccionFormRequest $request){
            try {
            DB::beginTransaction();
            $transaccion = new Transaccion;
            $transaccion->idpaciente=$request->get('idpaciente');
            $transaccion->total_transaccion=$request->get('total_transaccion');
            $date = Carbon::now();
            $fecha_hora=date_format($date, 'd-m-Y h:i:s A');
            $transaccion->fecha_hora = $fecha_hora;
            $transaccion->save();

            $idprestacion = $request->get('idprestacion');
            $formapago = $request->get('formapago');
            //recorre los articulos agregados
            $cont = 0;
            while ($cont < count($idprestacion)) {
                # code...
                $detalle = new DetalleTransaccion();
                $detalle->idtransaccion=$transaccion->idtransaccion;
                $detalle->idprestacion=$idprestacion[$cont];
                $detalle->idformadepago=$formapago[$cont];
                $detalle->save();
                $cont=$cont+1;
            }
           DB::commit();
            $r='Transaccion Creada Correctamente';
            $o='open';
            } catch (\Exception $e) {
            DB::rollback(); 
            $r='Transaccion NO Creada';
            $o='close';

        }
        
        return Redirect::to('transaccion/transaccion')->with('popup', $o)->with('notice', $r);

    }
    public function show($id){
            $transaccion=DB::table('transaccion as t')
            ->join('detalle_transaccion as dt','t.idtransaccion','=','dt.idtransaccion')
            ->join('paciente as p','p.idpaciente','=','t.idpaciente')
            ->join('persona as per','per.idpersona','=','p.idpersona')
            ->select('t.*','per.nombre','per.apellido')
            ->where('t.idtransaccion','=',$id)
            ->first();

            $detalles=DB::table('detalle_transaccion as d')
            ->join('prestacion as pre', 'd.idprestacion','=', 'pre.idprestacion')
            ->join('forma_pago as for','for.idformadepago','=','d.idformadepago')
            ->select('pre.nombre as prestacion','d.importe','for.nombre as pago')
            
            ->get();//obengo todos los detalles;


            return view("transaccion.transaccion.show",["transaccion"=>$transaccion,"detalles"=>$detalles]);
    }
    public function destroy($id){
        $transaccion=transaccion::findOrFail($id); //coincida con el id
        $transaccion->Estado='C';
        $transaccion->update();
        return Redirect::to('transaccions/transaccion');
    }

}
