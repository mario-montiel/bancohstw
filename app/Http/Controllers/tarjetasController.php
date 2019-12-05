<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\tipos_tarjetas_deb_cred;

class tarjetasController extends Controller
{
    public function tarjetas(){
    	$tarj = tipos_tarjetas_deb_cred::all();
    	return view('tarjetas', compact('tarj'));
    }
}
