<?php

$ticket=$_GET['liste'];
$tableau = explode(";", $ticket);
$test1=$tableau[1];
// on va faire une pochette de dvd, avec la tranche et tout
require('fpdf/	fpdf.php');

// creer le pdf en mode portrait, unites en mm, de 270 sur 180 mm
$pdf=new FPDF('P','mm',array(270,180));
$pdf->SetAutoPageBreak(0);


// cree une page dans le document, sinon vide
$pdf->AddPage();

// definir la police : sf_old_republic en 45 points
// placement du pointeur et ecriture du titre
$pdf->SetFont('Arial','',30);
$pdf->SetXY(15,15);
$pdf->MultiCell(200,15,'Vide dressing de "ville" + "date"',0,"A");


// descriptif
// placer le pointeur pour le texte
// definir le texte
// ecrire le titre et texte avec multicell
$pdf->SetXY(10,30);
$pdf->SetFont('Arial','B',12);
$pdf->MultiCell(100,5,'Ticket client',0,"L");


$pdf->SetFont('Arial','',9);
$texte="Liste des articles recueillis dans l'url de cette page, faire un while. Et si possible, ressortir une image de l'article correspondant dan la base de données";
for ($i=0; $i < count($tableau); $i++) { 
	$pdf->SetX(15);
	$pdf->MultiCell(80,4,utf8_decode($tableau[$i]));
}


// Ecriture dans le pied de page
$pdf->SetXY(10,-10);
$pdf->SetFont('Arial','I',8);
$texte="nom et prenom du client";
$pdf->Cell(120,2,$texte);

// sortir le pdf vers le navigateur
$pdf->Output();
?>