<?php

namespace sisOdonto\Http\Controllers;

use Illuminate\Http\Request;
use sisOdonto\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisOdonto\Http\Requests\pacienteFormRequest;
use Illuminate\Support\Collection;
use sisOdonto\Odonograma;
use Carbon\Carbon; //Fecha zona horaria
use Response;
use DB;


class OdontogramaController extends Controller
{
    //constructor
     public function __construct(){
        
        $this->middleware('auth');

    }
    public function index(Request $request){
 			if($request){
    		$query=trim($request->get('searchText'));
    		return view('paciente.odontograma.index',["searchText"=>$query]);
    	}
    }

}