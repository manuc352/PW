<?php
ini_set('display_errors', 1);
error_reporting(-1);
include 'connexionBD.php';
$liste=$_POST["EnVente"];
$recap = $pdo -> query('UPDATE liste SET Statut="EN VENTE" WHERE idLISTE=\'' .$liste. '\'');


	session_start();
	
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

							<form id="f0" onchange="existe();" method="post" action="chmtstatutvetement.php">
								<?php
									function actionCompte($compte) {
										$c =  '<input type="checkbox" name="compte[]" value="'.$compte.'"/>';
										return $c;
									}
									
								$pdoCompte = $pdo->prepare("SELECT * FROM vetement where LISTE_idLISTE= :liste") ;
								$pdoCompte->bindValue(":liste", $liste);
										$pdoCompte->execute();
										echo '<table class="t3">'."\n";
										echo '<tr class="hd"><th>Code Article</th><th>Taille</th><th>Prix</th><th>Description</th><th>Statut</th><th>Liste</th><th>Indiquer vetement non present</th></tr>'."\n";
										foreach($pdoCompte as $ligne) {
											echo "<tr>";
											echo "<td>".$ligne['CodeArticle']."</td>"."\n";
											echo "<td>".$ligne['Taille']."</td>"."\n";
											echo "<td>".$ligne['Prix']."</td>"."\n";
											echo "<td>".$ligne['Description']."</td>"."\n";
											echo "<td>".$ligne['Statut']."</td>"."\n";
											echo "<td>".$ligne['LISTE_idLISTE']."</td>"."\n";
											echo "<td>".actionCompte($ligne['CodeArticle'])."</td>"."\n";
											echo "</tr>";
										}
										echo "</table>\n";
									
								?>
								<br/>
								<input type="submit" name="soumettre" id="mod" value="Soumettre" onmouseover="remarque('mod');" onmouseout="viderRmq();"/>
								<span id="rmq"></span>
							</form>

							<br/>
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

