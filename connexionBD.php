<?php

$servername = "localhost";
$username = "root";
$password = "root";
$a = "mysql:host=$servername;dbname=bonjour";

try {
    $pdo = new PDO($a, $username, $password);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
	
?>
