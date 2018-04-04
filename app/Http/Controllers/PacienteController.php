<?php

namespace sisOdonto\Http\Controllers;

use Illuminate\Http\Request;
use sisOdonto\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisOdonto\Http\Requests\pacienteFormRequest;
use Illuminate\Support\Collection;
use sisOdonto\Paciente;
use sisOdonto\Persona;
use sisOdonto\Pais;
use sisOdonto\Tipodocumento;
use sisOdonto\Provincia;
use sisOdonto\Ciudad;
use sisOdonto\Turno;
use Carbon\Carbon; //Fecha zona horaria
use Response;
use DB;


class PacienteController extends Controller
{
    //constructor
    public function __construct(){
        
        $this->middleware('auth');

    }
    public function index(Request $request){
    	if($request){
    		$query=trim($request->get('searchText'));
    		//$articulos=DB::table('articulo as a')
            
    		$pacientes=DB::table('paciente as p')
    		//join de dos tablas
    		->join('persona as per', 'per.idpersona', '=', 'p.idpersona')
    		->join('obrasocial as o', 'o.idobrasocial','=','p.idobra_social')
    		//de la union eligo los campos que requiero
    		->select('p.idpaciente', 'per.nombre as nombre','per.apellido as apellido', 'o.nombre as obrasocial', 'p.tipo_sangre','p.condicion','per.direccion as direccion','per.documento as documento','per.telefono as telefono','per.email as email' ,'per.contradicciones as contradicciones','per.nacimiento')
            ->where('p.condicion','=','Activo')
    		->where('per.nombre','LIKE','%'.$query.'%')
            //otro campo
            ->orwhere('per.documento','LIKE','%'.$query.'%')
    		->orderBy('p.idpaciente','desc')
             
    		->paginate(10);


    		//retorna la vista en la carpeta almacen/categoria/index.php
    		return view('paciente.paciente.index',["pacientes"=>$pacientes,"searchText"=>$query]);
    	}
    }
    public function create()
    {
        //$paises = DB::table('paises')->get();
        $obrasociales = DB::table('obrasocial')->get();
        $tipodocumentos= DB::table('tipo_documento')->get(); 
        //return view("paciente.paciente.create",["paises"=>$paises, "obrasociales"=>$obrasociales]);
        $pais= Pais::all();
            //retorna la vista en la carpeta almacen/categoria/index.php
        return view('paciente.paciente.create',["obrasociales"=>$obrasociales,"tipodocumentos"=>$tipodocumentos,"pais"=>$pais]);
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

    public function store (PacienteFormRequest $request)
    {   
       
        $persona=new Persona;
        $persona->nombre=$request->get('nombre');
        $persona->apellido=$request->get('apellido');
        $persona->documento=$request->get('documento');
        $persona->telefono=$request->get('telefono');
        $persona->email=$request->get('email');
        $persona->idciudad=$request->get('ciudadnombre');
        $persona->direccion=$request->get('direccion');
        $persona->idtipo_documento=$request->get('idtipo_documento');
        $persona->documento=$request->get('documento');
        $persona->condicion='Activo';
        $persona->nacimiento=$request->get('nacimiento');
        //$persona->edad = Carbon::parse($edad)->age; // 1990-10-25


        $persona->observaciones=$request->get('observaciones');
        $persona->contradicciones=$request->get('contradicciones');
              
        $persona->save();

        $idobra_social=$request->get('idobra_social');
        $tipo_sangre = $request->get('tipo_sangre');

        $paciente=new Paciente;
        $paciente->idpersona=$persona->idpersona;
        $paciente->idobra_social=$idobra_social;
        $paciente->tipo_sangre=$tipo_sangre;
        $paciente->contradicciones=$request->get('contradicciones');
        $paciente->carnet=$request->get('carnet');
        $paciente->condicion='Activo';

        $paciente->save();
        
        return Redirect::to('paciente/paciente'); //redirecciona a la vista turno

    }
    public function show($id)
    {   
        $paciente  = DB::table('paciente as pac')
        ->join('turno as tur','tur.idpaciente','=','pac.idpaciente')
        ->join('persona as per','per.idpersona','=','pac.idpersona')
        ->join('obrasocial as obr','obr.idobrasocial','=','pac.idobra_social')
        ->select('per.*','pac.*','obr.nombre as obrasocial','tur.idprofesional')
        ->where('pac.idpaciente','=',$id)
        ->first();

        
        return view("paciente.paciente.show",["paciente"=>$paciente]);//muestra categoria especifica
    }
   public function edit($id)
    {
        $paciente=Paciente::findOrFail($id);
        $persona = Persona::where('idpersona',$paciente->idpersona)->first();

        $pais= DB::table('pais');
        //dd($persona);
        $tipodocumentos= DB::table('tipo_documento')->get(); 
        $obrasociales = DB::table('obrasocial')->get();
        //return view("paciente.paciente.create",["paises"=>$paises, "obrasociales"=>$obrasociales]);
        $pais= Pais::all();
        return view("paciente.paciente.edit",["obrasociales"=>$obrasociales,"tipodocumentos"=>$tipodocumentos,"paciente"=>$paciente,"persona"=>$persona,"pais"=>$pais]);
    }
    public function update(pacienteFormRequest $request,$id)
    {
        $persona=persona::findOrFail($id);
        $persona->nombre=$request->get('nombre');
        $persona->apellido=$request->get('apellido');
        $persona->documento=$request->get('documento');
        $persona->telefono=$request->get('telefono');
        $persona->email=$request->get('email');
        $persona->idciudad=$request->get('ciudadnombre');
        $persona->direccion=$request->get('direccion');
        $persona->idtipo_documento=$request->get('idtipo_documento');
        $persona->documento=$request->get('documento');
        $persona->condicion='Activo';
        $persona->nacimiento=$request->get('nacimiento');


        
        $persona->contradicciones=$request->get('contradicciones');
              
        $persona->update();

        $idobra_social=$request->get('idobra_social');
        $tipo_sangre = $request->get('tipo_sangre');

        $paciente = Paciente::where('idpersona',$persona->idpersona)->first();
        $paciente->idobra_social=$idobra_social;
        $paciente->tipo_sangre=$tipo_sangre;
        $paciente->contradicciones=$request->get('contradicciones');
        $paciente->condicion='Activo';

        $paciente->update();
        return Redirect::to('paciente/paciente');
    }
   
    public function destroy($id)
    {
        $paciente=Paciente::findOrFail($id);
        $persona = Paciente::where('idpaciente',$paciente->idpaciente)->first();
        $estado = Turno::where('idpaciente',$persona->idpaciente)->first();

        //$estado = DB::table('turno')->select('idpaciente')->where('idpaciente','=',$id)->first();
        //dd($estado);
        if ($estado != "" && $estado->estado = "pendiente" ){
            return Redirect::to('paciente/paciente')->with('notice','El paciente tiene turno');
             //redirecciona a la vista turn
        }

        $paciente->condicion='Inactivo';
        $paciente->update();
        return Redirect::to('paciente/paciente');

    }
}
