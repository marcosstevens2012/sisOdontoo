<?php

namespace sisOdonto\Http\Controllers;

use Illuminate\Http\Request;
use sisOdonto\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisOdonto\Http\Requests\ConsultorioFormRequest;
use sisOdonto\Consultorio;
use DB;


class ConsultorioController extends Controller
{
    //constructor
    public function __construct(){
        
        $this->middleware('auth');
    }
    public function index(Request $request){
    	if($request){
    		$query=trim($request->get('searchText'));
    		$consultorios=DB::table('consultorio as c')
            ->select('c.idconsultorio','c.numero','c.piso','c.sillas','c.estado')
    		//join de dos tablas
    		->where('c.numero','LIKE','%'.$query.'%')
            //->where('c.estado','=','Activo')
            //otro campo
            //->orwhere('c.estado','LIKE','%'.$query.'%')
    		->orderBy('c.idconsultorio','desc')
    		->paginate(7);
    		//retorna la vista en la carpeta almacen/categoria/index.php
    		return view('profesional.consultorio.index',["consultorios"=>$consultorios,"searchText"=>$query]);
    	}
    }
    public function create()
    {
        return view("profesional.consultorio.create");
    }
    public function store (ConsultorioFormRequest $request)
    {
        $consultorio = new Consultorio;
        $consultorio->numero=$request->get('numero');
        $consultorio->piso=$request->get('piso');
        $consultorio->sillas=$request->get('sillas');
        $consultorio->estado='Activo';
        $consultorio->save();
        return Redirect::to('profesional/consultorio'); //redirecciona a la vista categoria

    }
    public function show($id)
    {
        return view("profesional.consultorio.show",["consultorio"=>Consultorio::findOrFail($id)]);//muestra categoria especifica
    }
    public function edit($id)
    {
        return view("profesional.consultorio.edit",["consultorio"=>Consultorio::findOrFail($id)]);
        //return view("almacen.categoria.edit",["categoria"=>Categoria::findOrFail($id)]);

    }
    public function update(ConsultorioFormRequest $request,$id)
    {
        $consultorio = Consultorio::findOrFail($id);
        $consultorio->numero=$request->get('numero');
        $consultorio->piso=$request->get('piso');
        $consultorio->sillas=$request->get('sillas');
        $consultorio->estado=$request->get('estado');
        $consultorio->update();
        return Redirect::to('profesional/consultorio');
    }
    public function destroy($id)
    {
        $consultorio=consultorio::findOrFail($id);
        $consultorio->estado='Inactivo';
        $consultorio->update();
        return Redirect::to('profesional/consultorio');
    }
}
