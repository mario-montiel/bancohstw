<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class asignar_prestamos_controller extends Controller
{
    public function verVista(){
        return view('asignar_prestamos');
    }
}
