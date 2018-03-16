<?php

namespace sisOdonto\Http\Controllers;

use Illuminate\Http\Request;
use sisOdonto\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisOdonto\Http\Requests\ObrasocialFormRequest;
use sisOdonto\Obrasocial;
use sisOdonto\Paciente;
use sisOdonto\PrestacionObrasocial;
use DB;


class ObrasocialController extends Controller
{
    //constructor
     public function __construct(){
        
        $this->middleware('auth');

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
        $prestaciones=DB::table('prestacion')->get();

        return view('paciente.obrasocial.create',["prestaciones"=>$prestaciones]);
    }
    public function store (ObrasocialFormRequest $request)
    {
        try {
            DB::beginTransaction();
        $obrasocial=new obrasocial;
        $obrasocial->nombre=$request->get('nombre');
        $obrasocial->telefono=$request->get('telefono');
        $obrasocial->email=$request->get('email');
        $obrasocial->numero=$request->get('numero');
        $obrasocial->estado=('Activo');
        $obrasocial->save();

        $idprestacion=$request->get('idprestacion');
        $coseguro = $request->get('coseguro');
        $codigo = $request->get('codigo');

            //recorre los articulos agregados
            $cont = 0;
            while ($cont < count($idprestacion)) {
                # code...
                    $prestacionp=new PrestacionObrasocial();
                    $prestacionp->idobrasocial=$obrasocial->idobrasocial;
                    $prestacionp->idprestacion=$idprestacion[$cont];
                    $prestacionp->coseguro=$coseguro[$cont];
                    $prestacionp->codigo=$codigo[$cont];
                    $prestacionp->save();
                    $cont=$cont+1;
            }
        DB::commit();
        $r = 'Obra Social Creada';
        }

        catch (\Exception $e) {
        DB::rollback(); 
        $r = 'No se ha podido crear Obra Social';
        }

        return Redirect::to('paciente/obrasocial')->with('notice',$r); //redirecciona a la vista turno

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
        $obrasocial=Obrasocial::findOrFail($id);

        $paciente = Paciente::where('idobra_social',$obrasocial->idobrasocial)->first();
        
        //$estado = DB::table('turno')->select('idpaciente')->where('idpaciente','=',$id)->first();
        //dd($estado);
        if ($paciente != ""){
            return Redirect::to('paciente/obrasocial')->with('notice','No se puede eliminar, esta obra social pertenece a un paciente');
             //redirecciona a la vista turn
        }
        $obrasocial->estado='Inactivo';
        $obrasocial->update();
        return Redirect::to('paciente/obrasocial');
    }
}
