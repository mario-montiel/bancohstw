<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class asignar_prestamos_controller extends Controller
{
    public function verVista(){
        return view('asignar_prestamos');
    }

    public function asignarPrestamos(Request $request){
        $carbon = new \Carbon\Carbon();
        $date = $carbon->now();
        dd($date);
    }

    public function verifClientBuroCredito(Request $request){
        // return $request->datos["nombre"];
        if($request->datos["nombre"] != ""){
            $consulta = DB::table('usuarios')
                    ->select('*')
                    ->join('clientes', 'clientes.usu_id', '=', 'usuarios.usu_id')
                    ->orWhere('cli_nom', $request->datos["nombre"])
                    ->get();
            return $consulta;
        }
        if($request->datos["curp"] != ""){
            $consulta = DB::table('usuarios')
                    ->select('*')
                    ->join('clientes', 'clientes.usu_id', '=', 'usuarios.usu_id')
                    ->orWhere('cli_curp', 'LIKE', '%'.$request->datos["curp"].'%')
                    ->get();
            return $consulta;
        }
        if($request->datos["rfc"] != ""){
            $consulta = DB::table('usuarios')
                    ->select('*')
                    ->join('clientes', 'clientes.usu_id', '=', 'usuarios.usu_id')
                    ->orWhere('cli_rfc', 'LIKE', '%'.$request->datos["rfc"].'%')
                    ->get();
            return $consulta;
        }
        if($request->datos["fecha"] != ""){
            $consulta = DB::table('usuarios')
                    ->select('*')
                    ->join('clientes', 'clientes.usu_id', '=', 'usuarios.usu_id')
                    ->orWhere('ali_fecha_nac', 'LIKE', '%'.$request->datos["fecha"].'%')
                    ->get();
            return $consulta;
        }
        
    }
}
