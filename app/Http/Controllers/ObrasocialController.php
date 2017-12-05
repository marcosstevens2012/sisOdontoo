<?php

namespace sisOdonto\Http\Controllers;

use Illuminate\Http\Request;
use sisOdonto\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisOdonto\Http\Requests\ObrasocialFormRequest;
use sisOdonto\Obrasocial;
use DB;


class ObrasocialController extends Controller
{
    //constructor
    public function __construct(){
        

    }
    public function index(Request $request){
    	if($request){
    		$query=trim($request->get('searchText'));
    		$obrasocial=DB::table('obrasocial as o')
    		//de la union eligo los campos que requiero
    		->select('o.idobrasocial', 'o.nombre', 'o.telefono', 'o.numero','o.email','o.estado')
    		->where('o.nombre','LIKE','%'.$query.'%')
            //otro campo
            ->orwhere('o.numero','LIKE','%'.$query.'%')
            ->orwhere('estado','=','Activo')
    		->orderBy('o.idobrasocial','desc')
    		->paginate(7);
    		//retorna la vista en la carpeta almacen/categoria/index.php
    		return view('paciente.obrasocial.index',["obrasocial"=>$obrasocial,"searchText"=>$query]);
    	}
    }
    public function create()
    {
        return view("paciente.obrasocial.create");
    }
    public function store (ObrasocialFormRequest $request)
    {
        $obrasocial=new obrasocial;
        $obrasocial->nombre=$request->get('nombre');
        $obrasocial->telefono=$request->get('telefono');
        $obrasocial->email=$request->get('email');
        $obrasocial->numero=$request->get('numero');
        $obrasocial->estado=('Activo');
        $obrasocial->save();
        return Redirect::to('paciente/obrasocial'); //redirecciona a la vista categoria

    }
    public function show($id)
    {
        return view("paciente.obrasocial.show",["obrasocial"=>obrasocial::findOrFail($id)]);//muestra categoria especifica
    }
    public function edit($id)
    {
        $obrasocial = obrasocial::findOrFail($id);
        return view("paciente.obrasocial.edit",["obrasocial"=>$obrasocial]);
        //return view("almacen.categoria.edit",["categoria"=>Categoria::findOrFail($id)]);

    }
    public function update(obrasocialoFormRequest $request,$id)
    {
        $obrasocial=obrasocial::findOrFail($id);
        $obrasocial->nombre=$request->get('nombre');
        $obrasocial->telefono=$request->get('telefono');
        $obrasocial->email=$request->get('email');
        $obrasocial->numero=$request->get('numero');
        $obrasocial->estado=$request->get('estado');
        $obrasocial->update();
        return Redirect::to('obrasocial/obrasocial');
    }
    public function destroy($id)
    {
        $obrasocial=obrasocial::findOrFail($id);
        $obrasocial->estado='Inactivo';
        $obrasocial->update();
        return Redirect::to('obrasocial/obrasocial');
    }
}
