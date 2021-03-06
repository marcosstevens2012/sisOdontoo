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
        
        $this->middleware('auth');

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
    		->paginate(100);
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

        try {
            DB::beginTransaction();
        $insumo=new Insumo;
        $insumo->codigo=$request->get('codigo');
        $insumo->nombre=$request->get('nombre');
        $insumo->stock=$request->get('stock');
        $insumo->unidad=$request->get('unidad');
        $insumo->stock_min=$request->get('stock_min');
        $insumo->descripcion=$request->get('descripcion');
        $insumo->estado='Activo';
        $insumo->save();
         DB::commit();
        $r = 'Insumo Creado';
        }

        catch (\Exception $e) {
        DB::rollback(); 
        $r = 'No se ha podido crear Insumo';
        }

        return Redirect::to('insumo/insumo')->with('notice',$r); //redirecciona a la vista turno

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
        try {
            DB::beginTransaction();
        $insumo=Insumo::findOrFail($id);

       

        $insumo->estado='Inactivo';
        $insumo->update();
        DB::commit();
        $r = 'Insumo Eliminado';
        }

        catch (\Exception $e) {
        DB::rollback(); 
        $r = 'No se ha podido eliminar Insumo';
        }

        return Redirect::to('insumo/insumo')->with('notice',$r); //redirecciona a la vista turno

    }
}
