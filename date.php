<?php


if(isset ($_SESSION['connecte']) &&  $_SESSION['connecte'] == "oui"){
	if(isset($_SESSION['autorisation']) && $_SESSION['autorisation'] == "oui"){
		echo '<label for="start">Modifier date:</label>';
		echo '<input type="date" id="start" name="trip-start" value="2018-07-22" min="2018-01-01" max="2018-12-31"/>';
	}
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