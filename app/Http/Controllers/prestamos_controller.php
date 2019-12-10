<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\ClientesModelo;
use Illuminate\Support\Facades\DB;
use Illuminate\support\Facades\Auth;

class prestamos_controller extends Controller
{
    public function ver_prestamos_view(){
        return view('pdf');
    }

    public function ver_prestamos_view2($prest_id){
    	$prest_arreglo = DB::table('prestamos')->select('prest_id','tipos_pagos_tipo_pago_id','prest_monto_sol','prest_tasa','prest_monto_total')->where('prest_id',"=",$prest_id)->get();

        return view('pdf',compact('prest_arreglo'));
    }

    public function ver_prestamos_view_lista(){
        $user_id = Auth::user()->id;
        $cli_id_array = DB::table('clientes')->select('cliente_id','cli_nom','cli_ap_paterno','cli_ap_materno','ali_fecha_nac','cli_curp','cli_rfc',)->where('users_id',"=",$user_id)->get();
    	$cli_id = json_encode($cli_id_array[0]->cliente_id);
        $cli_name = json_encode($cli_id_array[0]->cli_nom);
        $cli_lastnamep = json_encode($cli_id_array[0]->cli_ap_paterno);
        $cli_lastnamem = json_encode($cli_id_array[0]->cli_ap_materno);
        $cli_com_nom = $cli_name . " " . $cli_lastnamep . " " . $cli_lastnamem;
    	$prest = DB::table('prestamos')->select('prest_id','tipos_pagos_tipo_pago_id','prest_monto_sol','prest_fecha_final','prest_tasa','prest_monto_total')->where('clientes_cliente_id',"=",$cli_id)->get();

        return view('ver_prestamos',compact('prest','cli_name','cli_com_nom'));
    }

}
