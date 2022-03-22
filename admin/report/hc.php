<?php
require('fpdf.php');
require "../../model/consultas.model.php";

$fecha = date('d-m-Y H:i:s');
$idhc = $_REQUEST['idhc'];

$consulta = new Consultas();
$hc = $consulta->HistoriaClinica($idhc);

$pdf = new FPDF();
$pdf->SetLeftMargin(20);
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$pdf->Image('ima1.jpg', 20,5, 18);
$pdf->Image('fondo.jpg', 5,50, 200);
$pdf->Cell(180,10,'Historia Clinica Nro: '.$hc['numhistclinica'],0,1,'C');
$pdf->SetFont('Arial','',12);
$pdf->Ln();
$pdf->Cell(120,5,'Nombres y apellidos: '.$hc['nombre'],0,1,'L');
$pdf->cell(130);
$pdf->Cell(40,-5,'DNI: '.$hc['numhistclinica'],0,1,'L');
$pdf->SetFont('Arial','B',14);
$pdf->Cell(180,20,'FORMATO DE ATENCION INTEGRAL',1,1,'C');
$pdf->SetFont('Arial','',12);
$pdf->cell(10,-5,'Fecha: '.$hc['fecconsulta'].'               Hora: ' .$hc['horaconsulta'].'                      Edad: '.$hc['edad']);
$pdf->Ln(2);
$pdf->MultiCell(180,10,'Motivo: '. $hc['motivo']);
$pdf->MultiCell(180,10,'Signos y sintomas: '. $hc['signos']);
$pdf->MultiCell(180,10,'Relato Cronologico: '. $hc['relato']);

$pdf->SetFont('Arial','B',14);
$pdf->Cell(180,5,'Factores de riesgo identificado',1,1,'C');
$pdf->SetFont('Arial','',12);
$pdf->Ln(2);
$pdf->Cell(180,5,'Vacunas:' .$hc['vacunas'] ,0,1,'L');
$pdf->Ln(2);
$pdf->Cell(180,5,'Apetito:' .$hc['apetito'] .'      Sed:' .$hc['sed'].'          Sueno:' .$hc['sueno'].'         Orina:' .$hc['orina'].'              Deposiciones:' .$hc['deposicion'] ,0,1,'L');
$pdf->Ln(2);
$pdf->Cell(180,5,'Fiebre en los ultimos 15 dias:' .$hc['fiebre15'] .'      Viaje en las ultimas 2 semanas:' .$hc['viaje'].'          Lugar:' .$hc['lugar'],0,1,'L');
$pdf->Ln(2);
$pdf->Cell(180,5,'Tos hace 15 dias:' .$hc['tos15'] .'     Secrecion o lesion en genitales:' .$hc['secresion'],0,1,'L');
$pdf->Ln(2);
$pdf->Cell(180,5,'FUR:' .$hc['fur'] .'     Antecedentes de Importancia:',0,1,'L');


$pdf->SetFont('Arial','B',14);
$pdf->Ln();
$pdf->Cell(180,5,'EXAMENES FISICOS',1,1,'C');
$pdf->SetFont('Arial','',12);
$pdf->Ln(2);
$pdf->Cell(180,5,'Temperatura: ' .$hc['temp'] .'    | PA:' .$hc['pa'].' |  F.C.:' .$hc['fc'].' |  F.R.:' .$hc['fr'].'  | Peso:' .$hc['peso'].' | Talla:' .$hc['talla'].'  | P.Abd.:' .$hc['pabd'].' |  Saturacion:' .$hc['saturacion'],0,1,'L');

$pdf->MultiCell(180,10,'Diagnostico: '. $hc['diagnostico']);
$pdf->Ln(2);
$pdf->Cell(180,5,'Tipo de Examen: ' .$hc['tipoexamen'] .'       CIE X:'.$hc['ciex'],0,1,'L');
$pdf->MultiCell(180,10,'Tratamiento: '. $hc['tratamiento']);
$pdf->Ln(2);
$pdf->Cell(180,5,'Via: ' .$hc['via'] .'       Dosis:'.$hc['dosis'].'     Frecuencia:'.$hc['frecuencia'],0,1,'L');
$pdf->MultiCell(180,10,'Medidas Higienico - Dieteticas: '.$hc['medidashigienicas']);
$pdf->MultiCell(180,10,'Examenes Auxiliares: '. $hc['examenesauxiliares']);
$pdf->MultiCell(180,10,'Medidas preventivas: '. $hc['medidaspreventivas']);
$pdf->Ln(2);
$pdf->Cell(180,5,'Proxima Cita: ' .$hc['proximaconsulta'] .'       Observaciones:'.$hc['observaciones'],0,1,'L');
$pdf->Ln(2);
$pdf->Cell(180,5,'Doctor: ' .$hc['medico'],0,1,'L');



//F0ooter
	
	$pdf->SetY(-23);
    // Arial itálica 8
    $pdf->SetFont('Arial','I',8);
    // Color del texto en gris
    $pdf->SetTextColor(128);
    // Número de página
    $pdf->Cell(0,2,'Fecha: '.$fecha. ' Cod. Personal: 052-ED       Pagina '.$pdf->PageNo(),0,0,'C');

$pdf->Output();
?>