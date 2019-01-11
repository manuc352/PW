<?php
	session_start();

	include 'connexionBD.php';
	
	if (isset($_POST['update']) && isset($_SESSION['modif'])) {

		$iterator1 = new ArrayIterator($_SESSION['modif']);
		$iterator2 = new ArrayIterator($_POST['comm']);

		$multiIterator = new MultipleIterator();
		$multiIterator->attachIterator($iterator1);
		$multiIterator->attachIterator($iterator2);

		/*foreach($multiIterator as $combi){
			$conn->query(iconv("UTF-8", "ISO-8859-1",'insert into favoris (nom_animal, commentaire) values ("'.$combi[0].'", "'.trim(iconv("ISO-8859-1", "UTF-8", $combi[1])).'")'));
		}*/
		unset($_SESSION['modif']);
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="icon" sizes="144x144" href="image.ico">
		<title>Glazik Gym</title>
		
		<?php
			include 'template/headCSS.php';
		?>

		<script>
			function viderRmq() {
				document.getElementById('rmq').innerHTML = "";
			}
			
			function remarque(button) {
				if(button == 'mod' && document.getElementById('mod').disabled == true) {
					document.getElementById('rmq').innerHTML = "Il faut choisir au moins une ligne à modifier !";
				} else if (button == 'supp' && document.getElementById('supp').disabled == true){
					document.getElementById('rmq').innerHTML = "Il faut choisir au moins une ligne à supprimer !";
				} else if (button == 'ajout' && document.getElementById('ajout').disabled == true){
					document.getElementById('rmq').innerHTML = "Tous les animaux disponibles dans la base ont déjà été ajoutés !";
				}
			}

			function existe() {
				var a = 0;
				var form = document.forms.f0;
				var coche = form.elements['compte[]'];
				for (var i = 0; i < coche.length; i++) {
	    				if(coche[i].checked)
						a = 1;
				}
				if (a == 0) {
					document.getElementById('mod').disabled = true;
					document.getElementById('supp').disabled = true;
				} else {
					document.getElementById('mod').disabled = false;
					document.getElementById('supp').disabled = false;
				}
			}
		</script>
	</head>


	<!-- 
		INFO:
		Add 'boxed' class to body element to make the layout as boxed style.
		Example: 
		<body class="boxed">	
	-->
	<body onload="existe();">
	
	<div id="fh5co-page">
		<section id="fh5co-header">
			<div class="container">
				<nav role="navigation">
					<?php
						include 'navigation.php';
					?>
				</nav>
			</div>
		</section>
		<!-- #fh5co-header -->

		<section id="fh5co-hero" class="js-fullheight" style="background-image: url(template/images/hero_bg.jpg);" data-next="yes">
			<div class="fh5co-overlay"></div>
			<div class="container">
				<div class="fh5co-intro js-fullheight">
					<div class="fh5co-intro-text">
						<!-- 
							INFO:
							Change the class to 'fh5co-right-position' or 'fh5co-center-position' to change the layout position
							Example:
							<div class="fh5co-right-position">
						-->
						<div>

							<form id="f0" onchange="existe();" method="post" action="vendeur.php">
								<?php
									function actionCompte($compte) {
										$c =  '<input type="checkbox" name="compte[]" value="'.$compte.'"/>';
										return $c;
									}
									
									try {
										$pdoCompte = $pdo->prepare("SELECT * FROM acces") ;
										$pdoCompte->execute();
										echo '<table class="t3">'."\n";
										echo '<tr class="hd"><th>Code</th><th>Nom</th><th>Prénom</th><th>Email</th><th>Téléphone</th><th>Adresse</th><th>Code postal</th><th>ville</th><th>Mot de passe</th><th>Autorisation</th><th>Sélection</th></tr>'."\n";
										foreach($pdoCompte as $ligne) {
											echo "<tr>";
											echo "<td>".$ligne['Code']."</td>"."\n";
											echo "<td>".$ligne['Nom']."</td>"."\n";
											echo "<td>".$ligne['Prenom']."</td>"."\n";
											echo "<td>".$ligne['Email']."</td>"."\n";
											echo "<td>".$ligne['Telephone']."</td>"."\n";
											echo "<td>".$ligne['Adresse']."</td>"."\n";
											echo "<td>".$ligne['CodePostal']."</td>"."\n";
											echo "<td>".$ligne['Ville']."</td>"."\n";
											echo "<td>".$ligne['Mot de passe']."</td>"."\n";
											echo "<td>".$ligne['Autorisation']."</td>"."\n";
											echo "<td>".actionCompte($ligne['Code'])."</td>"."\n";
											echo "</tr>";
										}
										echo "</table>\n";
									}
									catch(PDOException $a) {
										echo "sth in query failed: " . $e->getMessage(); 
									}
									
								?>
								<br/>
								<input type="submit" name="faireModif" id="mod" value="Modifier" onmouseover="remarque('mod');" onmouseout="viderRmq();"/>
								<input type="submit" name="faireSupp" id="supp" value="Supprimer" onmouseover="remarque('supp');" onmouseout="viderRmq();"/>
								<input type="submit" name="faireAjout" id="ajout" value="Ajouter" onmouseover="remarque('ajout');" onmouseout="viderRmq();"/>
								<span id="rmq"></span>
							</form>

							<br/>
							<form id="export" method="post" action="exportVendeurPdf.php">
								<p>Exporter ces données : </p>
								<input type="submit" name="exportVendeur" value="Télécharger"/>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="fh5co-learn-more animate-box">
				<a href="#" class="scroll-btn">
					<span class="text">Explore more about us</span>
					<span class="arrow"><i class="icon-chevron-down"></i></span>
				</a>
			</div>
		</section>
		<!-- END #fh5co-hero -->

		<?php
			include 'template/footer.php';
		?>
	</div>
	<!-- END #fh5co-page -->
	
	<?php
			include 'template/javascript.php';
	?>

	</body>
</html>

