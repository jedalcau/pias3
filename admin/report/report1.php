<?php
require('fpdf.php');
require('consultas.php');

$consulta = new Consultas();
$fechainicio = $_REQUEST['fechainicio'];
$data = $consulta->Atenciones1($fechainicio);

class PDF extends FPDF
{
    function Header()
    {
        // Logo
        $this->Image('ima1.jpg',10,6,10);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Move to the right
        $this->Ln();
        
        $this->Cell(0,30,'REPORTE ESPECIFICO DE ATENCIONES',0,0,'C');        
        // Line break
        $this->Ln(10);
    }

    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

#$pdf=new FPDF();
/** Rotar hoja en horizontal */
$pdf=new PDF('L','mm','A4');
$pdf->AddPage();
/* ENCABEZADO */
$pdf->SetFontSize(14);
$pdf->SetFont('Arial','B');

$pdf->Ln(10);
$pdf->SetFontSize(9);
$pdf->SetFont('Arial','B');
$pdf->Cell(30,10,"Fecha Inicial: " . $fechainicio,0,0,"L",0);
$pdf->Cell(120,10,"Fecha Final: ",0,0,"C",0);

$pdf->SetLineWidth(1);
$pdf->Line(10,40,285,40);
$pdf->Ln(15);
$pdf->SetLineWidth(0.20);
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(40,40,40);
$pdf->SetDrawColor(80,80,80);
$pdf->Cell(10,10,"Num",1,0,"C",1);
$pdf->Cell(50,10,"Apellidos",1,0,"C",1);
$pdf->Cell(30,10,"Nombre(s)",1,0,"C",1);
$pdf->Cell(30,10,"DNI",1,0,"C",1);
$pdf->Cell(30,10,"Localidad",1,0,"C",1);
$pdf->Cell(30,10,"Fecha Nacimiento",1,0,"C",1);
$pdf->Cell(10,10,"Edad",1,0,"C",1);
$pdf->Cell(30,10,"Sexo",1,0,"C",1);
$pdf->Cell(60,10,"Diagnostico",1,0,"C",1);
$pdf->Ln();
$i = 1;
while($fila=$data->fetch_array(MYSQLI_ASSOC))
{
    $pdf->Cell(10,10,$i,1,0,'C',1);
    $pdf->Cell(50,10,$fila['apellidos'],1,0,'L',1);
    $pdf->Cell(30,10,$fila['nombre'],1,0,'C',1);
    $pdf->Cell(30,10,$fila['dni'],1,0,'C',1);
    $pdf->Cell(30,10,$fila['ciudad'],1,0,'C',1);
    $pdf->Cell(30,10,$fila['fecnac'],1,0,'C',1);
    $pdf->Cell(10,10,$fila['edad'],1,0,'C',1);
    $pdf->Cell(30,10,$fila['sexo'],1,0,'C',1);
    $pdf->Cell(60,10,$fila['diagnostico'],1,0,'L',1);
    $i++;
    $pdf->Ln();
}

$pdf->Output();
?>