<?php
	session_start();
	if(isset($_POST['editor1'])){
		$_SESSION['texte'] = $_POST['editor1'];
		echo $_SESSION['texte'];
		header('Location: presentation.php');
		exit();
	}
?>