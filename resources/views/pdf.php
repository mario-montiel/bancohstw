<?php
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use App\Modelos\ClientesModelo;
use Illuminate\Support\Facades\DB;
include "C:/xampp/htdocs/bancohstw/FPDF/fpdf.php";

//$banco_nombre = "Jesus Alcala Luna";

$anios = 2;
$banco_anios = "2 AÑOS";
$banco_tipo_pago = "MENSUAL";
$banco_tasa = 5;
$banco_monto_prestamo = 8000;


$prest_id = 1;
$prest_arreglo = DB::table('prestamos')->select('prest_id','tipos_pagos_tipo_pago_id','prest_monto_sol','prest_fecha_final','prest_tasa','prest_monto_total')->where('prest_id',"=",$prest_id)->get();

$prest_monto_sol_s = json_encode($prest_arreglo[0]->prest_monto_sol);
$prest_monto_sol_n = str_replace('"', "",$prest_monto_sol_s);
$prest_monto_sol = (float)$prest_monto_sol_n;
$prest_fecha_final_c = json_encode($prest_arreglo[0]->prest_fecha_final);
$prest_fecha_final_s = substr($prest_fecha_final_c,0,-16);
$prest_fecha_final = str_replace('"', " ",$prest_fecha_final_s);
$prest_tasa_s = json_encode($prest_arreglo[0]->prest_tasa);
$prest_tasa_n = str_replace('"', "",$prest_tasa_s);
$prest_tasa = (float)$prest_tasa_n;
$prest_monto_total = json_encode($prest_arreglo[0]->prest_monto_total);
$tipos_pago = json_encode($prest_arreglo[0]->tipos_pagos_tipo_pago_id);
if($tipos_pago == "1"){
    $tipos_pagos_tipo_pago_id = "mensual";
    $div = $anios * 12;
} else {
    $tipos_pagos_tipo_pago_id = "quincenal";
    $div = $anios * 24;
}

$banco_monto_total = $prest_monto_sol*(1+($prest_tasa/100));
$banco_cuota = $prest_monto_sol/$div;
$banco_interes = $banco_cuota*($banco_tasa/100);
$banco_capital_amortizado = $banco_cuota + $banco_interes;
$banco_capital_final = $banco_capital_amortizado*$div;

$banco_no_pago = "17090069";
$banco_fecha_pago = "30/11/2019";
//$banco_cuota = "333.33$";
//$banco_interes = "16.66$";
//$banco_capital_amortizado = "360$";
//$banco_capital_final = "8,400$";
$name = Auth::user()->name;

$user_id = Auth::user()->id;
$cli_id_array = DB::table('clientes')->select('cliente_id','cli_nom','cli_ap_paterno','cli_ap_materno','cli_fecha_nac','cli_curp','cli_rfc',)->where('user_id',"=",$user_id)->get();
$cli_id = json_encode($cli_id_array[0]->cliente_id);
$cli_name = json_encode($cli_id_array[0]->cli_nom);
$cli_lastnamep = json_encode($cli_id_array[0]->cli_ap_paterno);
$cli_lastnamem = json_encode($cli_id_array[0]->cli_ap_materno);
$cli_com_nom = $cli_name . "" . $cli_lastnamep . "" . $cli_lastnamem;
$nombre_completo = str_replace('"', " ",$cli_com_nom);

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);


$pdf->Rect(5,5,200,286,'D');
$pdf->image("C:/xampp/htdocs/bancohstw/public/img/hsbc_logo.png",15,15,40,8,"PNG");
$pdf->image("C:/xampp/htdocs/bancohstw/public/img/white.png",15,15,25,8,"PNG");
$pdf->image("C:/xampp/htdocs/bancohstw/public/img/hstw_logo.JPG",41.2,11,13.5,13.5,"JPG");
$pdf->setXY(14,13.5);
$pdf->SetFont('Arial','B',24);
$pdf->Cell(150,12,utf8_decode('HSTW'),0,1);

$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(150,150,150);
$pdf->setXY(73,8);
$pdf->Cell(150,12,utf8_decode('DOCUMENTO PARA SOLICITAR PRESTAMO'),0,1);
$pdf->setXY(59,13);
$pdf->Cell(150,12,utf8_decode('BANCO AHORRO Y PRESTAMOS DE MEXICO SA DE C.V HSTW'),0,1);
$pdf->setXY(90,18);
$pdf->Cell(150,12,utf8_decode('DOCUMENTO OFICIAL'),0,1);

$pdf->SetTextColor(00,00,00);

$pdf->setXY(10,34);
$pdf->Cell(150,12,utf8_decode('NOMBRE(S) Y APELLIDOS:'),0,1);
$pdf->setXY(10,44);
$pdf->Cell(150,12,utf8_decode('CANTIDAD DE AÑOS A PAGAR:'),0,1);
$pdf->setXY(10,54);
$pdf->Cell(150,12,utf8_decode('TIPO DE PAGO:'),0,1);
$pdf->setXY(10,64);
$pdf->Cell(150,12,utf8_decode('TASA DE INTERES:'),0,1);
$pdf->setXY(10,74);
$pdf->Cell(150,12,utf8_decode('MONTO DEL PRESTAMO:'),0,1);
$pdf->setXY(10,84);
$pdf->Cell(150,12,utf8_decode('MONTO TOTAL:'),0,1);

$pdf->setXY(100,34);
$pdf->Cell(150,12,utf8_decode($nombre_completo),0,1);
$pdf->setXY(100,44);
$pdf->Cell(150,12,utf8_decode($anios." AÑOS"),0,1);
$pdf->setXY(100,54);
$pdf->Cell(150,12,utf8_decode($tipos_pagos_tipo_pago_id),0,1);
$pdf->setXY(100,64);
$pdf->Cell(150,12,utf8_decode($prest_tasa."%"),0,1);
$pdf->setXY(100,74);
$pdf->Cell(150,12,utf8_decode($banco_monto_prestamo."$"),0,1);

$pdf->setXY(100,84);
$pdf->Cell(150,12,utf8_decode($banco_monto_total."$"),0,1);

$pdf->Rect(10,100,190,64,'D');

$pdf->setXY(100,102);
$pdf->Cell(150,12,utf8_decode("PAGO"),0,1);
$pdf->setXY(12,115);
$pdf->Cell(150,12,utf8_decode('NUMERO DE PAGO:'),0,1);
$pdf->setXY(12,122);
$pdf->Cell(150,12,utf8_decode('FECHA DE PAGO:'),0,1);
$pdf->setXY(12,129);
$pdf->Cell(150,12,utf8_decode('CUOTA A PAGAR:'),0,1);
$pdf->setXY(12,136);
$pdf->Cell(150,12,utf8_decode('INTERES:'),0,1);
$pdf->setXY(12,143);
$pdf->Cell(150,12,utf8_decode('CAPITAL AMORTIZADO:'),0,1);
$pdf->setXY(12,150);
$pdf->Cell(150,12,utf8_decode('CAPITAL FINAL:'),0,1);


$pdf->setXY(100,115);
$pdf->Cell(150,12,utf8_decode($banco_no_pago),0,1);
$pdf->setXY(100,122);
$pdf->Cell(150,12,utf8_decode($prest_fecha_final ),0,1);
$pdf->setXY(100,129);
$pdf->Cell(150,12,utf8_decode($banco_cuota."$"),0,1);
$pdf->setXY(100,136);
$pdf->Cell(150,12,utf8_decode($banco_interes."$"),0,1);
$pdf->setXY(100,143);
$pdf->Cell(150,12,utf8_decode($banco_capital_amortizado."$"),0,1);
$pdf->setXY(100,150);
$pdf->Cell(150,12,utf8_decode($banco_capital_final."$"),0,1);




$pdf->setXY(10,170);
$pdf->Cell(150,12,utf8_decode('Usted brindó su conformidad y aceptación a los términos y condiciones establecidas en este Contrato.'),0,1);
$pdf->setXY(10,178);
$pdf->Cell(150,12,utf8_decode('Usted declara que el presente Contrato, así como la Hoja Resumen Informativa fueron puestos a su'),0,1);
$pdf->setXY(10,183);
$pdf->Cell(150,12,utf8_decode('disposición antes de firmarlos.'),0,1);
$pdf->setXY(10,191);
$pdf->Cell(150,12,utf8_decode('El Contrato ha sido aprobado mediante Resolución Nº 2198-2019, la cual puede encontrar en la página'),0,1);
$pdf->setXY(10,196);
$pdf->Cell(150,12,utf8_decode('web de la SBS. Usted firma estos documentos en señal de aceptación y conformidad de toda'),0,1);
$pdf->setXY(10,202);
$pdf->Cell(150,12,utf8_decode('información contenida en el mismo y que le ha sido entregada.'),0,1);



$pdf->Output('Prestamo.pdf','D');

?>
