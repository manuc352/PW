<?php 

ini_set('display_errors', 1);
error_reporting(-1);
include 'connexionBD.php';
$codeArticle=$_POST['Retirer'];
		$recap = $pdo -> query('UPDATE vetement SET Statut="RETIRE" WHERE CodeArticle=\'' .$codeArticle. '\'');

header("Location: AccueilVente.php");

 ?>