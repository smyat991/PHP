<?php 
	
	require 'db_connect.php';

	$name = $_POST['name'];
	$photo = $_FILES['photo'];

	// upload File
	$basepath = 'image/brand/';
	$fullpath = $basepath.$photo['name']; // image/brand/IMG_4332 (1).jpg
	move_uploaded_file($photo['tmp_name'], $fullpath);


	$sql = "INSERT INTO brands (name, photo) VALUES (:value1, :value2)";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':value1', $name);
	$stmt->bindParam(':value2', $fullpath);
	$stmt->execute();

	header('location: brand_list.php');

?> 

