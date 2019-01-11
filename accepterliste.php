<?php
ini_set('display_errors', 1);
error_reporting(-1);
include 'connexionBD.php';
$liste=$_POST["Acceptation"];
$recap = $pdo -> query('UPDATE liste SET Statut="ACCEPTEE" WHERE idLISTE=\'' .$liste. '\'');
header("Location: AccueilVente.php");
?>