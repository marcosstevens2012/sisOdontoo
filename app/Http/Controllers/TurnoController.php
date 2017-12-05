<?php

namespace sisOdonto\Http\Controllers;

use Illuminate\Http\Request;
use sisOdonto\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisOdonto\Http\Requests\TurnoFormRequest;
use sisOdonto\Turno;
use sisOdonto\Profesional;
use sisOdonto\Paciente;
use sisOdonto\Persona;
use sisOdonto\Prestacion;
use sisOdonto\Turnoestado;
use Carbon\carbon; 


use DB;


class TurnoController extends Controller
{
    //constructor
    public function __construct(){
        
        $this->middleware('auth');

    }
    public function index(Request $request){
        $fecha=Carbon::now();
    	if($request){
    		$query=trim($request->get('searchText'));
    		//$articulos=DB::table('articulo as a')
    		$turnos=DB::table('turno as t')
            ->join('profesional as pro','pro.idprofesional','=','t.idprofesional')
            ->join('persona as per','per.idpersona','=','pro.idpersona')
            ->join('persona as p','p.idpersona','=','t.idpaciente')
            ->join('prestacion as pre','pre.idprestacion','=','t.idprestacion')
            ->join('estado_turno as est','t.idestado','=','est.idestado_turno')
    		//de la union eligo los campos que requiero
            ->select('t.idestado')
    		->select('t.idturno', DB::raw('CONCAT(p.nombre, " ",p.apellido) AS paciente'), 't.idpaciente' ,'pre.nombre as prestacion',DB::raw('CONCAT(per.nombre, " ",per.apellido) AS profesional'), 't.idconsultorio as consultorio','est.estado as estado', 't.hora_inicio', 't.hora_fin', 't.fecha','t.tiempo_at','t.idestado')
            ->where('t.fecha','>',$fecha)
    		->where('p.nombre','LIKE','%'.$query.'%')
            //otro campo
            ->orwhere('t.idprofesional','LIKE','%'.$query.'%')
            ->orwhere('t.idestado','!=','3')
    		->orderBy('t.fecha','asc')
    		->paginate(100);
    		//retorna la vista en la carpeta almacen/categoria/index.php
    		return view('turno.turno.index',["turnos"=>$turnos,"searchText"=>$query]);
    	}
    }
    public function create()
    {
        $horarios = DB::table('horarios as hor')->orderBy('hora','asc')
        ->select('hor.hora')
        ->get();

        $turnos = DB::table('turno')->get();
        $personas = DB::table('persona as p')
        ->join('paciente as pac','p.idpersona','=','pac.idpersona')
        ->select('p.nombre as nombre','p.apellido as apellido','p.idpersona','pac.idpaciente')
        ->where('pac.condicion','=','Activo')
        ->get();
        $pacientes = DB::table('paciente as paci')
        ->where('paci.condicion','=','Activo')
        ->get();
        $estados = DB::table('estado_turno')->get();
        $prestaciones = DB::table('prestacion_profesional as prep')
        ->join('prestacion as pre','prep.idprestacion','=','pre.idprestacion')
        ->join('profesional as pro','pro.idprofesional','=','prep.idprofesional')
        ->join('persona as per','per.idpersona','=','pro.idpersona')
        ->join('consultorio as con','con.idconsultorio','=','pro.consultorio')
        ->select('per.nombre as profesional','per.apellido','pro.idprofesional','prep.tiempo','prep.costo','pre.nombre','pre.nombre','pre.idprestacion', 'con.numero')
        ->get();

        $fechas = DB::table('turno as t')->select('hora_inicio','fecha')
        ->get();

        $fechamax = Carbon::now();
        $fechamax = $fechamax->format('Y-m-d');

        return view("turno.turno.create",["horarios"=>$horarios, "turnos"=>$turnos,"personas"=>$personas, "estados"=>$estados, "prestaciones"=>$prestaciones, "fechamax"=>$fechamax]);
    }

    public function buscarHoras(Request $request){

        //it will get price if its id match with product id
        $c=Horarios::select('hora','idhorario')->where('idhorario',$request->id)->orderBy('hora','asc')->get();

        return response()->json($c);
    }

    public function store (TurnoFormRequest $request){
         try {
            DB::beginTransaction();
        $turno=new Turno;
        $turno->idpaciente=$request->get('idpaciente'); 
        $turno->idprestacion=$request->get('idprestacion');
        $turno->idprofesional=$request->get('profesional');
        $turno->idestado=('2');

        $hora=$request->get('hora_inicio');
        $fecha=$request->get('fecha');
        $profesional=$request->get('profesional');
        $paciente=$request->get('idpaciente');

        $vhora = DB::table('turno as t')
        ->where('t.hora_inicio','=',$hora)
        ->where('fecha','=',$fecha)
        ->where('idprofesional','=',$profesional)
        ->where('idpaciente','=',$paciente)
        ->first();


        $fhora = DB::table('turno as t')
        ->where('t.hora_fin','>',$hora)
        ->where('fecha','=',$fecha)
        ->where('idprofesional','=',$profesional)
        ->where('idpaciente','=',$paciente)
        
        ->first();
        
        $mensaje = "";
        if ($vhora != "" || $fhora !=""){
            return Redirect::to('turno/turno/create')->with('notice','Ingrese horario posterior');
             //redirecciona a la vista turn
        }
         //dd($vhora);
            
        //por último checamos si hubo algún error


        $turno->hora_inicio=$request->get('hora_inicio');  
        $turno->fecha=$request->get('fecha');
        

        $turno->idconsultorio=$request->get('consultorio');
        $turno->tiempo_at=$request->get('ptiempo');
        
        $turno->hora_fin=$request->get('hora_fin');
        $turno->observaciones=$request->get('observaciones');
        $turno->save();

        $estados = new Turnoestado;
        $date = Carbon::now();
        $date->toDateTimeString();  
        
        $estados->idturno=$turno->idturno;
        $estados->idestado_turno=('2');
        $estados->inicio=$date;
        $estados->save();
        

        DB::commit();
        $r = 'Turno Creado';
        }

        catch (\Exception $e) {
        DB::rollback(); 
        $r = 'No se ha podido crear Turno';
        }

        return Redirect::to('turno/turno/')->with('notice',$r); //redirecciona a la vista turno

    }
    public function show($id){
    $turno=DB::table('turno as t')
            ->join('turno_estado as est','t.idturno','=','est.idturno')
            ->join('estado_turno as et','est.idestado_turno','=','et.idestado_turno')
            ->select('est.inicio','est.fin','est.idturno','est.idestado_turno','et.estado','est.observaciones')
            ->where('t.idturno','=',$id)
            ->groupBy('t.idturno','et.estado')
            ->get();

    return view("turno.turno.show",["turno"=>$turno]);
    }
    public function edit($id)
    {
        $turno = Turno::findOrFail($id);

        $horarios = DB::table('horarios as hor')->orderBy('hora','asc')
        ->select('hor.hora')
        ->get();

        $paciente = DB::table('paciente as pac')
        ->join('persona as per','per.idpersona','=','pac.idpersona')
        ->join('turno as t','t.idpaciente','=','pac.idpaciente')
        ->select('per.nombre','per.apellido as apellido','per.idpersona','pac.idpaciente')
        ->where('pac.idpaciente','=',$turno->idpaciente)
        ->first();

        $pacientes = DB::table('paciente as pac')
        ->join('persona as per','per.idpersona','=','pac.idpersona')
        ->select('per.nombre','per.apellido as apellido','per.idpersona','pac.idpaciente')
        ->get();
        
        $estados = DB::table('estado_turno')->get();
        $prestaciones = DB::table('prestacion_profesional as prep')
        ->join('prestacion as pre','prep.idprestacion','=','pre.idprestacion')
        ->join('profesional as pro','pro.idprofesional','=','prep.idprofesional')
        ->join('persona as per','per.idpersona','=','pro.idpersona')
        ->join('consultorio as con','con.idconsultorio','=','pro.consultorio')
        ->select('per.nombre as profesional','per.apellido','pro.idprofesional','prep.tiempo','prep.costo','pre.nombre','pre.nombre','pre.idprestacion', 'con.numero')
        ->get();

        $fechas = DB::table('turno as t')->select('hora_inicio','fecha')
        ->get();

        $fechamax = Carbon::now();
        $fechamax = $fechamax->format('Y-m-d');
        return view("turno.turno.edit",["horarios"=>$horarios, "turno"=>$turno,"pacientes"=>$pacientes, "estados"=>$estados, "prestaciones"=>$prestaciones, "fechamax"=>$fechamax,"paciente"=>$paciente]);
        
        //return view("almacen.categoria.edit",["categoria"=>Categoria::findOrFail($id)]);

    }
    public function update(TurnoFormRequest $request,$id)
    {
        $turno=Turno::findOrFail($id);
        $turno->idpaciente=$request->get('idpaciente');
        $turno->idprestacion=$request->get('idprestacion');
        $turno->idprofesional=$request->get('idprofesional');
        $turno->idestado=$request->get('idestado');
        $turno->hora_inicio=$request->get('hora_inicio');
        $turno->hora_fin=$request->get('hora_fin');
        $turno->observaciones=$request->get('observaciones');
        $turno->fecha=$request->get('fecha');
        $turno->update();

        $date = Carbon::now();
        $estados = new Turnoestado;
        $estados->idturno=$turno->idturno;
        $estados->idestado_turno=$turno->idestado;
        $estados->inicio=$date;
        $estados->save();
        return Redirect::to('turno/turno');
    }
    public function destroy($id)
    {
        $turno=Turno::findOrFail($id);
        $turno->idestado=$request->get('idestado');
        dd($turno->idestado);
        $turno->update();

        $estados = new Turnoestado;
        $date = Carbon::now();
        $date->toDateTimeString();  
        $estados->idturno=$turno->idturno;
        $estados->idestado_turno=$turno->idestado;
        $estados->fin=$date;
        $estados->save();

        
        
        return Redirect::to('turno/turno');

        
    }
}
