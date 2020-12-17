<?php 
	
	$servername = "localhost";
	$dbname = "onlineshopping";

	$user = "root";
	$password = "";

	$dsn ="mysql:host=$servername; dbname=$dbname";

	$pdo = new PDO($dsn, $user, $password);

	try {
		$conn = $pdo;

		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		/*echo "Connect suuessfuly";*/

	}catch(PDOException $e){
		echo "Connection Failed ".$e->getMessgae();
	}

?>