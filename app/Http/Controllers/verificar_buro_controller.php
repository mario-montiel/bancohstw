<?php

namespace App\Http\Controllers;
use App\Modelos\Usuario;
use DB;
use Illuminate\Http\Request;

class verificar_buro_controller extends Controller
{
    public function verificar_buro_credito(){
        $usuarios = DB::table('usuarios')
                    ->select('clientes.cliente_id', 'usuarios.usu_fecha_reg_bc', 'clientes.cli_nom', 
                    'clientes.ali_fecha_nac', 'clientes.cli_curp', 'clientes.cli_rfc')
                    ->join('clientes', 'clientes.usu_id', '=', 'usuarios.usu_id')
                    ->get();
        return view('verificar_buro', compact('usuarios'));
    }

    public function buscar_clientes(Request $request){
        $usuario = DB::table('usuarios')
                    ->select('clientes.cliente_id', 'usuarios.usu_fecha_reg_bc', 'clientes.cli_nom', 
                    'clientes.ali_fecha_nac', 'clientes.cli_curp', 'clientes.cli_rfc')
                    ->join('clientes', 'clientes.usu_id', '=', 'usuarios.usu_id')
                    ->where('cli_nom', 'LIKE', '%'.$request->verificar_nom_client.'%')
                    ->orWhere('cli_curp', 'LIKE', '%'.$request->verificar_nom_client.'%')
                    ->orWhere('cli_rfc', 'LIKE', '%'.$request->verificar_nom_client.'%')
                    ->orWhere('ali_fecha_nac', 'LIKE', '%'.$request->verificar_nom_client.'%')
                    ->get();

        return $usuario;
    }

    public function buscar_clientes_curp(Request $request){
        $usuario = DB::table('usuarios')
                    ->select('clientes.cliente_id', 'usuarios.usu_fecha_reg_bc', 'clientes.cli_nom', 
                    'clientes.ali_fecha_nac', 'clientes.cli_curp', 'clientes.cli_rfc')
                    ->join('clientes', 'clientes.usu_id', '=', 'usuarios.usu_id')
                    ->orWhere('cli_curp', 'LIKE', '%'.$request->buscar_clientes_curp.'%')
                    ->get();

        return $usuario;
    }

    public function buscar_clientes_rfc(Request $request){
        $usuario = DB::table('usuarios')
                    ->select('clientes.cliente_id', 'usuarios.usu_fecha_reg_bc', 'clientes.cli_nom', 
                    'clientes.ali_fecha_nac', 'clientes.cli_curp', 'clientes.cli_rfc')
                    ->join('clientes', 'clientes.usu_id', '=', 'usuarios.usu_id')
                    ->orWhere('cli_rfc', 'LIKE', '%'.$request->buscar_clientes_rfc.'%')
                    ->get();

        return $usuario;
    }
}
