<?php
	session_start();
	if(isset($_POST['editor1'])){
		$_SESSION['date'] = $_POST['editor1'];
		echo $_SESSION['date'];
		header('Location: accueil.php');
		exit();
	}
?>