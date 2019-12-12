<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\tipos_tarjetas_deb_cred;
use App\Modelos\Tarjetas;
use Illuminate\Support\Facades\DB;

class tarjetasController extends Controller
{
    public function tarjetas(){
    	$tarj = tipos_tarjetas_deb_cred::all();
    	$tiptar = DB::table('tipos_tarjetas')->select('tipo_tarjeta_id','tipo_tarjeta_nombre')->get();
    	return view('tarjetas', compact('tarj','tiptar'));
    }
    public function RFC1(Request $r){
        $rfc = $r->get('rfc');
        $selector = DB::table('prestamos')->join('clientes', 'clientes.cliente_id', '=', 'prestamos.clientes_cliente_id')->select('prestamos.prest_monto_sol','prestamos.prest_fecha_final','prestamos.prest_tasa','prestamos.prest_monto_total')->where('clientes.cli_rfc', $rfc)->get();
        $selector2 = DB::table('deudas')->join('clientes','clientes.cliente_id','=','deudas.clientes_cliente_id')->select('deudas.deudas_cantidad','deudas.deudas_fecha','deudas.estatus')->where('clientes.cli_rfc', $rfc)->get();
        $selector3 = DB::table('clientes')->select('cliente_id')->where('cli_rfc', $rfc)->get();
        return $this->buro($selector, $selector2, $selector3);
    }
    public function curp1(Request $r){
        $curp = $r->get('curp');
        $selector = DB::table('prestamos')->join('clientes', 'clientes.cliente_id', '=', 'prestamos.clientes_cliente_id')->select('prestamos.prest_monto_sol','prestamos.prest_fecha_final','prestamos.prest_tasa','prestamos.prest_monto_total')->where('clientes.cli_curp', $curp)->get();
        $selector2 = DB::table('deudas')->join('clientes','clientes.cliente_id','=','deudas.clientes_cliente_id')->select('deudas.deudas_cantidad','deudas.deudas_fecha','deudas.estatus')->where('clientes.cli_curp', $curp)->get();
        $selector3 = DB::table('clientes')->select('cliente_id')->where('clientes.cli_curp', $curp)->get();
        return $this->buro($selector, $selector2, $selector3);
    }
    public function numero1(Request $r){
        $numero = $r->get('numero');
        $selector = DB::table('prestamos')->join('clientes', 'clientes.cliente_id', '=', 'prestamos.clientes_cliente_id')->select('prestamos.prest_monto_sol','prestamos.prest_fecha_final','prestamos.prest_tasa','prestamos.prest_monto_total')->where('clientes.cliente_id', $numero)->get();
        $selector2 = DB::table('deudas')->join('clientes','clientes.cliente_id','=','deudas.clientes_cliente_id')->select('deudas.deudas_cantidad','deudas.deudas_fecha','deudas.estatus')->where('clientes.cliente_id', $numero)->get();
        $selector3 = DB::table('clientes')->select('cliente_id')->where('clientes.cliente_id', $numero)->get();
        return $this->buro($selector, $selector2, $selector3);
    }
    public function nombre1(Request $r){
        $nombre = $r->get('nombre');
        $apaterno = $r->get('AP');
        $amaterno = $r->get('AM');
        $fecha = $r->get('fecha');
        $selector = DB::table('prestamos')->join('clientes', 'clientes.cliente_id', '=', 'prestamos.clientes_cliente_id')->select('prestamos.prest_monto_sol','prestamos.prest_fecha_final','prestamos.prest_tasa','prestamos.prest_monto_total')->where('clientes.cli_nom', $nombre)->where('clientes.cli_ap_materno', $amaterno)->where('clientes.cli_ap_paterno', $apaterno)->where('clientes.cli_fecha_nac', $fecha)->get();
        $selector2 = DB::table('deudas')->join('clientes','clientes.cliente_id','=','deudas.clientes_cliente_id')->select('deudas.deudas_cantidad','deudas.deudas_fecha','deudas.estatus')->where('clientes.cli_nom', $nombre)->where('clientes.cli_ap_materno', $amaterno)->where('clientes.cli_ap_paterno', $apaterno)->where('clientes.cli_fecha_nac', $fecha)->get();
        $selector3 = DB::table('clientes')->select('cliente_id')->where('clientes.cli_nom', $nombre)->where('clientes.cli_ap_materno', $amaterno)->where('clientes.cli_ap_paterno', $apaterno)->where('clientes.cli_fecha_nac', $fecha)->get();
        return $this->buro($selector, $selector2, $selector3);
    }
    public function rfc2(Request $r){
        $rfc = $r->get('rfc2');
        $selector = DB::table('clientes')->select('cliente_id')->where('cli_rfc', $rfc)->get();
        return $this->tarjetas2($selector);
    }
    public function curp2(Request $r)
    {
        $curp = $r->get('curp2');
        $selector = DB::table('clientes')->select('cliente_id')->where('cli_curp', $curp)->get();
        return $this->tarjetas2($selector);
    }
    public function numero2(Request $r){
        $numero = $r->get('numero2');
        $selector = DB::table('clientes')->select('cliente_id')->where('cliente_id', $numero)->get();
        return $this->tarjetas2($selector);
    }
    public function nombre2(Request $r){
        $nombre = $r->get('nombre2');
        $apaterno = $r->get('AP2');
        $amaterno = $r->get('AM2');
        $fecha = $r->get('fecha2');
        $selector = DB::table('clientes')->select('cliente_id')->where('cli_nom', $nombre)->where('cli_ap_materno', $amaterno)->where('cli_ap_paterno', $apaterno)->where('cli_fecha_nac', $fecha)->get();
        return $this->tarjetas2($selector);
    }
    public function tarjetas2($selector){
        $tiposdetarjetas = DB::table('tipos_tarjetas')->select('tipo_tarjeta_id', 'tipo_tarjeta_nombre')->get();
        $cliente = "";
        $contador= 0;
        foreach ($selector as $s) {
            $cliente = $s->cliente_id;
            $contador += 1;
        }
        $tipo = "debito";
        if($contador == 0){
            return back()->withErrors(['No se encontró ningún cliente con esas características']);
        }
        else{
            return view('tarjetas2', compact('cliente','tipo', 'tiposdetarjetas'));
        }
    }
    public function tarjetas1($selector){
        $tiposdetarjetas = DB::table('tipos_tarjetas')->select('tipo_tarjeta_id', 'tipo_tarjeta_nombre')->get();
        $cliente = "";
        $contador= 0;
        foreach ($selector as $s) {
            $cliente = $s->cliente_id;
            $contador += 1;
        }
        $tipo = "credito";
        if($contador == 0){
            return back()->withErrors(['No se encontró ningún cliente con esas características']);
        }
        else{
            return view('tarjetas2', compact('cliente','tipo', 'tiposdetarjetas'));
        }
    }
    public function tarjetadebito(Request $r){
        $cliente = $r->get('cliente');
        $tipo = $r->get('tipo');
        $tipocd = $r->get('tipocd');
        if($tipocd == "debito"){
            $tipocd = 2;
        }
        else{
            $tipocd = 1;
        }
        $numero = $r->get('numero');
        $fecha = $r->get('fecha');

        $guardar = new Tarjetas();
        $guardar->cliente_id = $cliente;
        $guardar->tipo_tarjeta_id = $tipo;
        $guardar->tipo_tarjeta_deb_cred_id = $tipocd;
        $guardar->tarjeta_numero = $numero;
        $guardar->tarjeta_fecha_venc = $fecha;
        $guardar->save();

        $tarj = tipos_tarjetas_deb_cred::all();
        $tiptar = DB::table('tipos_tarjetas')->select('tipo_tarjeta_id','tipo_tarjeta_nombre')->get();
        return view('tarjetas', compact('tarj','tiptar'))->withErrors(["Se guardo la tarjeta correctamente"]);
    }
    public function buro($selector, $selector2, $selector3){
        $semaforo = "verde";
        $c1 = count($selector);
        $c2 = count($selector2);
        $fechadehoy = getdate();
        $dia = $fechadehoy['mday'];
        $mes = $fechadehoy['mon'];
        $año = $fechadehoy['year'];

        if ($c1 > 0){
            $semaforo = "amarillo";
            foreach ($selector as $s) {
                $year = "";
                for ($i=0; $i < 4; $i++) {
                    $year = $year.$s->prest_fecha_final[$i];
                }
                $month = "";
                for ($i=5; $i < 7; $i++) {
                    $month = $month.$s->prest_fecha_final[$i];
                }
                $day = "";
                for ($i=8; $i <10; $i++) {
                    $day = $day.$s->prest_fecha_final[$i];
                }
                if (($month + 3) > 12) {
                    $year += 1;
                    $month -= 9;
                }else{
                    $month += 3;
                }
                $fe1 = date("Y-m-d", strtotime($año."-".$mes."-".$dia));
                $fe2 = date("Y-m-d", strtotime($year."-".$month."-".$day));
                if($fe1 > $fe2){
                    $semaforo = "rojo";
                }
            }
        }elseif ($c2 > 0) {
            $s2 = json_encode($selector2[0]->estatus);
            if(json_decode($s2) == "activo"){
                $semaforo = "amarillo";
                foreach ($selector2 as $s){
                    $year = "";
                    for ($i=0; $i < 4; $i++){
                        $year = $year.$s->deudas_fecha[$i];
                    }
                    $month = "";
                    for ($i=5; $i < 7; $i++) {
                        $month = $month.$s->deudas_fecha[$i];
                    }
                    $day = "";
                    for ($i=8; $i <10; $i++) {
                        $day = $day.$s->deudas_fecha[$i];
                    }
                    if (($month + 3) > 12) {
                        $year += 1;
                        $month -= 9;
                    }else{
                        $month += 3;
                    }
                    $fe1 = date("Y-m-d", strtotime($año."-".$mes."-".$dia));
                    $fe2 = date("Y-m-d", strtotime($year."-".$month."-".$day));
                    if($fe1 > $fe2){
                        $semaforo = "rojo";
                    }
                }
            }
        }
        if($semaforo != "rojo"){
            return $this->tarjetas1($selector3);
        }else{
            return back()->withErrors(["Este cliente se encuentra en buró con un estatus de semáforo 'rojo'"]);
        }
    }
}
