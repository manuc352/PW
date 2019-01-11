<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="icon" sizes="144x144" href="image.ico">
		<title>Glazik Gym</title>
		
		<?php
			include 'template/headCss.php';
		?>
	</head>


	<!-- 
		INFO:
		Add 'boxed' class to body element to make the layout as boxed style.
		Example: 
		<body class="boxed">	
	-->
	<body>
	
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
						<div class="fh5co-left-position">
							<h1>Bienvenue sur la vente du vide dressing</h1>
	
							<form method="post" action="EnregistrementClient.php">
								<label for="nom"> Nom : </label>
								<input id="nom" type="text" name="NomClient"> 
								<label for="prenom"> Prénom : </label>
								<input id="prenom" type="text" name="PrenomClient">
								<input type="submit" name="NewClient" value="Valider"/>
   							</form>
   							<form method='post' action="editionparvendeur.php">
   								<label for="edition du document par vendeur">Saisir trigramme vendeur</label>
   								<input type="text" name="trigramme">
								<input type="submit" name="edition" value="edition">
   							</form>
   							<form method="post" action="accepterListe.php">
   								<label for="Accepter une liste">Paiement de la liste reçu</label>
   								<input type="text" name="Acceptation">
								<input type="submit" name="edition" value="Accepter">
   							</form>
   							<form method="post" action="ListeEnVente.php">
   								<label for="Mettre une liste en vente">passer en vente une liste ou modifier statut article</label>
   								<input type="text" name="EnVente">
								<input type="submit" name="edition" value="envente">
   							</form>
   							<form method="post" action="retirerArticle.php">
   								<label for="Retirer article vente">Retirer article de la vente</label>
   								<input type="text" name="Retirer" value="Code Article">
								<input type="submit" name="Retir" value="Retirer">
   							</form>
   							<form method="post" action="FinVente.php">
   								<label for="fin de vente">Fin de Vente</label>
								<input type="submit" name="fin" value="Retirer">
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

