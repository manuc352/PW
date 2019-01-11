<?php
include 'connexionBD.php';
require('fpdf.php');

$trigramme = $_SESSION['Code'];
$nomListe = $_POST['nomListe'];

$pdoCarte = $pdo->prepare('SELECT CodeArticle, Description, Taille, Prix FROM $nomListe WHERE Trigramme = $trigramme') ;
$pdoCarte->execute();
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Ln();
$pdf->SetFillColor(100, 201, 255);
$pdf->SetFont('Arial','',12);
$pdf->SetFillColor(235, 235, 255);
$a =0;

foreach($pdoCarte as $ligne) {
	$pdf->SetY($a);
    $pdf->Cell(50,10, $trigramme." / ".$ligne['CodeArticle'], 1, 0, 'B', true);
    $pdf->Cell(50,10, $ligne['Prix'], 1, 0, 'B', true);
    $a +=20;
    $pdf->SetY($a);
    $pdf->Cell(50,10, $ligne['Taille'], 1, 0, 'B', true);
    $pdf->Cell(50,10, $ligne['Description'], 1, 0, 'B', true);
    $a +=20;
	}
}

$pdf->Output();
?>