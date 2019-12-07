<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\tipos_tarjetas_deb_cred;
use Illuminate\Support\Facades\DB;

class tarjetasController extends Controller
{
    public function tarjetas(){
    	$tarj = tipos_tarjetas_deb_cred::all();
    	$tiptar = DB::table('tipos_tarjetas')->select('tipo_tarjeta_id','tipo_tarjeta_nombre')->get();
    	return view('tarjetas', compact('tarj','tiptar'));
    }
    public function clientes(Request $r){
        $cliente = $r->get("ncliente2");
        $rfc = $r->get("rfc2");
        $curp = $r->get("curp2");
        $nombre = $r->get("nombre2");
        $fecha = $r->get("fecha2");
    	$arreglo = [$cliente, $rfc, $curp, $nombre, $fecha];
        if($cliente != null){
            $selector = DB::table('prestamos')->join('clientes', 'clientes.cliente_id', '=', 'prestamos.clientes_cliente_id')->select('prestamos.prest_monto_sol','prestamos.prest_fecha_final','prestamos.prest_tasa','prestamos.prest_monto_total')->where('clientes.cliente_id', $cliente)->get();
        }
        elseif($rfc != null){
            $selector = DB::table('prestamos')->join('clientes', 'clientes.cliente_id', '=', 'prestamos.clientes_cliente_id')->select('prestamos.prest_monto_sol','prestamos.prest_fecha_final','prestamos.prest_tasa','prestamos.prest_monto_total')->where('clientes.cli_rfc', $rfc)->get();
        }
        elseif($curp != null){
            $selector = DB::table('prestamos')->join('clientes', 'clientes.cliente_id', '=', 'prestamos.clientes_cliente_id')->select('prestamos.prest_monto_sol','prestamos.prest_fecha_final','prestamos.prest_tasa','prestamos.prest_monto_total')->where('clientes.cli_curp', $curp)->get();
        }
        else{
            $selector = DB::table('prestamos')->join('clientes', 'clientes.cliente_id', '=', 'prestamos.clientes_cliente_id')->select('prestamos.prest_monto_sol','prestamos.prest_fecha_final','prestamos.prest_tasa','prestamos.prest_monto_total')->where("concat(clientes.cli_nom, ' ', clientes.cli_ap_paterno, ' ', clientes.cli_ap_materno)", $nombre)->get();
        }
    	return $selector;
    }
    public function pifi(Request $r){
        $cliente = $r->get("ncliente");
        $rfc = $r->get("rfc");
        $curp = $r->get("curp");
        $nombre = $r->get("nombre");
        $fecha = $r->get("fecha");
        $arreglo = [$cliente, $rfc, $curp, $nombre, $fecha];
    	return $arreglo;
    }
}
