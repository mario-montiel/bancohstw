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

    public function calcular_prestamo(){
        return view('calcular_prestamo');
    }

    public function ver_prestamos_view2($prest_id){
        ob_start();
    	$prest_arreglo = DB::table('prestamos')->select('prest_id','tipos_pagos_tipo_pago_id','prest_monto_sol','prest_fecha_final','prest_tasa','prest_monto_total')->where('prest_id',"=",$prest_id)->get();

        $prest_monto_sol = json_encode($prest_arreglo[0]->prest_monto_sol);
        $prest_fecha_final_c = json_encode($prest_arreglo[0]->prest_fecha_final);
        $prest_fecha_final_s = substr($prest_fecha_final_c,0,-16);
        $prest_fecha_final = str_replace('"', " ",$prest_fecha_final_s);
        $prest_tasa = json_encode($prest_arreglo[0]->prest_tasa);
        $prest_monto_total = json_encode($prest_arreglo[0]->prest_monto_total);
        $tipos_pago = json_encode($prest_arreglo[0]->tipos_pagos_tipo_pago_id);
        if($tipos_pago == "1"){
            $tipos_pagos_tipo_pago_id = "mensual";
        } else {
            $tipos_pagos_tipo_pago_id = "quincenal";
        }
        //return($tipos_pagos_tipo_pago_id);
        return view('pdf',compact('prest_monto_sol','prest_fecha_final','prest_tasa','prest_monto_total','tipos_pagos_tipo_pago_id','tipos_pagos_tipo_pago_id'));
        ob_get_clean();
    }

    public function ver_prestamos_view_lista(){
        $user_id = Auth::user()->id;
        $cli_id_array = DB::table('clientes')->select('cliente_id','cli_nom','cli_ap_paterno','cli_ap_materno','cli_fecha_nac','cli_curp','cli_rfc',)->where('user_id',"=",$user_id)->get();
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
