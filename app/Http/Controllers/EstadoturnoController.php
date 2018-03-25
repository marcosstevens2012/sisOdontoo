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


class TurnoController extends Controller
{
    //constructor
    public function __construct(){
        
        $this->middleware('auth');

    }
   	public function index(Request $request){
        
    }
    public function create()
    {
        
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
