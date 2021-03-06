<?php

namespace sisOdonto\Http\Controllers;

use Illuminate\Http\Request;
use sisOdonto\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisOdonto\Http\Requests\TurnoFormRequest;
use sisOdonto\Http\Requests\TurnoEditFormRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use sisOdonto\Turno;
use sisOdonto\Profesional;
use sisOdonto\Paciente;
use sisOdonto\Persona;
use sisOdonto\Insumo;
use sisOdonto\User;
use sisOdonto\Liquidacion;
use sisOdonto\Prestacion;
use sisOdonto\Estado_turno;
use sisOdonto\Turnoestado;
use Carbon\carbon; 


use DB;


class TurnoconsultorioController extends Controller
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
            ->join('paciente as pac','pac.idpaciente','=','t.idpaciente')
            ->join('persona as p','p.idpersona','=','pac.idpersona')
            ->join('prestacion as pre','pre.idprestacion','=','t.idprestacion')
            ->join('estado_turno as est','t.idestado','=','est.idestado_turno')
            //de la union eligo los campos que requiero
            ->select('t.idestado')
            ->select('t.idturno', DB::raw('CONCAT(p.apellido, " ",p.nombre) AS paciente'), 't.idpaciente' ,'pre.nombre as prestacion',DB::raw('CONCAT(per.apellido, " ",per.nombre) AS profesional'), 't.idconsultorio as consultorio','est.estado as estado', 't.hora_inicio', 't.hora_fin', 't.fecha','t.tiempo_at','t.idestado')
            ->where('t.fecha','>',$fecha)
            ->where('p.nombre','LIKE','%'.$query.'%')
            //otro campo
            ->orwhere('t.idprofesional','LIKE','%'.$query.'%')
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
        ->select('p.nombre as nombre','p.apellido as apellido','p.idpersona','pac.idpaciente','p.documento')
        ->where('pac.condicion','=','Activo')
        ->orderBy('p.apellido','asc')
        ->get();
    
        $profesionales = DB::table('persona as p')
        ->join('profesional as pro','p.idpersona','=','pro.idpersona')
        ->join('consultorio as con','con.idconsultorio','=','pro.consultorio')
        ->select('p.nombre as nombre','p.apellido as apellido','p.idpersona','pro.idprofesional','con.numero as consultorio')
        ->orderBy('p.apellido','asc')
        ->get();

        $prestaciones = DB::table('prestacion')->get();
        $estados = DB::table('estado_turno')->get();
        $fechas = DB::table('turno as t')->select('hora_inicio','fecha')
        ->get();

        $fechamax = Carbon::now();
        $fechamax = $fechamax->format('d-m-Y');

        return view("turno.turno.create",["horarios"=>$horarios, "turnos"=>$turnos,"personas"=>$personas, "estados"=>$estados, "prestaciones"=>$prestaciones, "fechamax"=>$fechamax, "profesionales"=>$profesionales]);
    }

    public function buscarSaldo (Request $request){

        $data= Paciente::select('saldo','contradicciones')->where('idpaciente',$request->id)->first();
        return response()->json($data);
    }
    public function buscarAlerta (Request $request) {

        $data=Paciente::select('alerta')->where('idpaciente',$request->id)->take(100)->get();
    }
    public function buscarStock(Request $request){

        $data=DB::table('prestacion as pre')
        ->join('prestacion_insumo as pi','pre.idprestacion','=','pi.idprestacion')
        ->join('insumo as ins','ins.idinsumo','=','pi.idinsumo')
        ->select('ins.*','pi.*','pre.*')
        ->where('pi.idprestacion','=',$request->id)
        ->first();

        return response()->json($data);//then sent this data to ajax success
    }

     public function buscarHorario(Request $request){
            $fechas = DB::table('turno as t')
            ->where('fecha','=',$request->fecha)
            ->where('idprofesional','=',$request->idprofesional)
            ->get();

            $data = DB::table('horarios')
                ->get();

            if (is_null($fechas)) {
                return response()->json($data);
            } 
            
            foreach ($fechas as $fechas) {
            if ($fechas != ""){
                $data = DB::table('horarios as hor')
                ->select('hor.hora','hor.idhorario')
                ->where('hor.hora','!=',$fechas->hora_inicio)
                ->where('hor.hora','!=',$fechas->hora_fin)
                ->get();}
            }
            return response()->json($data);

     }

    public function store (TurnoFormRequest $request){
         try {
            DB::beginTransaction();
        $turno=new Turno;
        $turno->user=\Auth::user()->id; 
        $turno->idpaciente=$request->get('idpaciente'); 
        $turno->idprestacion=$request->get('idprestacion');
        $turno->idprofesional=$request->get('profesional');
        $turno->idestado=('1');

        $idprestacion = $request->get('idprestacion');
        

        $insumos = DB::table('insumo as ins')
        ->join('prestacion_insumo as prei','prei.idinsumo','=','ins.idinsumo')
        ->select('ins.stock','ins.idinsumo','prei.cantidad')
        ->where('prei.idprestacion','=',$idprestacion)
        ->get();

        foreach ($insumos as $id) {

                $artefacto = Insumo::findOrFail($id->idinsumo);
                $artefacto->stock = $artefacto->stock - $id->cantidad;
                $artefacto->save();
                //dd($artefacto);
                
            }
        
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


        $obrasocial= Paciente::select('idobra_social')->where('idpaciente',$turno->idpaciente)->
        select('idobra_social')->first();

        /*if ($obrasocial = '7'){
            $saldo = Paciente::findOrFail($turno->idpaciente);
            $saldo->saldo = $request('costo');
            $saldo->save();
        }*/
        
        $turno->save();

        $estados = new Turnoestado;
        $date = Carbon::now();
        $date->toDateTimeString();  
        
        $estados->idturno=$turno->idturno;
        $estados->idestado_turno=('1');
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
        $turno=Turno::findOrFail($id);
        $turno->idestado=('5');
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

        $cont = 0;
            /*while ($cont < count($idarticulo)) {
                $liquidacion = new Liquidacion;
                $date = Carbon::now();
                $date->toDateString();  
                $liquidacion->fecha=$date; 
                $liquidacion->paciente=$request->get('idpaciente');
                $liquidacion->profesional=$request->get('idprofesional');
                $liquidacion->idprestacion=$request->get('idprestacion');


                $obrasocial= Paciente::select('idobra_social')->where('idpaciente',$turno->idpaciente)->
                select('idobra_social')->first();

                $prestacion = $request->get('prestacion');

                $coseguro = DB::table('prestacion_obrasocial as preo')
                ->where('preo.idprestacion','=',$prestacion)
                ->where('preo.idobrasocial','=',$obrasocial->idobra_social)
                ->select('preo.coseguro')->first();

                //dd($obrasocial);
                $liquidacion->idobrasocial=$obrasocial->idobra_social;
                $liquidacion->coseguro=$coseguro->coseguro;
                $liquidacion->save();
                $cont=$cont+1;
        }*/

        return Redirect::to('turno/turno');
    }
    public function destroy($id)
    {
        $turno=Turno::findOrFail($id);
        $turno->idestado=('6');
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
