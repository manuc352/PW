<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="icon" sizes="144x144" href="image.ico">
		<title>Glazik Gym</title>
		
		<?php
			include 'template/headCSS.php';
		?>
	</head>

	<script type="text/javascript">					
		function verification(f){
			var nomOk = verifVide(f.nom);
			var prenomOk = verifVide(f.prenom);
			var mailOk = verifMail(f.email);
			var telOk = verifTel(f.tel);
			var adresseOk = verifAdresse(f.adresse);
			var codeOk = verifCode(f.codepostal);
			var villeOk = verifVille(f.ville);
			var mdpOk = verifMdp(f.mdp);
			var cmdpOk = verifCmdp(f.cmdp);
								
			if(nomOk && prenomOk && mailOk && telOk && adresseOk && mdpOk && cmdpOk){
				return true;
			}
			else{
				alert("Veuillez remplir correctement tous les champs");
				return false;
			}
		}
								
		function verifVide(champ){
			var regex = /^[a-zA-z\sàâäéèêëïîôöùûüç'-]*$/;
			if(champ.value.length < 2 || champ.value.length > 50 || !regex.test(champ.value)){
				surligne(champ, true);
				return false;
			}
			else{
				surligne(champ, false);
				return true;
			}
		}
								
		function verifMail(champ){
			var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
			if(!regex.test(champ.value)){
				surligne(champ, true);
				return false;
			}
			else{
				surligne(champ, false);
				return true;
			}
		}
		
		function verifTel(champ){
			if(champ.value.length < 10){
				surligne(champ, true);
				return false;
			}
			else{
				surligne(champ, false);
				return true;
			}
		}
		
		function verifMdp(champ){
			if(champ.value.length < 6){
				surligne(champ, true);
				return false;
			}
			else{
				surligne(champ, false);
				return true;
			}
		}
		
		function verifCmdp(champ){
			var mdp = document.getElementById("inscription").mdp.value;
			if(champ.value != mdp){
				surligne(champ, true);
				return false;
			}
			else{
				surligne(champ, false);
				return true;
			}
		}
		
		function verifAdresse(champ){
			var regex = /^[\w]+\s[a-zA-z\sàâäéèêëïîôöùûüç'-]*$/;
			if(!regex.test(champ.value)){
				surligne(champ, true);
				return false;
			}
			else{
				surligne(champ, false);
				return true;
			}
		}

		function verifCode(champ){
			var regex = /^[0-9]{5}$/;
			if(!regex.test(champ.value)){
				surligne(champ, true);
				return false;
			}
			else{
				surligne(champ, false);
				return true;
			}
		}

		function verifVille(champ){
			var regex = /^[a-zA-z\sàâäéèêëïîôöùûüç'-]{2,}$/;
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
							<form method="post" action="ajout.php" onsubmit="return verification(this)" id="inscription">
								<label for="nom">
									Nom : 
									<div class="infobulle">
										<img src="template/images/interrogation"/>
										<span> Entre 2 et 50 caractères </span>
									</div>
								</label>
								<input type="text" name="nom" id="nom" onblur="verifVide(this)"/> <br />
								
								<label for="prenom">Prénom : 
									<div class="infobulle">
										<img src="template/images/interrogation"/>
										<span> Entre 2 et 50 caractères </span>
									</div>
								</label>
								<input type="text" name="prenom" id="prenom" onblur="verifVide(this)"/> <br />
								
								<label for="email">Email : 
									<div class="infobulle">
										<img src="template/images/interrogation"/>
										<span> Exemple: martindupond@hotmail.fr </span>
									</div>
								</label>
								<input type="email" name="email" id="email"  onblur="verifMail(this)"/> <br />
								
								<label for="tel">Téléphone : 
									<div class="infobulle">
										<img src="template/images/interrogation"/>
										<span> Exemple : 0612356295 </span>
									</div>
								</label>
								<input type="text" name="tel" id="tel" onblur="verifTel(this)"/> <br />
								
								<label for="adresse">Adresse :
									<div class="infobulle">
										<img src="template/images/interrogation"/>
										<span> Exemple : 16 avenue des champs </span>
									</div>
								</label>
								<input type="text" name="adresse" id="adresse" onblur="verifAdresse(this)"/> <br />

								<label for="codepostal"> Code postal :
									<div class="infobulle">
										<img src="template/images/interrogation"/>
										<span> Exemple : 35000 </span>
									</div>
								</label>
								<input type="text" name="codepostal" id="codepostal" onblur="verifCode(this)"/> <br />

								<label for="ville"> Ville :
									<div class="infobulle">
										<img src="template/images/interrogation"/>
										<span> Exemple : RENNES </span>
									</div>
								</label>
								<input type="text" name="ville" id="ville" onblur="verifVille(this)"/> <br />
								
								<label for="mdp">Mot de passe : 
									<div class="infobulle">
										<img src="template/images/interrogation"/>
										<span> Minimum 6 caractères </span>
									</div>
								</label>
								<input type="password" name="mdp" id="mdp" onblur="verifMdp(this)"/> <br />
								
								<label for="cmdp">Confirmation mot de passe : </label>								
								<input type="password" name="cmdp" id="cmdp" onblur="verifCmdp(this)"/> <br />

								
								<input type="submit" name="connexion" id="connexion" value="Créer un compte" />						
							</form> <br />
							
							<div class="fh5co-center-position">
								Vous avez déjà un compte ? <a href="connexion.html"> Connexion </a>
							</div>
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