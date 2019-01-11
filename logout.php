<?php
//demarrer la session
session_start();
//la detruire
session_destroy();

//rediriger vers le formulaire d'accueil
header('Location: index.php');
exit();

?>




