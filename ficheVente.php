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
			include 'template/headCSS.php';
		?>

		<script type="text/javascript">					
			function verification(f){
				var nomOk = verifVide(f.nom);
				var descriptionOk = verifVide(f.description);
				var tailleOk = verifVide(f.taille);
				var prixOk = verifPrix(f.prix);
									
				if(nomOk && descriptionOk && tailleOk && prixOk ){
					return true;
				}
				else{
					alert("Veuillez remplir correctement tous les champs");
					return false;
				}
			}
									
			function verifVide(champ){
				if(champ.value.length < 1 || champ.value.length > 50){
					surligne(champ, true);
					return false;
				}
				else{
					surligne(champ, false);
					return true;
				}
			}

			function verifPrix(champ){
				var regex = /^[0-9]+$/;
				if(!regex.test(champ.value)){
					surligne(champ, true);
					return false;
				}
				else{
					surligne(champ, false);
					return true;
				}
			}
			
			function surligne(champ, erreur){
				if(erreur){
					champ.style.backgroundColor = "#fba";
				}
				else{
					champ.style.backgroundColor = "";
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
						<div >
							<label for="ajout"> Pour chaque vêtements que vous souhaitez mettre en vente, il vous sera demandé les informations suivantes : </label>
							<form method="post" action="Ajouter_liste.php" onsubmit="return verification(this)" id="ajout">
								<label for="nom"> Nom de la liste: 
									<div class="infobulle">
										<img src="template/images/interrogation"/>
										<span> Exemple : 'Vêtement été </span>
									</div>
								</label>
								<input type="text" name="nom" id="nom" onblur="verifVide(this)"/> <br />
								
								<label for="prenom">Description : 
									<div class="infobulle">
										<img src="template/images/interrogation"/>
										<span> Exemple : 'Jamais porté' </span>
									</div>
								</label>
								<input type="text" name="description" id="description" onblur="verifVide(this)"/> <br />
								
								<label for="taille">Taille : 
									<div class="infobulle">
										<img src="template/images/interrogation"/>
										<span> Exemple: 'L' </span>
									</div>
								</label>
								<input type="text" name="taille" id="taille"  onblur="verifVide(this)"/> <br />
								
								<label for="prix">Prix : 
									<div class="infobulle">
										<img src="template/images/interrogation"/>
										<span> Uniquement des prix entiers </span>
									</div>
								</label>
								<input type="number" name="prix" id="prix" onblur="verifPrix(this)"/> <br />
								
								
								<input type="submit" name="ajouter" id ="ajouter" value="Ajouter à la liste" />					
							</form> <br />
							
							<label for="supliste"> Pour supprimer une liste de vêtements, vous devez entrer le nom de la liste dans le champs ci-dessous. </label>
							<form method="post" action="Supprimer_liste.php" id="supliste"> 
								<input type="text" name="supprimer" value="Nom de la liste"/>
								<input type="submit" name="valider" value="Valider suppression" />
							</form> </br>
							<label for="supvet"> Pour supprimer un vêtement d'une liste, vous devez entrer le nom de sa liste et son code article (que vous trouverez dans le récapitulatif). </label>
							<form method="post" action="Supprimer_vêtement.php" id="supvet" >
								<input type="text" name="supprimer" value="Nom de la liste"/> 
								<input type="text" name="supprimer" value="Code du vêtement"/>
								<input type="submit" name="valider" value="Valider suppression" />
							</form>
							<label for="impre"> Veuillez indiquer le nom de la liste que vous souhaitez imprimer, pour le télécharger en PDF. </label>
							<form method="post" action="convPDF.php" id="impre">
								<input type="text" name="nomListe" value="Nom de la liste à imprimer"/>
								<input type="submit" name="PDF" value="PDF"/>
							</form>
							</table>
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

