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


		<script type="text/javascript">
			var ticket=[];
			function getHU() {
				var hu = document.getElementById("hu").value; 
				ticket.push(hu);
				document.getElementById("hu").value="";
			}

			function afficher(){
				alert(ticket);
			}

			function redirection(){
				var result="";
				for (var i = 0; i < ticket.length; i++){
					result+=ticket[i]+";";
				}
				var lien="ticket.php?liste=";
				lien+=result;
				alert(lien);
				document.location.href=lien;
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
						<div class="fh5co-left-position">
							<?php 
								$nom = strtoupper($_POST['NomClient']);
								$prenom = strtolower($_POST['PrenomClient']);
								$prenom = ucfirst($prenom);
								echo ("<h3> Client : ".$nom." ".$prenom."</h3>");
							?>
							<FORM>
						 		<input type="text" name="numero" id="hu" value="numero" />
						 		<input type="button" value="Ajouter vetement" onclick="getHU();" />
							</FORM>

							<form  method="POST" action="ticket.php">
								<input type="button" name="valid" value="Dernier achat" onclick="redirection();">
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

