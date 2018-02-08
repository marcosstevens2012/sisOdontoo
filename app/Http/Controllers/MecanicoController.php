<?php

namespace sisOdonto\Http\Controllers;

use Illuminate\Http\Request;
use sisOdonto\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisOdonto\Http\Requests\mecanicoFormRequest;
use Illuminate\Support\Collection;
use sisOdonto\Mecanico;
use sisOdonto\Persona;
use sisOdonto\Pais;
use sisOdonto\Tipodocumento;
use sisOdonto\Contacto;
use sisOdonto\Provincia;
use sisOdonto\Ciudad;
use Carbon\Carbon; //Fecha zona horaria
use Response;
use DB;


class mecanicoController extends Controller
{
    //constructor
    public function __construct(){
        

    }
    public function index(Request $request){
        if($request){
            $query=trim($request->get('searchText'));
            //$articulos=DB::table('articulo as a')
            $mecanicos=DB::table('mecanico as p')
            //join de dos tablas
            ->join('persona as per', 'per.idpersona', '=', 'p.idpersona')
            //de la union eligo los campos que requiero
            ->select('p.idmecanico', 'p.estado as estado', 'per.nombre as nombre', 'per.apellido','per.documento as dni','per.email as email' ,'per.observaciones as observaciones','per.contradicciones as contradicciones')
            ->where('per.nombre','LIKE','%'.$query.'%')
            //otro campo
            ->orwhere('per.documento','LIKE','%'.$query.'%')
            ->orderBy('p.idmecanico','desc')
            ->paginate(100);
            //retorna la vista en la carpeta almacen/categoria/index.php
            return view('mecanico.mecanico.index',["mecanicos"=>$mecanicos,"searchText"=>$query]);
        }
    }
    public function create()
    {
        //$paises = DB::table('paises')->get();
        //return view("mecanico.mecanico.create",["paises"=>$paises, "obrasociales"=>$obrasociales]);
        $documento= Tipodocumento::all();
        $pais= Pais::all();
            //retorna la vista en la carpeta almacen/categoria/index.php
        return view('mecanico.mecanico.create',compact('pais'),compact('documento'));
    }

    public function buscarProvincia(Request $request){
        //if our chosen id and products table prod_cat_id col match the get first 100 data 

        //$request->id here is the id of our chosen option id
        $data=Provincia::select('nombre','idprovincia')->where('idpais',$request->id)->take(100)->get();
        return response()->json($data);//then sent this data to ajax success
    }

     public function buscarCiudad(Request $request){

        //it will get price if its id match with product id
        $c=Ciudad::select('nombre','idciudad')->where('idprovincia',$request->id)->orderBy('nombre','asc')->get();

        return response()->json($c);
    }

    public function store (mecanicoFormRequest $request)
    {
        $persona=new Persona;
        $persona->nombre=$request->get('nombre');
        $persona->apellido=$request->get('apellido');
        $persona->idtipo_documento=$request->get('tipodocumento');
        $persona->documento=$request->get('documento');
        $persona->idciudad=$request->get('ciudadnombre');
        $persona->observaciones=$request->get('observaciones');
        $persona->direccion=$request->get('direccion');
        $persona->telefono=$request->get('telefono');
        $persona->email=$request->get('email');
        $persona->contradicciones=$request->get('contradicciones');
        
        $persona->nacimiento=$request->get('nacimiento');
        //$persona->edad = Carbon::parse($edad)->age; // 1990-10-25
        $persona->save();


        $mecanico = new Mecanico;
        $mecanico->idpersona= $persona->idpersona;
        $mecanico->estado ='Activo';
        $mecanico->matricula=$request->get('matricula');
        $mecanico->save();
        
        
        
        return Redirect::to('mecanico/mecanico'); //redirecciona a la vista mecanico

    }
    public function show($id)
    {
    }
   public function edit($id)
    {
        $mecanico= Mecanico::findOrFail($id);
        $persona = Persona::where('idpersona',$mecanico->idpersona)->first();
        $tipodocumentos = Tipodocumento::all();
        $pais= Pais::all();

        $ciudad= DB::table('ciudad as ciu')
        ->join('persona as p','p.idciudad','=','ciu.idciudad')
        ->join('provincia as pro','pro.idprovincia','=','ciu.idprovincia')
        ->join('pais as pai','pai.idpais','=','pro.idpais')
        ->select('ciu.nombre as ciudad','ciu.idciudad','pro.nombre as provincia','pai.nombre as pais','pai.idpais','pro.idprovincia')
        ->first();

        //dd($ciudad);

        return view("mecanico.mecanico.edit",["persona"=>$persona, "mecanico"=>$mecanico, "pais"=>$pais, "tipodocumentos"=>$tipodocumentos,"ciudad"=>$ciudad]);
        //return view("almacen.categoria.edit",["categoria"=>Categoria::findOrFail($id)]);

    }
    public function update(mecanicoFormRequest $request,$id)
    {
        $persona=Persona::findOrFail($id);
        
        return Redirect::to('/mecanico');
    }
   
    public function destroy($id)
    {
        $mecanico= Mecanico::findOrFail($id);
        $mecanico->estado=('Inactivo');
        $mecanico->update();
        return Redirect::to('mecanico/mecanico');
    }
}
