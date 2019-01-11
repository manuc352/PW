<?php 
// Suppression d'un vêtement.
	include 'connexion.php';

	$nomListe = $_POST['nomListe']
	$code = $_POST['code'];

	if(isset($code) && isset($nomListe)){
		$Suppression = $bdd -> query('DELETE FROM $nomListe WHERE $code');
	}
	else {
		echo "<script> alert('formulaire invalide'); </script> ";
		header("Location:Fiche_vente.html");
		mysql_close();
	}

?> 

