
<?php 

ini_set('display_errors', 1);
error_reporting(-1);
include 'connexionBD.php';
$recap = $pdo -> query('UPDATE vetement SET Statut="INVENDU" WHERE Statut <> "VENDU"');

header("Location: AccueilVente.php");

 ?>