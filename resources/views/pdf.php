<?php

include "C:/xampp/htdocs/bancohstw/FPDF/fpdf.php";

$banco_nombre = "AXEL ALBERTO SERNA ROMAN";
$banco_anios = "3 AÑOS";
$banco_tipo_pago = "MENSUAL";
$banco_tasa = "3%";
$banco_monto_prestamo = "12,000 $";
$banco_monto_total = "12,360 $";


$banco_no_pago = "17090069";
$banco_fecha_pago = "30/11/2019";
$banco_cuota = "343$";
$banco_interes = "10$";
$banco_capital_amortizado = "360$";
$banco_capital_final = "12,360$";

	
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
$pdf->Cell(150,12,utf8_decode($banco_nombre),0,1);
$pdf->setXY(100,44);
$pdf->Cell(150,12,utf8_decode($banco_anios),0,1);
$pdf->setXY(100,54);
$pdf->Cell(150,12,utf8_decode($banco_tipo_pago),0,1);
$pdf->setXY(100,64);
$pdf->Cell(150,12,utf8_decode($banco_tasa),0,1);
$pdf->setXY(100,74);
$pdf->Cell(150,12,utf8_decode($banco_monto_prestamo),0,1);
$pdf->setXY(100,84);
$pdf->Cell(150,12,utf8_decode($banco_monto_total),0,1);

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
$pdf->Cell(150,12,utf8_decode($banco_fecha_pago),0,1);
$pdf->setXY(100,129);
$pdf->Cell(150,12,utf8_decode($banco_cuota),0,1);
$pdf->setXY(100,136);
$pdf->Cell(150,12,utf8_decode($banco_interes),0,1);
$pdf->setXY(100,143);
$pdf->Cell(150,12,utf8_decode($banco_capital_amortizado),0,1);
$pdf->setXY(100,150);
$pdf->Cell(150,12,utf8_decode($banco_capital_final),0,1);




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



$pdf->Output('name.pdf','D');

?>
