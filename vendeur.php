<?php
	session_start();
	include 'connexionBD.php';
	
	if (isset($_POST['faireModif'])) {
		$_SESSION['modif'] = $_POST['compte'];
		header('Location: commentaire.php');
		exit();
	} elseif (isset($_POST['faireSupp'])) {
		foreach($_POST['compte'] as $code) {
			$pdoCompte = $pdo->prepare("DELETE FROM acces WHERE `Code` = :code") ;
			$pdoCompte->bindValue(':code', $code);
			$pdoCompte->execute();
		}
		header('Location: gestionVendeur.php');
		exit();
	} elseif (isset($_POST['faireAjout'])) {
		try {
			header('Location: ajout.php');
			exit();
		} catch (PDOException $a){
			echo 'suppression non reussie ' . $a->getMessage();
		}
	}else {
		echo 'loupé';
	}
?>
