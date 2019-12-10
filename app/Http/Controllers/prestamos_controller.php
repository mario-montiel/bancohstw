<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\ClientesModelo;
use Illuminate\Support\Facades\DB;
use Illuminate\support\Facades\Auth;
use Fpdf;

class prestamos_controller extends Controller
{
    public function ver_prestamos_view(){
        return view('pdf');
    }

    public function ver_prestamos_view2($prest_id){

    	$prest_arreglo = DB::table('prestamos')->select('prest_id','tipos_pagos_tipo_pago_id','prest_monto_sol','prest_fecha_final','prest_tasa','prest_monto_total')->where('prest_id',"=",$prest_id)->get();
        
        $data['prest_monto_sol'] = "8000";
        //return($prest_monto_sol);
        return view('pdf',$data);
    }

    public function ver_prestamos_view_lista(){
        $user_id = 1;
        $cli_id_array = DB::table('clientes')->select('cliente_id','cli_nom','cli_ap_paterno','cli_ap_materno','ali_fecha_nac','cli_curp','cli_rfc',)->where('users_id',"=",$user_id)->get();
    	$cli_id = json_encode($cli_id_array[0]->cliente_id);
        $cli_name = json_encode($cli_id_array[0]->cli_nom);
        $cli_lastnamep = json_encode($cli_id_array[0]->cli_ap_paterno);
        $cli_lastnamem = json_encode($cli_id_array[0]->cli_ap_materno);
        $cli_com_nom = $cli_name . " " . $cli_lastnamep . " " . $cli_lastnamem;
    	$prest = DB::table('prestamos')->select('prest_id','tipos_pagos_tipo_pago_id','prest_monto_sol','prest_fecha_final','prest_tasa','prest_monto_total')->where('clientes_cliente_id',"=",$cli_id)->get();

        return view('ver_prestamos',compact('prest','cli_name','cli_com_nom'));
    }

    public function dompdf($prest_id){


        ob_start();
        $prest_arreglo = DB::table('prestamos')->select('prest_id','tipos_pagos_tipo_pago_id','prest_monto_sol','prest_fecha_final','prest_tasa','prest_monto_total')->where('prest_id',"=",$prest_id)->get();
        $monto = json_encode($prest_arreglo[0]->prest_monto_sol);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML(ob_get_clean());
        $pdf->render();
        return $pdf->stream();
    }


    

}
