<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Modelos\AsignarPrestamo;
use DB;

class asignar_prestamos_controller extends Controller
{
    public function verVista(){
        return view('asignar_prestamos');
    }

    public function asignarPrestamos(Request $request){
        $carbon = new \Carbon\Carbon();
        $date = $carbon->now();
        
        $asignar_prestamo = new AsignarPrestamo();
        $asignar_prestamo->clientes_cliente_id = 1;
        $asignar_prestamo->tipos_pagos_tipo_pago_id = 2;
        $asignar_prestamo->prest_monto_sol = 5000;
        $asignar_prestamo->prest_fecha_final = $date;
        $asignar_prestamo->prest_tasa = '5%';
        $asignar_prestamo->prest_monto_total = 66;
        $asignar_prestamo->save();

        return redirect('asignar_prestamos')
                ->with('prestamo', 'Prestamo asignado con éxito!...');;
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
