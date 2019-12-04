<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tarjetasController extends Controller
{
    public function tarjetas(){
    	return view('tarjetas');
    }
}
