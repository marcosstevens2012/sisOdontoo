<?php

namespace sisOdonto\Http\Controllers;

use Illuminate\Http\Request;
use sisOdonto\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisOdonto\Http\Requests\profesionalFormRequest;
use Illuminate\Support\Collection;
use sisOdonto\Profesional;
use sisOdonto\Persona;
use sisOdonto\Tipodocumento;
use sisOdonto\PrestacionProfesional;
use sisOdonto\Pais;
use sisOdonto\Turno;
use sisOdonto\Provincia;
use sisOdonto\Prestacion;
use sisOdonto\Ciudad;
use Carbon\Carbon; //Fecha zona horaria
use Response;
use DB;


class ProfesionalController extends Controller
{
    //constructor
     public function __construct(){
        
        $this->middleware('auth');

    }
    public function index(Request $request){
    	if($request){
    		$query=trim($request->get('searchText'));
    		//$articulos=DB::table('articulo as a')
    		$profesionales=DB::table('profesional as p')
    		//join de dos tablas
    		->join('persona as per', 'per.idpersona', '=', 'p.idpersona')
    		//de la union eligo los campos que requiero
    		->select('p.idprofesional', 'per.nombre as nombre', 'per.apellido', 'p.matricula','per.direccion as direccion','per.documento as dni','per.telefono as telefono','per.email as email' ,'per.observaciones as observaciones','per.contradicciones as contradicciones')
            ->where('per.condicion','=','Activo')
    		->where('per.nombre','LIKE','%'.$query.'%')
            //otro campo
            ->orwhere('per.documento','LIKE','%'.$query.'%')
    		->orderBy('p.idprofesional','desc')
             
    		->paginate(100);
    		//retorna la vista en la carpeta almacen/categoria/index.php
    		return view('profesional.profesional.index',["profesionales"=>$profesionales,"searchText"=>$query]);
    	}
    }
    public function create()
    {
        //$paises = DB::table('paises')->get();
        $consultorios = DB::table('consultorio')
        ->select('idconsultorio','numero')
        ->where('estado','=','Activo')
        ->get();
        $prestacion = prestacion::all();
        $tipodocumentos= DB::table('tipo_documento')->get(); 
        //return view("profesional.profesional.create",["paises"=>$paises, "obrasociales"=>$obrasociales]);
        $pais= Pais::all();
            //retorna la vista en la carpeta almacen/categoria/index.php
        return view('profesional.profesional.create',["consultorios"=>$consultorios,"tipodocumentos"=>$tipodocumentos,"pais"=>$pais, "prestacion"=>$prestacion]);
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

    public function store (profesionalFormRequest $request)
    {
        try {
            DB::beginTransaction();
        $persona=new Persona;
        $persona->nombre=$request->get('nombre');
        $persona->apellido=$request->get('apellido');
        $persona->documento=$request->get('documento');
        $persona->idtipo_documento=$request->get('idtipo_documento');
        $persona->telefono=$request->get('telefono');
        $persona->email=$request->get('email');
        $persona->idciudad=$request->get('ciudadnombre');
        $persona->direccion=$request->get('direccion');
        $persona->observaciones=$request->get('observaciones');
        $persona->contradicciones=$request->get('contradicciones');
        $persona->condicion='Activo';
        $persona->nacimiento = $request->get('nacimiento'); // 1990-10-25

              
        $persona->save();
        
        $profesional=new Profesional;
        $profesional->idpersona=$persona->idpersona;
        $profesional->consultorio=$request->get('consultorio');
        $profesional->matricula=$request->get('matricula');
        $profesional->save();

        
        $idprestacion=$request->get('prestacion');
        $tiempo = $request->get('tiempo');
        $costo = $request->get('plus');

            //recorre los articulos agregados
            $cont = 0;
            while ($cont < count($idprestacion)) {
                # code...
                    $prestacionp=new PrestacionProfesional();
                    $prestacionp->idprofesional=$profesional->idprofesional;
                    $prestacionp->idprestacion=$idprestacion[$cont];
                    $prestacionp->save();
                    $cont=$cont+1;
            }
        DB::commit();
        $r = 'Profesional Creado';
        }

        catch (\Exception $e) {
        DB::rollback(); 
        $r = 'No se ha podido crear Profesional';
        }

        return Redirect::to('profesional/profesional')->with('notice',$r); //redirecciona a la vista turno

    }
    public function show($id)
    {
        $profesional=Profesional::findOrFail($id);
        $persona = Persona::where('idpersona',$profesional->idpersona)->first();
        $tipodocumentos = Tipodocumento::all();
        $pais= DB::table('ciudad as ciu')
        ->join('persona as p','p.idciudad','=','ciu.idciudad')
        ->select('ciu.nombre as ciudad','ciu.idciudad')
        ->get();
        $consultorios = DB::table('consultorio')->get();
        return view("profesional.profesional.show",["persona"=>$persona, "profesional"=>$profesional, "pais"=>$pais, "consultorios"=>$consultorios, "tipodocumentos"=>$tipodocumentos]);
    }
   public function edit($id)
    {
        $profesional=Profesional::findOrFail($id);
        $persona = Persona::where('idpersona',$profesional->idpersona)->first();
        $tipodocumentos = Tipodocumento::all();
   		$pais= DB::table('ciudad as ciu')
        ->join('persona as p','p.idciudad','=','ciu.idciudad')
        ->select('ciu.nombre as ciudad','ciu.idciudad')
        ->get();
        $consultorios = DB::table('consultorio')->get();
        return view("profesional.profesional.edit",["persona"=>$persona, "profesional"=>$profesional, "pais"=>$pais, "consultorios"=>$consultorios, "tipodocumentos"=>$tipodocumentos]);
        //return view("almacen.categoria.edit",["categoria"=>Categoria::findOrFail($id)]);

    }
    public function update(ProfesionalFormRequest $request,$id)
    {
        $persona=profesional::findOrFail($id);
        $persona->nombre=$request->get('nombre');
        $persona->apellido=$request->get('apellido');
        $persona->documento=$request->get('documento');
        $persona->idtipo_documento=$request->get('idtipo_documento');
        $persona->telefono=$request->get('telefono');
        $persona->email=$request->get('email');
        $persona->idciudad=$request->get('ciudadnombre');
        $persona->direccion=$request->get('direccion');
        $persona->observaciones=$request->get('observaciones');
        $persona->contradicciones=$request->get('contradicciones');
        $persona->nacimiento = $request->get('nacimiento'); // 1990-10-25

              
        $persona->update();
        
        $profesional = Profesional::where('idpersona',$persona->idpersona)->first();
        $profesional->consultorio=$request->get('consultorio');
        $profesional->matricula=$request->get('matricula');
        $profesional->update();
        return Redirect::to('profesional/profesional');
    }
   
    public function destroy($id)
    {
        $profesional=profesional::findOrFail($id);

        $persona = Profesional::where('idprofesional',$profesional->idprofesional)->first();

        $estado = Turno::where('idprofesional',$persona->idprofesional)->first();

        //$estado = DB::table('turno')->select('idpaciente')->where('idpaciente','=',$id)->first();
        //dd($estado);
        if ($estado != "" && $estado->estado = "finalizado" ){
            return Redirect::to('profesional/profesional')->with('notice','El profesional tiene turno');
             //redirecciona a la vista turn
        }
        $profesional->condicion=('Inactivo');
        $profesional->update();
        return Redirect::to('profesional/profesional');
    }
}
