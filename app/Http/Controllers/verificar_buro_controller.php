<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class verificar_buro_controller extends Controller
{
    public function verificar_buro_credito(){
        return view('verificar_buro');
    }
}
