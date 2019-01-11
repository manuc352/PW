<?php
session_start();
include 'connexionBD.php';
	
	if (isset($prix) && isset($taille) && isset($type)){
	$idVetement = 0;
 	$idListe = 0;
	$trigramme = $_SESSION['Code'];
	$codeArticle = rand( int 1000 , int 9999);				
	$description = $_POST['description'];			
	$taille = $_POST['taille'];
	$prix = $_POST['prix'];
	$nomListe = "vetement";		$a =0;
	
	
	$tailleListe = $bdd -> query ("SELECT COUNT(Code) FROM $nomListe");	
	// Calcule taille de la liste.	
	
		// Présence d'une liste avec espace
		if ($tailleListe => 0 && $tailleListe <= 40){
			$IDVetement++;

			$ajoutVetement = $bdd -> query("INSERT INTO $nomListe ('IDVetement', `IDListe`, `Trigramme`, `CodeArticle`, `Description`, `Taille`, `Prix`, `Statut`) VALUES (:IDVetement, :IDListe, :Trigramme, :CodeArticle ,:Description ,:Taille, :Prix, :Statut");
			$ajout->bindValue(':IDVetement', $idVetement);
			$ajout->bindValue(':IDListe', $idListe);
			$ajout->bindValue(':Trigramme', $trigramme);
			$ajout->bindValue(':CodeArticle', $codeArticle);
			$ajout->bindValue(':Description', $description);
			$ajout->bindValue(':Taille', $taille);
			$ajout->bindValue(':Prix', $prix);
			$ajout->bindValue(':Statut', 'Non fourni');
			$ajout->execute();

		else {
			$IDListe++;
			$a++;
			$nomListe = $nomListe.$a;

			$creationListe = $bdd -> query("CREATE TABLE nomListe 
				( 
				IDVetement INT() PRIMARY KEY NOT NULL,
				Trigramme VARCHAR(3) NOT NULL, 
				Taille VARCHAR(20) NOT NULL, 
				Prix DECIMAL(5) NOT NULL, 
				Description VARCHAR(50) NOT NULL, 
				Statut VARCHAR(15) NOT NULL,
				CodeArticle INT (4) NOT NULL, 
				IDListe INT() NOT NULL, 
				)"
			);

			$newListe = $bdd -> query("INSERT INTO LesListes ('ID Liste', 'Trigramme', 'Statut') VALUES (:IDListe, :Trigramme, :Statut) ");
				$ajout->bindValue(':IDListe', $idListe);
				$ajout->bindValue(':Trigramme', $trigramme);
				$ajout->bindValue(':Statut', "Soumis");

			$ajoutVetement = $bdd -> query("INSERT INTO $nomListe ('IDVetement', `IDListe`, `Trigramme`, `CodeArticle`, `Description`, `Taille`, `Prix`, `Statut`) VALUES (:IDVetement, :IDListe, :Trigramme, :CodeArticle ,:Description ,:Taille, :Prix, :Statut");
			$ajout->bindValue(':IDVetement', $idVetement);
			$ajout->bindValue(':IDListe', $idListe);
			$ajout->bindValue(':Trigramme', $trigramme);
			$ajout->bindValue(':CodeArticle', $codeArticle);
			$ajout->bindValue(':Description', $description);
			$ajout->bindValue(':Taille', $taille);
			$ajout->bindValue(':Prix', $prix);
			$ajout->bindValue(':Statut', 'Non fourni');
			$ajout->execute();
		} 
	}
	else {
		echo "<script> alert('formulaire invalide'); </script> ";
		header("Location:Fiche_vente.html");
		mysql_close();
	}
?>