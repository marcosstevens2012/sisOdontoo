<?php

namespace sisOdonto\Http\Controllers;

use Illuminate\Http\Request;
use SisOdonto\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use mol\Http\Requests\PiezasFormRequest;
use mol\Piezas;
use DB;


class PiezasController extends Controller
{
    //constructor
    public function __construct(){
        

    }
    public function index(Request $request){
    	if($request){
    		$query=trim($request->get('searchText'));
    		$piezas=DB::table('pieza as p')
    		//de la union eligo los campos que requiero
    		->select('p.id', 'p.nombre', 'p.stock', 'p.descripcion', 'p.estado')
    		->where('p.nombre','LIKE','%'.$query.'%')
            //otro campo
            //->orwhere('p.nombre','LIKE','%'.$query.'%')
    		->orderBy('p.id','desc')
    		->paginate(100);
    		//retorna la vista en la carpeta almacen/categoria/index.php
    		return view('mecanico.pieza.index',["piezas"=>$piezas,"searchText"=>$query]);
    	}
    }
    public function create()
    {
        return view("mecanico.pieza.create");
    }
    public function store (InventarioFormRequest $request)
    {
        $pieza = new Inventario;
        $pieza->nombre=$request->get('nombre');
        $pieza->descripcion=$request->get('descripcion');
        $pieza->estado='Activo';
        $pieza->save();
        return Redirect::to('pieza/pieza'); //redirecciona a la vista categoria

    }
    public function show($id)
    {
        return view("mecanico.pieza.show",["pieza"=>pieza::findOrFail($id)]);
    }
    public function edit($id)
    {
        $pieza = Inventario::findOrFail($id);
        return view("macanico.pieza.edit",["pieza"=>$pieza]);
        //return view("almacen.categorip.edit",["categoria"=>Categoria::findOrFail($id)]);

    }
    public function update(InventarioFormRequest $request,$id)
    {
        $pieza=Inventario::findOrFail($id);
        $pieza->nombre=$request->get('nombre');
        $pieza->estado=$request->get('estado');
        $pieza->descripcion=$request->get('descripcion');
        $pieza->update();
        return Redirect::to('pieza/pieza');
    }
    public function destroy($id)
    {
        try {
        DB::beginTransaction();
        $pieza=Inventario::findOrFail($id);
        $pieza->estado='Inactivo';
        $pieza->update();
        DB::commit();
        $r = 'Pieza Eliminada';
        }

        catch (\Exception $e) {
        DB::rollback(); 
        $r = 'No se ha podido eliminar pieza';
        }

        return Redirect::to('pieza/pieza')->with('notice',$r); //redirecciona a la vista turno

    }
}