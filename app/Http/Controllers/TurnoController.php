<?php

namespace sisOdonto\Http\Controllers;

use Illuminate\Http\Request;
use sisOdonto\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisOdonto\Http\Requests\TurnoFormRequest;
use sisOdonto\Http\Requests\TurnoEditFormRequest;
use sisOdonto\Turno;
use sisOdonto\Profesional;
use sisOdonto\Paciente;
use sisOdonto\Persona;
use sisOdonto\Prestacion;
use sisOdonto\Estado_turno;
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

        $insumos = DB::table('insumo')->get();

        $profesionales = DB::table('persona as p')
        ->join('profesional as pro','p.idpersona','=','pro.idpersona')
        ->join('consultorio as con','con.idconsultorio','=','pro.consultorio')
        ->select('p.nombre as nombre','p.apellido as apellido','p.idpersona','pro.idprofesional','con.numero as consultorio')
        ->get();

        $prestaciones = DB::table('prestacion')->get();
        $estados = DB::table('estado_turno')->get();
        $fechas = DB::table('turno as t')->select('hora_inicio','fecha')
        ->get();

        $fechamax = Carbon::now();
        $fechamax = $fechamax->format('Y-m-d');

        return view("turno.turno.create",["insumos"=>$insumos, "horarios"=>$horarios, "turnos"=>$turnos,"personas"=>$personas, "estados"=>$estados, "prestaciones"=>$prestaciones, "fechamax"=>$fechamax, "profesionales"=>$profesionales]);
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

        $pacientes = DB::table('turno as pac')
        ->join('persona as per','per.idpersona','=','pac.idpaciente')
        ->join('paciente as p','p.idpersona','=','per.idpersona')
        ->where('pac.idturno','=',$turno->idturno)
        ->select('per.idpersona','p.idpaciente','per.nombre','per.apellido')
        ->first();

        $profesional = DB::table('turno as pac')
        ->join('profesional as pro','pro.idprofesional','=','pac.idprofesional')
        ->join('persona as per','per.idpersona','=','pro.idpersona')
        ->join('consultorio as con','con.idconsultorio','=','pro.consultorio')
        ->select('per.nombre','per.apellido','pro.idprofesional','con.numero as consultorio')
        ->where('pac.idturno','=',$turno->idturno)
        ->first();

        //dd($profesional);
        
        
        $estados = DB::table('estado_turno')->get();

        $prestaciones = DB::table('turno as t')
        ->join('prestacion as pre','pre.idprestacion','=','t.idprestacion')
        ->select('pre.idprestacion','pre.nombre','pre..tiempo')
        ->first();
        //dd($prestaciones);
        

        $fechas = DB::table('turno as t')->select('hora_inicio','fecha')
        ->first();

        $fechamax = Carbon::now();
        $fechamax = $fechamax->format('Y-m-d');
        return view("turno.turno.edit",["horarios"=>$horarios, "turno"=>$turno, "profesional"=>$profesional, "pacientes"=>$pacientes, "estados"=>$estados, "prestacion"=>$prestaciones, "fechamax"=>$fechamax]);
        
        //return view("almacen.categoria.edit",["categoria"=>Categoria::findOrFail($id)]);

    }
    public function update(TurnoEditFormRequest $request,$id)
    {
        $turno=Turno::findOrFail($id);
        $turno->idestado=$request->get('estado');
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
        $turno->idestado=('3');
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
