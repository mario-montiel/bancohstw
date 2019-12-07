<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\ClientesModelo;
use Illuminate\Support\Facades\DB;

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
    	$cli_id = 1;
    	$prest = DB::table('prestamos')->select('prest_id','tipos_pagos_tipo_pago_id','prest_monto_sol','prest_tasa','prest_monto_total')->where('clientes_cliente_id',"=",$cli_id)->get();

        return view('ver_prestamos',compact('prest'));
    }

}
