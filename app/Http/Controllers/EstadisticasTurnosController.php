<?php

namespace sisOdonto\Http\Controllers;

use Illuminate\Http\Request;
use sisOdonto\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisOdonto\Http\Requests\IngresoFormRequest;
use sisOdonto\Ingreso;
use sisOdonto\Turno;
use sisOdonto\DetalleIngreso;

use DB;
use Response;
use Illuminate\Support\Collection;

class EstadisticasTurnosController extends Controller
{
    //constructor
    public function __construct(){

    }
    public function index(Request $request){

    	$pastel = DB::table('turno as t')
    	->join('paciente as pac','pac.idpaciente','=','t.idpaciente')
    	->join('persona as per','per.idpersona','=','pac.idpersona')
    	->select('per.nombre as nombre')->count();


    	return view('estadisticas_turnos',["pastel"=>$pastel]);
    	}

    
    }

