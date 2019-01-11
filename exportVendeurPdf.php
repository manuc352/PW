<?php
include 'connexionBD.php';


require('fpdf/fpdf.php');

$pdoVendeur = $pdo->prepare("SELECT * FROM acces") ;
$pdoVendeur->execute();
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(140, 10, 'VENDEURS', 0, 1, 'C');
$pdf->Ln();
$pdf->SetFillColor(100, 201, 255);
$pdf->Cell(80, 10, 'Nom', 1, 0, 'C', true);
$pdf->Cell(0, 10, 'Prenom', 1, 1, 'C', true);
$pdf->SetFont('Arial','',12);
$pdf->SetFillColor(235, 235, 255);
foreach($pdoVendeur as $ligne) {
    $pdf->Cell(80,10, $ligne['Nom'], 1, 0, 'L', true);
    $pdf->MultiCell(0,10, $ligne['Prenom'], 1, 1, 'J');
}

$pdf->Output();
?>
