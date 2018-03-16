<?php

namespace sisOdonto\Http\Controllers;

use Illuminate\Http\Request;
use sisOdonto\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisOdonto\Http\Requests\proveedorFormRequest;
use Illuminate\Support\Collection;
use sisOdonto\Proveedor;
use sisOdonto\Persona;
use sisOdonto\Pais;
use sisOdonto\Tipodocumento;
use sisOdonto\Contacto;
use sisOdonto\Provincia;
use sisOdonto\Ciudad;
use Carbon\Carbon; //Fecha zona horaria
use Response;
use DB;


class ProveedorController extends Controller
{
    //constructor
     public function __construct(){
        
        $this->middleware('auth');

    }
    public function index(Request $request){
        if($request){
            $query=trim($request->get('searchText'));
            //$articulos=DB::table('articulo as a')
            $proveedores=DB::table('proveedor as p')
            //join de dos tablas
            ->join('persona as per', 'per.idpersona', '=', 'p.idpersona')
            //de la union eligo los campos que requiero
            ->select('p.idproveedor', 'per.nombre as nombre', 'per.apellido','per.documento as dni','per.email as email' ,'per.observaciones as observaciones','per.contradicciones as contradicciones')
            ->where('per.nombre','LIKE','%'.$query.'%')
            //otro campo
            ->orwhere('per.documento','LIKE','%'.$query.'%')
            ->orderBy('p.idproveedor','desc')
             
            ->paginate(100);
            //retorna la vista en la carpeta almacen/categoria/index.php
            return view('insumo.proveedor.index',["proveedores"=>$proveedores,"searchText"=>$query]);
        }
    }
    public function create()
    {
        //$paises = DB::table('paises')->get();
        //return view("proveedor.proveedor.create",["paises"=>$paises, "obrasociales"=>$obrasociales]);
        $documento= Tipodocumento::all();
        $pais= Pais::all();
            //retorna la vista en la carpeta almacen/categoria/index.php
        return view('insumo.proveedor.create',compact('pais'),compact('documento'));
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

    public function store (ProveedorFormRequest $request)
    {
        try {
            DB::beginTransaction();
        $persona=new Persona;
        $persona->nombre=$request->get('nombre');
        $persona->apellido=$request->get('apellido');
        $persona->idtipo_documento=$request->get('tipodocumento');
        $persona->documento=$request->get('documento');
        $persona->idciudad=$request->get('ciudadnombre');
        $persona->observaciones=$request->get('observaciones');
        $persona->contradicciones=$request->get('contradicciones');
        $persona->condicion='1';
        $persona->nacimiento=$request->get('nacimiento');
        //$persona->edad = Carbon::parse($edad)->age; // 1990-10-25
        $persona->save();

        $direccion = $request->get('precio_compra');
        $telefono = $request->get('precio_venta');


        $proveedor = new proveedor;
        $proveedor->idpersona= $persona->idpersona;
        $proveedor->save();

        $cont = 0;
        while ($cont < count($direccion)) {
                # code...
                $contacto = new Contacto;
                $contacto->idproveedor= $proveedor->idproveedor;
                $contacto->telefono=$telefono[$cont];
                $contacto->direccion=$direccion[$cont];
                $contacto->save();
                $cont=$cont+1;
            }
        
        
        DB::commit();
        //flash('Welcome Aboard!');
                $r = 'Proveedor Creado';
            }

        catch (\Exception $e) {
            DB::rollback(); 
        //Flash::success("No se ha podido crear turno");
                $r = 'No se ha podido crear Proveedor';
            }

        return Redirect::to('insumo/proveedor')->with('notice',$r); //redirecciona a la vista turno

    }
    public function show($id)
    {
        $proveedor=Proveedor::findOrFail($id);
        $proveedores = Persona::where('idpersona',$proveedor->idpersona)->first();
        $detalles= Contacto::where('idcontacto',$proveedores->idcontacto)->get();
          //retorna la vista en la carpeta almacen/categoria/index.php
        return view('insumo.proveedor.show',["proveedores"=>$proveedores,"proveedor"=>$proveedor,"detalles"=>$detalles]);
    }
   public function edit($id)
    {
        $proveedor=proveedor::findOrFail($id);
        $persona = Persona::where('idpersona',$proveedor->idpersona)->first();

        

        $pais= DB::table('pais');
        //dd($persona);
        $tipodocumentos= DB::table('tipo_documento')->get(); 
        
        //return view("proveedor.proveedor.create",["paises"=>$paises, "obrasociales"=>$obrasociales]);
        $pais= Pais::all();
        return view("insumo.proveedor.edit",["tipodocumentos"=>$tipodocumentos,"proveedor"=>$proveedor,"persona"=>$persona,"pais"=>$pais]);
    }
    public function update(proveedorFormRequest $request,$id)
    {
        $persona=Persona::findOrFail($id);
        
        return Redirect::to('insumo/proveedor');
    }
   
    public function destroy($id)
    {
        $proveedor=proveedor::findOrFail($id);
        $proveedor->idestado=$request->get('idestado');
        $proveedor->update();
        return Redirect::to('proveedor');
    }
}
