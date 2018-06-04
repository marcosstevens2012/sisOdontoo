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


class TurnoeditController extends Controller
{
    //constructor
    
    
    public function create()
    {
        
    }

    public function buscarSaldo (Request $request){

        
    }
    public function buscarAlerta (Request $request) {

        
    }

    public function store (TurnoFormRequest $request){
         

    }
    public function show($id){
    
   
    }
    public function edit($id)
    {

        
    }
    public function update(TurnoEditFormRequest $request,$id)
    {
        
    }
    public function destroy(Request $accion,$id)
    {
        $date = Carbon::now();
        $turno=Turno::findOrFail($id);

        if($accion->val == 'C'){
        $turno->idestado=('3');
        $turno->update();
        }

        if($accion->val == 'S'){
        $turno->idestado=('4');
        $turno->update();
        }

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
