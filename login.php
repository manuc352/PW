<?php
//demarrer la session
session_start();
// connexion a la bdd
include 'connexionBD.php';

	
	if(isset($_POST['email']) && isset($_POST['mdp'])){
		
		$email = $_POST['email'];
		$mdp = $_POST['mdp'];

		$pdoemail = $pdo->prepare("SELECT count(*) FROM acces WHERE `Email` = :email AND `Mot de passe` = :mdp") ;
		$pdoemail->bindValue(':email', $email);
		$pdoemail->bindValue(':mdp', $mdp) ;
		$pdoemail->execute();
		$result = $pdoemail->fetchColumn();

		if($result == 1){
			echo "connexion";
			$_SESSION['connecte'] = "oui";
			$_SESSION['email'] = $email;
			
			$pdoautorisation = $pdo->prepare("SELECT count(*) FROM acces WHERE `Autorisation` = 1 AND `Email` = :email");
			$pdoautorisation->bindValue(':email', $email);
			$pdoautorisation->execute();
			$resultautorisation = $pdoautorisation->fetchColumn();

			if($resultautorisation == 1){
				$_SESSION['autorisation'] = "oui";
			}

			header('Location: accueil.php');
			exit();
		}
		else{
			//sinon rediriger vers la page de connexion		
			echo '<script language="javascript">';
			echo 'alert("erreur de connexion!");';
			echo 'window.location.replace("connexion.php");';
			echo '</script>';
			exit();
		}
	}
	else{
		echo '<script language="javascript">';
		echo 'alert("Formulaire invalide!");';
		echo 'window.location.replace("connexion.php");';
		echo '</script>';
		exit();
	}

?>

