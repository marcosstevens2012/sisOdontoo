<?php

namespace sisOdonto\Http\Controllers;

use Illuminate\Http\Request;
use sisOdonto\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisOdonto\Http\Requests\PrestacionProfesionalFormRequest;
use sisOdonto\Prestacion;
use sisOdonto\PrestacionProfesional;
use sisOdonto\Persona;
use sisOdonto\Profesional;
use DB;
use Response;
use Illuminate\Support\Collection;

class PrestacionProfesionalController extends Controller
{
    //constructor
     public function __construct(){
        
        $this->middleware('auth');

    }
    public function index(Request $request){
    	if($request){
    		$query=trim($request->get('searchText'));
    		$prestaciones=DB::table('prestacion_profesional as pp')
    		//de la union eligo los campos que requiero
    		->join('prestacion as pre','pre.idprestacion','=','pp.idprestacion')
    		->join('profesional as pro','pro.idprofesional','=','pp.idprofesional')
    		->join('persona as p','p.idpersona','=','pro.idpersona')
    		->select('pp.idprestacion', 'pp.idprofesional','pp.idprestacionprof','pp.tiempo','pp.costo','p.nombre','p.apellido','pre.nombre as prestacion','p.apellido as apellido')
    		->where('p.nombre','LIKE','%'.$query.'%')
            //otro campo
            ->orwhere('pp.tiempo','LIKE','%'.$query.'%')
            ->orwhere('pp.costo','LIKE','%'.$query.'%')
            ->orwhere('pre.nombre','LIKE','%'.$query.'%')
    		->orderBy('p.nombre','asc')
    		->paginate(7);
    		//retorna la vista en la carpeta almacen/categoria/index.php
    		return view('prestaciones.prestaciones.index',["prestaciones"=>$prestaciones,"searchText"=>$query]);
    	}
    }

    public function create()
    {
        
        $prestacion = prestacion::all();
        $profesional = DB::table('persona as p')
        ->join('profesional as pro','p.idpersona','=','pro.idpersona')
        ->select('p.nombre as nombre','p.apellido as apellido','pro.idprofesional')
        ->get();
        return view('prestaciones.prestaciones.create',["prestacion"=>$prestacion, "profesional"=>$profesional]);
    }

    public function store (PrestacionProfesionalFormRequest $request)
    {
    	$idprofesional=$request->get('pprofesional');
        $idprestacion=$request->get('prestacion');
        $tiempo = $request->get('tiempo');
        $costo = $request->get('plus');

            //recorre los articulos agregados
            $cont = 0;
            while ($cont < count($idprestacion)) {
                # code...
                    $prestacionp=new PrestacionProfesional();
                    $prestacionp->idprofesional=$idprofesional;
                    $prestacionp->idprestacion=$idprestacion[$cont];
                    $prestacionp->tiempo=$tiempo[$cont];
                    $prestacionp->costo=$costo[$cont];
                    $prestacionp->save();
                    $cont=$cont+1;
            }
        
        
        return Redirect::to('profesional/profesional'); //redirecciona a la vista profesional

    }
    public function show($id)
    {
        return view("profesional.prestacion.show",["prestacion"=>prestacion::findOrFail($id)]);//muestra categoria especifica
    }
    public function edit($id)
    {
        $prestacion = PrestacionProfesional::findOrFail($id);
        
        return view("prestaciones.prestaciones.edit",["prestacion"=>$prestacion]);
        //return view("almacen.categoria.edit",["categoria"=>Categoria::findOrFail($id)]);

    }
    public function update(PrestacionProfesionalFormRequest $request,$id)
    {
        $prestacion=Prestacionprofesional::findOrFail($id);
        $prestacion->tiempo=$request->get('ptiempo');
        $prestacion->costo=$request->get('pplus');
        $prestacion->update();
        return Redirect::to('prestaciones/prestaciones');
    }
    public function destroy($id)
    {
        $prestacion=PrestacionProfesional::findOrFail($id);
        $prestacion->delete();
        return Redirect::to('prestacion/prestacion');
    }
}
