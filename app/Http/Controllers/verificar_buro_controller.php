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

        $datos = 1;
        // $usuarios = Usuario::where();
        $usuarios = DB::table('usuarios')
                    ->select('clientes.cliente_id')
                    ->select('usuarios.usu_fecha_reg_bc')
                    ->select('clientes.cli_nom')
                    ->select('clientes.ali_fecha_nac')
                    ->select('clientes.cli_rfc')
                    ->join('clientes', 'clientes.usu_id', '=', 'usuarios.usu_id')
                    ->where('usuarios.usu_id like "%'. $datos . "%'")
                    ->get();
        dd($usuarios);

        // $sql = "SELECT * FROM usuarios WHERE clientes"
    }
}
