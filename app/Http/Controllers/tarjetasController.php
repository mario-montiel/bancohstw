<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\tipos_tarjetas_deb_cred;
use Illuminate\Support\Facades\DB;

class tarjetasController extends Controller
{
    public function tarjetas(){
    	$tarj = tipos_tarjetas_deb_cred::all();
    	$tiptar = DB::table('tipos_tarjetas')->select('tipo_tarjeta_id','tipo_tarjeta_nombre')->get();
    	return view('tarjetas', compact('tarj','tiptar'));
    }
}
