<?php

namespace sisOdonto\Http\Controllers;

use Illuminate\Http\Request;

use sisOdonto\Http\Requests;

class InicioController extends Controller
{
   public function __construct(){
        

    }
    public function index()
    {
        return view('index');
    }
    }

