<?php


include 'connexionBD.php';

// on va faire une pochette de dvd, avec la tranche et tout
require('fpdf/fpdf.php');

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
$pdf->MultiCell(100,5,'Synthese vendeur',0,"L");


$pdf->SetFont('Arial','',9);
$texte="Liste des articles recueillis dans l'url de cette page, faire un while. Et si possible, ressortir une image de l'article correspondant dan la base de données";
$trigramme=$_POST['trigramme'];
$recap = $pdo -> query('SELECT CodeArticle, Description, Prix, statut, taille FROM vetement WHERE vetement.LISTE_idLISTE=(SELECT idListe From Liste where trigramme=\'' .$trigramme. '\')');


$pdf->SetFont('Arial','B',11);
$pdf->Ln();
$pdf->SetFillColor(100, 201, 255);
$pdf->Cell(30, 10, 'Code Article', 1, 0, 'C', true);
$pdf->Cell(50, 10, 'Description', 1, 0, 'C', true);
$pdf->Cell(20, 10, 'Prix', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Statut', 1, 0, 'C', true);
$pdf->Cell(15, 10, 'Taille', 1, 1, 'C', true);
$pdf->SetFont('Arial','',11);
$pdf->SetFillColor(235, 235, 255);
while ($donnees = $recap -> fetch()){
    $pdf->Cell(30,10, $donnees['CodeArticle'], 1, 0, 'L', true);
    $pdf->Cell(50,10, $donnees['Description'], 1, 0, 'C', true);
    $pdf->Cell(20,10, $donnees['Prix'], 1, 0, 'J', true);
    $pdf->Cell(30,10, $donnees['statut'], 1, 0, 'J', true);
    $pdf->MultiCell(15,10, $donnees['taille'], 1, 0, 'J', true);
}

$recap = $pdo -> query('SELECT SUM(prix) FROM vetement WHERE (vetement.LISTE_idLISTE=(SELECT idListe From Liste where trigramme=\'' .$trigramme. '\')) AND vetement.Statut="VENDU"');

while ($donnees = $recap -> fetch()){
$pdf->Cell(80,4,utf8_decode("Somme des prix des articles vendus : ".$donnees['SUM(prix)']." euros"));
}

// Ecriture dans le pied de page
$pdf->SetXY(10,-10);
$pdf->SetFont('Arial','I',8);
$texte="nom et prenom du client";
$pdf->Cell(120,2,$texte);

// sortir le pdf vers le navigateur
$pdf->Output();
?>