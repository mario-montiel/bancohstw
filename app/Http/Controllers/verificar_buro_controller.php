<?php

namespace App\Http\Controllers;
use App\Usuario;

use Illuminate\Http\Request;

class verificar_buro_controller extends Controller
{
    public function verificar_buro_credito(){
        return view('verificar_buro');
    }

    public function get_clientes(){
        $usuarios = Usuario::all();
        dd($usuarios);
    }
}
