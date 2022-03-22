<?php
require('fpdf.php');
require "../../model/consultas.model.php";

$fecha = date('d-m-Y H:i:s');
$idhc = $_REQUEST['idhc'];

$pdf = new FPDF('P','mm','A5');

$consulta = new Consultas();
$data = $consulta->Receta($idhc);

$pdf->AddPage();
$pdf->SetMargins(10,10);

$pdf->SetFont('Arial','',8);
$pdf->cell(80);
$pdf->Cell(0,8,'CODIGO DE PAGO: ',1,0,'L');
$pdf->Ln();
$pdf->cell(80);
$pdf->Cell(0,8,'Monto:',1,0,'L');
$pdf->Ln();
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,10,'PIAS LAGO TITICACA I',0,0,'C');
$pdf->Ln();
$pdf->Cell(0,5,'RECETA UNICA ESTANDARIZADA',0,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','',9);
$pdf->Ln();
$pdf->Cell(0,5,'Tipo de usuario             : '.$data['tipusuario'],0,0,'L');
$pdf->Ln();
$pdf->Cell(0,5,'Tipo de Atencion           : '.$data['tipatencion'],0,0,'L');
$pdf->Ln();
$pdf->Cell(0,5,'Especialidad Medica     : '.$data['especialidad'],0,0,'L');
$pdf->Ln();
$pdf->Cell(0,5,'Otro                               : '.$data['otro'],0,0,'L');
$pdf->Ln();

$pdf->Cell(0,5,'Numero de Historia Clinica:      '.$data['numhistoria'].'                    Codigo SIS: '.$data['codsis'] ,0,0,'L');
$pdf->Ln();
$pdf->Cell(0,5,'Nombres y Apellidos:  '.$data['nombres'].'                      Edad: '.$data['edad'],0,0,'L');
$pdf->Ln();
$pdf->Cell(0,5,'Diagnostico (definitivo/Preventico):                          CIE 10: ________',0,0,'L');
$pdf->Ln();
$pdf->MultiCell(0, 6, utf8_decode($data['diagnostico']));

$pdf->SetFont('Arial','',10);
$pdf->Ln();
$pdf->Cell(0,10,'Tratamiento:  ',0,0,'C');
$pdf->Ln();
$pdf->MultiCell(0, 6, utf8_decode($data['tratamiento']));
$pdf->SetFont('Arial','',8);
$pdf->SetY(170);
$pdf->Cell(0,2,'  '.$fecha,0,0,'C');
$pdf->Ln();
$pdf->Cell(0,5,'________________________                ___________________                     ____________________',0,0,'L');
$pdf->Ln();
$pdf->Cell(0,2,'  Sello/Firma/Cod.Profesional                      Fecha de Atencion                              Recibi Conforme',0,0,'L');

//  Footer
	
	$pdf->SetY(-25);
    // Arial itálica 8
    $pdf->SetFont('Arial','I',8);
    // Color del texto en gris
    $pdf->SetTextColor(128);
    // Número de página
    $pdf->Cell(0,2,'Fecha: '.$fecha. ' Cod. Personal: 052-ED       Pagina '.$pdf->PageNo(),0,0,'C');
$pdf->Output();
?>