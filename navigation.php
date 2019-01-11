<?php

echo "<ul class='pull-left left-menu'>";
echo "<li><a href='presentation.php'>Présentation</a></li>"; 

if(isset ($_SESSION['connecte']) &&  $_SESSION['connecte'] == "oui"){
	echo "<li><a href='ficheVente.php'>Fiche vente</a></li>";
	echo "</ul>";
	echo "<h1 id='fh5co-logo'><a href='accueil.php'>Glazik Gym - Vide dressing</a></h1>";
	echo "<ul class='pull-right right-menu'>";
	if(isset($_SESSION['autorisation']) && $_SESSION['autorisation'] == "oui"){
		echo "<li><a href='AccueilVente.php'>Accueil vente</a></li>";
		echo "<li><a href='gestionVendeur.php'> Vendeurs </a></li>";
	}
	echo "<li><a href='logout.php'> <img id='logoff' src='logoff2.png' alt='Déconnection'> </a></li>";
	echo "</ul>";
}
else{
	echo '</ul>';
	echo "<h1 id='fh5co-logo'><a href='index.php'>Glazik Gym - Vide dressing</a></h1>";
	echo "<ul class='pull-right right-menu'>";
	echo "<li class='fh5co-cta-btn'><a href='connexion.php'>Connexion</a></li>";
	echo "<li class='fh5co-cta-btn'><a href='inscription.php'>Inscription</a></li>";
	echo "</ul>";
}



?>