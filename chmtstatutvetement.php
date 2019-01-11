<?php 
ini_set('display_errors', 1);
error_reporting(-1);
include 'connexionBD.php';
$code=$_POST['compte'];
foreach($_POST['compte'] as $code) {
			$recap = $pdo -> query('UPDATE vetement SET Statut="NON PRESENT" WHERE CodeArticle=\'' .$code. '\'');
		}

header("Location: AccueilVente.php");


 ?>