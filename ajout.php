<?php
	include 'connexionBD.php';
	
	if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['tel']) && isset($_POST['adresse']) && isset($_POST['codepostal']) && isset($_POST['ville']) && isset($_POST['mdp']) && isset($_POST['cmdp'])){
		
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$email = $_POST['email'];
		$tel = $_POST['tel'];
		$adresse = $_POST['adresse'];
		$codepostal = $_POST['codepostal'];
		$ville = $_POST['ville'];
		$mdp = $_POST['mdp'];
		$cmdp = $_POST['cmdp'];

		$pdoemail = $pdo->prepare("SELECT count(*) FROM acces WHERE Email= :email") ;
		$pdoemail->bindValue(':email', $email) ;
		$pdoemail->execute();
		$resultemail = $pdoemail->fetchColumn();

		if($resultemail == 1){
			//Si l'adresse mail est déjà dans la base de donnée rediriger vers la page d'inscription	
			echo '<script language="javascript">';
			echo 'alert("Cette adresse mail est déjà utilisée.");';
			echo 'window.location.replace("inscription.php");';
			echo '</script>';
			exit();
		}
		else{
			//Sinon, on créer un nouvel utilsateur
			$code = substr($prenom, 0, 1).substr($nom, 0, 2);
			$code = strtolower($code);
			
			$pdocode = $pdo->prepare("SELECT count(*) FROM acces WHERE Code= :code") ;
			$pdocode->bindValue(':code', $code);
			$pdocode->execute();

			$resultcode = $pdocode->fetchColumn();

			$codeinitial = $code;
			$codeinitial2 = $code;
			$codeinitial3 = $code;
			while($resultcode == 1){
				echo "cherche nv code";
				echo "<br/>";
				$nouvelleLettre = substr($code, 0, 1);
				$ascii = ord($nouvelleLettre) + 1;
				if($ascii > 122){
					$ascii = 97;
				}
				$nouvelleLettre = chr($ascii);
				$nouveauCode = $nouvelleLettre.substr($code, 1, 2);
				
				if(strcasecmp($nouveauCode, $codeinitial) == 0){
					echo 'EGAL !!!!';
					$nouvelleLettre = substr($codeinitial, 1, 1);
					$ascii = ord($nouvelleLettre) + 1;
					if($ascii > 122){
						$ascii = 97;
					}
					$nouvelleLettre = chr($ascii);
					$nouveauCode = substr($codeinitial, 0, 1).$nouvelleLettre.substr($code, 2, 1);

					if(strcasecmp($nouveauCode, $codeinitial2) == 0){
						echo 'EGAL 22222 !';
						$nouvelleLettre = substr($codeinitial2, 2, 1);
						$ascii = ord($nouvelleLettre) + 1;
						if($ascii > 122){
							$ascii = 97;
						}
						$nouvelleLettre = chr($ascii);
						$nouveauCode = substr($codeinitial2, 0, 2).$nouvelleLettre;
						$codeinitial2 = $nouveauCode;

						if(strcasecmp($nouveauCode, $codeinitial3)){
							echo '<script language="javascript">';
							echo 'alert("Impossible de créer un nouveau compte, tous les codes utilisateurs ont été distribués. Veuillez contacter l\'administrateur du site.");';
							echo 'window.location.replace("index.html");';
							echo '</script>';
							exit();
						}
					}

					$codeinitial = $nouveauCode;
				}
				$code = $nouveauCode;
				$pdocode->bindValue(':code', $nouveauCode) ;
				$pdocode->execute();
				$resultcode = $pdocode->fetchColumn();
			}

			$ajout = $pdo->prepare("INSERT INTO `acces`(`Code`, `Nom`, `Prenom`, `Email`, `Telephone`, `Adresse`, `CodePostal`, `Ville`, `Mot de passe`) VALUES (:code, :nom, :prenom, :email, :tel, :adresse, :codepostal, :ville, :mdp)");
			$ajout->bindValue(':code', $code);
			$ajout->bindValue(':nom', $nom);
			$ajout->bindValue(':prenom', $prenom);
			$ajout->bindValue(':email', $email);
			$ajout->bindValue(':tel', $tel);
			$ajout->bindValue(':adresse', $adresse);
			$ajout->bindValue(':codepostal', $codepostal);
			$ajout->bindValue(':ville', $ville);
			$ajout->bindValue(':mdp', $mdp);
			$ajout->execute();

			include 'login.php';
		}
	}
	else{
		//sinon rediriger vers la page d'inscription	
			echo '<script language="javascript">';
			echo 'alert("Formulaire invalide.");';
			echo 'window.location.replace("inscription.php");';
			echo '</script>';
			exit();
	}
			
?>