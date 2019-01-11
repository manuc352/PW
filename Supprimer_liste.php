<?php 
// Suppression d'une liste

	include 'connexion.php';

	$nomListe = $_POST['liste'];

	if(isset(($nomListe))){
		$Suppression = $bdd -> query("DROP TABLE IF EXISTS $nomListe");

	}

	else {
		echo "<script> alert('formulaire invalide'); </script> ";
		header("Location:ficheVente.php");
		mysql_close();
	}


?> 