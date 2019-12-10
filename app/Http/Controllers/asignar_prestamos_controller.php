<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Modelos\AsignarPrestamo;
use App\Modelos\ClientesModelo;
use DB;

class asignar_prestamos_controller extends Controller
{
    public function verVista(){
        return view('asignar_prestamos');
    }

    public function verVista2(){
        return view('asignar_prestamo');
    }

    public function asignarPrestamos(Request $request){
        // dd($request);
        if ($request->numero_cliente){
            $verificar_solicitud = ClientesModelo::find($request->numero_cliente);
        }
        else if ($request->nombre_cliente){
            $verificar_solicitud = ClientesModelo::where("cli_nom",$request->nombre_cliente)->first();
        }
        else if ($request->verif_curp){
            $verificar_solicitud = ClientesModelo::where("cli_curp",$request->verif_curp)->first();
        }
        else if ($request->verif_rfc){
            $verificar_solicitud = ClientesModelo::where("cli_rfc",$request->verif_rfc)->first();
        }

        if ($verificar_solicitud == null){
            return redirect ('asignar_prestamos')
                    ->with('usuario_fail', 'Usuario no encontrado!...');
        }

        if ($verificar_solicitud->cli_status == "rojo"){
            return redirect ('asignar_prestamos')
                    ->with('negado', 'Usuario en estado rojo!...');
        }
        
        if ($request->tipo_tarjeta == "credito" && $verificar_solicitud->cli_status == "verde"){
            return redirect ('asignar_prestamo')
                    ->with('solicitud_verde', 'Cliente encontrado en el sistema con éxito!...')
                    ->with(['tipo' => $request->tipo_tarjeta])
                    ->with(['verificar_solicitud' => $verificar_solicitud]);
        }
        else if ($request->tipo_tarjeta == "credito" && $verificar_solicitud->cli_status == "amarillo"){
            return redirect ('asignar_prestamo')
                    ->with('solicitud_amarillo', 'Cliente encontrado en el sistema con éxito!...')
                    ->with(['tipo' => $request->tipo_tarjeta])
                    ->with(['verificar_solicitud' => $verificar_solicitud]);
        }
        else{
            return redirect ('asignar_prestamo')
                    ->with(['tipo' => $request->tipo_tarjeta])
                    ->with(['verificar_solicitud' => $verificar_solicitud]);
        }
        
    }

    public function prestamoSolicitado(Request $request){
        // dd($request);
        $carbon = new \Carbon\Carbon();
        $endDate = $carbon->addYears($request->plazo_pagar);
        // dd($endDate);
        $asignar_prestamo = new AsignarPrestamo();
        $asignar_prestamo->clientes_cliente_id = $request->num_cliente;

        if ($request->tipo_tarjeta == "credito"){
            $asignar_prestamo->tipos_pagos_tipo_pago_id = 1;
        }
        else if ($request->tipo_tarjeta == "debito") {
            $asignar_prestamo->tipos_pagos_tipo_pago_id = 2;
        }
        
        if ($request->tipo_pago == 1){
            $asignar_prestamo->prest_tasa = 1;
        }
        else{
            $asignar_prestamo->prest_tasa = 2;
        }
        $asignar_prestamo->prest_monto_sol = $request->monto_solicitado;
        $asignar_prestamo->prest_fecha_final = $endDate;
        $asignar_prestamo->prest_tasa = '5%';
        $asignar_prestamo->prest_monto_total = $request->monto_solicitado * 1.05;
        $asignar_prestamo->save();

        return redirect ('asignar_prestamos')
                    ->with('prestamo', 'Solicitud de Prestamo realizado con Éxito!');
    }

    // public function verifClientBuroCredito(Request $request){
    //     // return $request->datos["nombre"];
    //     if($request->datos["nombre"] != ""){
    //         $consulta = DB::table('usuarios')
    //                 ->select('*')
    //                 ->join('clientes', 'clientes.usu_id', '=', 'usuarios.usu_id')
    //                 ->orWhere('cli_nom', $request->datos["nombre"])
    //                 ->get();
    //         return $consulta;
    //     }
    //     if($request->datos["curp"] != ""){
    //         $consulta = DB::table('usuarios')
    //                 ->select('*')
    //                 ->join('clientes', 'clientes.usu_id', '=', 'usuarios.usu_id')
    //                 ->orWhere('cli_curp', 'LIKE', '%'.$request->datos["curp"].'%')
    //                 ->get();
    //         return $consulta;
    //     }
    //     if($request->datos["rfc"] != ""){
    //         $consulta = DB::table('usuarios')
    //                 ->select('*')
    //                 ->join('clientes', 'clientes.usu_id', '=', 'usuarios.usu_id')
    //                 ->orWhere('cli_rfc', 'LIKE', '%'.$request->datos["rfc"].'%')
    //                 ->get();
    //         return $consulta;
    //     }
    //     if($request->datos["fecha"] != ""){
    //         $consulta = DB::table('usuarios')
    //                 ->select('*')
    //                 ->join('clientes', 'clientes.usu_id', '=', 'usuarios.usu_id')
    //                 ->orWhere('ali_fecha_nac', 'LIKE', '%'.$request->datos["fecha"].'%')
    //                 ->get();
    //         return $consulta;
    //     }
        
    // }
}
