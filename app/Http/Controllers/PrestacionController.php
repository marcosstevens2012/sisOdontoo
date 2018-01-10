<?php

namespace sisOdonto\Http\Controllers;

use Illuminate\Http\Request;
use sisOdonto\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisOdonto\Http\Requests\PrestacionFormRequest;
use sisOdonto\Prestacion;
use sisOdonto\Prestacioninsumo;
use sisOdonto\PrestacionProfesional;
use sisOdonto\Insumo;
use sisOdonto\Persona;
use sisOdonto\Profesional;

use DB;
use Response;
use Illuminate\Support\Collection;

class PrestacionController extends Controller
{
    //constructor
    public function __construct(){

    }
    public function index(Request $request){
    	if($request){
    		$query=trim($request->get('searchText'));
    		$prestaciones=DB::table('prestacion as i')
    		//de la union eligo los campos que requiero
    		->select('i.idprestacion', 'i.nombre')
    		->where('i.nombre','LIKE','%'.$query.'%')
            //otro campo
    		->orderBy('i.idprestacion','desc')
    		->paginate(7);
    		//retorna la vista en la carpeta almacen/categoria/index.php
    		return view('profesional.prestacion.index',["prestaciones"=>$prestaciones,"searchText"=>$query]);
    	}
    }
    public function create()
    {
        //$insumos=Insumo::select('nombre','idinsumo')->where('estado','Activo')->take(100)->get();
        //dd($insumos);
        $insumos=DB::table('insumo as ins')
        ->join('detalle_ingreso as di','ins.idinsumo','=','di.idarticulo')
        ->select(DB::raw('CONCAT(ins.codigo, " ",ins.nombre) AS insumo'),'ins.idinsumo', 'ins.stock', 'di.precio_venta as precio_promedio')
        ->where('ins.estado','=','Activo')
        ->groupBy('insumo','ins.idinsumo','ins.stock')
        ->get();
        return view("profesional.prestacion.create",["insumos"=>$insumos]);
    }
    
    public function store (prestacionFormRequest $request)
    {

        $prestacion=new Prestacion;
        $prestacion->nombre=$request->get('nombre');
        $prestacion->codigo=$request->get('codigo');
        $prestacion->tiempo=$request->get('tiempo');
        $prestacion->save();

        $idarticulo = $request->get('idarticulo');
        $cantidad = $request->get('cantidad');
        $costo = $request->get('total_venta');

        $prestacionp = new PrestacionProfesional; 
        $prestacionp->idprestacion=$prestacion->idprestacion;
        $prestacionp->costo= $request->get('costo');
        //recorre los insumos agregados
        $cont = 0;
            while ($cont < count($idarticulo)) {
                # code...
                $prestacioni = new Prestacioninsumo();
                $prestacioni->idprestacion=$prestacion->idprestacion;
                $prestacioni->idinsumo=$idarticulo[$cont];
                $prestacioni->cantidad=$cantidad[$cont];
                $prestacioni->save();
                $cont=$cont+1;
            }
        return Redirect::to('profesional/prestacion'); //redirecciona a la vista categoria

    }
    public function show($id)
    {
        return view("profesional.prestacion.show",["prestacion"=>prestacion::findOrFail($id)]);//muestra categoria especifica
    }
    public function edit($id)
    {
        $prestacion = prestacion::findOrFail($id);

        $insumos=DB::table('insumo as ins')
        ->join('prestacion_insumo as pi','pi.idinsumo','=','ins.idinsumo')
        ->join('prestacion as pre','pre.idprestacion','=','pi.idprestacion')
        ->join('detalle_ingreso as di','ins.idinsumo','=','di.idarticulo')
        ->select(DB::raw('CONCAT(ins.codigo, " ",ins.nombre) AS insumo'),'ins.idinsumo', 'ins.stock', 'di.precio_venta as precio_promedio','ins.nombre','di.precio_venta','pi.cantidad as cantidad')
        ->where('ins.estado','=','Activo')
        ->where('pre.idprestacion','=',$id)
        ->groupBy('insumo','ins.idinsumo','ins.stock')
        ->get();
        return view("profesional.prestacion.edit",["prestacion"=>$prestacion, "insumos"=>$insumos]);
        //return view("almacen.categoria.edit",["categoria"=>Categoria::findOrFail($id)]);

    }
    public function update(prestacionoFormRequest $request,$id)
    {
        $prestacion=prestacion::findOrFail($id);
        $prestacion->codigo=$request->get('codigo');
        $prestacion->nombre=$request->get('nombre');
        $prestacion->tiempo=$request->get('tiempo');
        $prestacion->update();
        return Redirect::to('profesional/prestacion');
    }
    public function destroy($id)
    {
        $prestacion=prestacion::findOrFail($id);
        $prestacion->estado='Inactivo';
        $prestacion->update();
        return Redirect::to('prestacion/prestacion');
    }
}
