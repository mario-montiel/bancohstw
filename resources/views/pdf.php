<?php
	
$pdf = new PDF('P','mm','letter');
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);


$pdf->Rect(8,8,200,264,'D');

$pdf->SetTextColor(150,150,150);
$pdf->setXY(59,12);
$pdf->Cell(150,12,utf8_decode('REPORTE DE MOVIMIENTOS DEL MES DE NOVIEMBRE'),0,1);


$pdf->Output("REPORTE_NOVIEMBRE",true);



?>
