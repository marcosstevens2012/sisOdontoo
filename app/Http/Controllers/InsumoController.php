<?php

namespace sisOdonto\Http\Controllers;

use Illuminate\Http\Request;
use sisOdonto\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisOdonto\Http\Requests\InsumoFormRequest;
use sisOdonto\Insumo;
use DB;


class InsumoController extends Controller
{
    //constructor
    public function __construct(){
        

    }
    public function index(Request $request){
    	if($request){
    		$query=trim($request->get('searchText'));
    		$insumos=DB::table('insumo as i')
    		//de la union eligo los campos que requiero
    		->select('i.idinsumo', 'i.nombre', 'i.codigo', 'i.stock', 'i.stock_min', 'i.descripcion', 'i.estado')
    		->where('i.nombre','LIKE','%'.$query.'%')
            //otro campo
            ->orwhere('i.codigo','LIKE','%'.$query.'%')
    		->orderBy('i.idinsumo','desc')
    		->paginate(7);
    		//retorna la vista en la carpeta almacen/categoria/index.php
    		return view('insumo.insumo.index',["insumos"=>$insumos,"searchText"=>$query]);
    	}
    }
    public function create()
    {
        return view("insumo.insumo.create");
    }
    public function store (InsumoFormRequest $request)
    {
        $insumo=new Insumo;
        $insumo->codigo=$request->get('codigo');
        $insumo->nombre=$request->get('nombre');
        $insumo->stock=$request->get('stock');
        $insumo->stock_min=$request->get('stock_min');
        $insumo->descripcion=$request->get('descripcion');
        $insumo->estado='Activo';
        $insumo->save();
        return Redirect::to('insumo/insumo'); //redirecciona a la vista categoria

    }
    public function show($id)
    {
        return view("insumo.insumo.show",["insumo"=>Insumo::findOrFail($id)]);//muestra categoria especifica
    }
    public function edit($id)
    {
        $insumo = Insumo::findOrFail($id);
        return view("insumo.insumo.edit",["insumo"=>$insumo]);
        //return view("almacen.categoria.edit",["categoria"=>Categoria::findOrFail($id)]);

    }
    public function update(InsumoFormRequest $request,$id)
    {
        $insumo=Insumo::findOrFail($id);
        $insumo->codigo=$request->get('codigo');
        $insumo->nombre=$request->get('nombre');
        $insumo->stock=$request->get('stock');
        $insumo->stock_min=$request->get('stock_min');
        $insumo->estado=$request->get('estado');
        $insumo->descripcion=$request->get('descripcion');
        $insumo->update();
        return Redirect::to('insumo/insumo');
    }
    public function destroy($id)
    {
        $insumo=Insumo::findOrFail($id);
        $insumo->estado='Inactivo';
        $insumo->update();
        return Redirect::to('insumo/insumo');
    }
}
