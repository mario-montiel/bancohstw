<?php

namespace App\Http\Controllers;
use App\Modelos\Usuario;
use DB;
use Illuminate\Http\Request;

class verificar_buro_controller extends Controller
{
    public function verificar_buro_credito(){
        return view('verificar_buro');
    }

    public function get_clientes(){
        // $usuarios = Usuario::where();
        $usuarios = DB::table('usuarios')
                    ->select('clientes.cli_nom, clientes.ali_fecha_nac')
                    ->join('clientes', 'clientes.usu_id', 'usuarios.usu_id')
                    ->get();
        dd($usuarios);
    }
}
