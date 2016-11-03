<?php session_start();
require_once ("../conexion/conexion.php");
require('../php/fpdf/fpdf.php');
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image('../images/logo.png',10,10,40);
        // Arial bold 15
        $this->SetFont('Arial','B',12);
        // Movernos a la derecha
        $this->Cell(50);
        // Título
        $this->Cell(120,20,'Lista de apartamentos',0,0,'C');
        // Salto de línea
        $this->Ln(30);
    }
    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
    }
}
// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$consulta_aptos = mysql_query("SELECT a.rmb_aptos_id, t.rmb_torres_nom, a.rmb_aptos_nom, r.rmb_residente_nom, r.rmb_residente_ape, tres.rmb_tres_nom, (SELECT est.rmb_est_nom FROM rmb_est est WHERE est.rmb_est_id = tes.rmb_est_id) AS estado FROM rmb_aptos a LEFT JOIN rmb_residente_x_aptos rxa USING(rmb_aptos_id) LEFT JOIN rmb_residente r USING(rmb_residente_id) LEFT JOIN rmb_tesoreria tes USING(rmb_aptos_id) LEFT JOIN rmb_torres t USING(rmb_torres_id) LEFT JOIN rmb_tres tres USING(rmb_tres_id) GROUP BY a.rmb_aptos_id ORDER BY a.rmb_torres_id ASC, a.rmb_aptos_nom ASC", conexion());
if ($consulta_aptos) {
    if (mysql_num_rows($consulta_aptos) > 0) {
        $pdf->Ln(5);
        $pdf->Cell(10,5,'Torre',0,0,'C');
        $pdf->Cell(5);
        $pdf->Cell(10,5,'Apto',0,0,'C');
        $pdf->Cell(5);
        $pdf->Cell(80,5,'Residente',0,0,'C');
        $pdf->Cell(5);
        $pdf->Cell(30,5,'Tipo',0,0,'C');
        $pdf->Cell(5);
        $pdf->Cell(20,5,'Estado',0,0,'C');
        $pdf->Ln(5);
        while ($row_info = mysql_fetch_array($consulta_aptos)) { 
            $pdf->Ln(5);
            $pdf->Cell(10,5,$row_info[1],0,0,'C');
            $pdf->Cell(5);
            $pdf->Cell(10,5,$row_info[2],0,0,'C');
            $pdf->Cell(5);
            $pdf->Cell(80,5,$row_info[3].' '.$row_info[4],0,0,'L');
            $pdf->Cell(5);
            $pdf->Cell(30,5,$row_info[5],0,0,'L');
            $pdf->Cell(5);
            $pdf->Cell(20,5,$row_info[6],0,0,'L');
            $pdf->Ln(5);
        }
    }
    else{$pdf->Cell(0,10,'No hay resultados',0,0,'L');}
}
else{$pdf->Cell(0,10,'Error al generar la consulta',0,0,'L');}

// $pdf->Output();
$pdf->Output('F', 'ResultadosEncuesta.pdf');
?>