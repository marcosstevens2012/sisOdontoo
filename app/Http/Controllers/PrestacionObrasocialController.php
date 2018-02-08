<?php

namespace sisOdonto\Http\Controllers;

use Illuminate\Http\Request;
use sisOdonto\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisOdonto\Http\Requests\PrestacionobrasocialFormRequest;
use sisOdonto\Prestacion;
use sisOdonto\PrestacionObrasocial;
use sisOdonto\Obrasocial;
use DB;
use Response;
use Illuminate\Support\Collection;

class PrestacionObrasocialController extends Controller
{
    //constructor
    public function __construct(){
        

    }
    public function index(Request $request){
    	if($request){
    		$query=trim($request->get('searchText'));
    		$prestaciones=DB::table('prestacion_obrasocial as pp')
    		//de la union eligo los campos que requiero
    		->join('prestacion as pre','pre.idprestacion','=','pp.idprestacion')
    		->join('obrasocial as obr','obr.idobrasocial','=','pp.idobrasocial')
    		->select('pp.idprestacion', 'obr.idobrasocial','pp.idprestacionprof','pp.coseguro','pre.nombre as prestacion','obr.nombre as obrasocial')
    		->where('pre.nombre','LIKE','%'.$query.'%')
            //otro campo
    		->orderBy('pre.nombre','asc')
    		->paginate(7);
    		//retorna la vista en la carpeta almacen/categoria/index.php
    		//dd($prestaciones);
    		return view('prestaciones.prestaciones.index',["prestaciones"=>$prestaciones,"searchText"=>$query]);
    	}
    }

    public function create()
    {
        
        $prestacion = prestacion::all();
        $obrasocial = DB::table('persona as p')
        ->join('obrasocial as pro','p.idpersona','=','pro.idpersona')
        ->select('p.nombre as nombre','p.apellido as apellido','pro.idobrasocial')
        ->get();
        return view('prestaciones.prestaciones.create',["prestacion"=>$prestacion, "obrasocial"=>$obrasocial]);
    }

    public function store (PrestacionobrasocialFormRequest $request)
    {
    	$idobrasocial=$request->get('pobrasocial');
        $idprestacion=$request->get('prestacion');
        $tiempo = $request->get('tiempo');
        $costo = $request->get('plus');

            //recorre los articulos agregados
            $cont = 0;
            while ($cont < count($idprestacion)) {
                # code...
                    $prestacionp=new Prestacionobrasocial();
                    $prestacionp->idobrasocial=$idobrasocial;
                    $prestacionp->idprestacion=$idprestacion[$cont];
                    $prestacionp->tiempo=$tiempo[$cont];
                    $prestacionp->costo=$costo[$cont];
                    $prestacionp->save();
                    $cont=$cont+1;
            }
        
        
        return Redirect::to('obrasocial/obrasocial'); //redirecciona a la vista obrasocial

    }
    public function show($id)
    {
        return view("obrasocial.prestacion.show",["prestacion"=>prestacion::findOrFail($id)]);//muestra categoria especifica
    }
    public function edit($id)
    {
        $prestacion = Prestacionobrasocial::findOrFail($id);
        
        return view("prestaciones.prestaciones.edit",["prestacion"=>$prestacion]);
        //return view("almacen.categoria.edit",["categoria"=>Categoria::findOrFail($id)]);

    }
    public function update(PrestacionobrasocialFormRequest $request,$id)
    {
        $prestacion=Prestacionobrasocial::findOrFail($id);
        $prestacion->tiempo=$request->get('ptiempo');
        $prestacion->costo=$request->get('pplus');
        $prestacion->update();
        return Redirect::to('prestaciones/prestaciones');
    }
    public function destroy($id)
    {
        $prestacion=Prestacionobrasocial::findOrFail($id);
        $prestacion->delete();
        return Redirect::to('prestacion/prestacion');
    }
}
