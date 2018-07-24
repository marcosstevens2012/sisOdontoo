<?php

namespace sisOdonto\Http\Controllers;

use Illuminate\Http\Request;

use sisOdonto\Http\Requests;

class LiquidartodoController extends Controller
{
    public function destroy($ids){

    	
        $turno=Preliquidacion::findOrFail($id);
        $turno->liquidado=('1');
        $turno->update();
        
        
        return Redirect::to('liquidacion/liquidacion');

        
    }
}
