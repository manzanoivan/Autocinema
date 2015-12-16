<?php

	
	require_once('connect_db.php');

	$nombre = $_POST['name'];
	$email = $_POST['email'];
	$message =  $_POST['message'];
	
	echo ($nombre.$email.$message);
	
	$query = " INSERT INTO  comentario (texto ,nombre ,email ) VALUES ( '$message', '$nombre', '$email')";
	
	$link = conecta();
	mysqli_set_charset($link, "utf8");
	insert($query,$link);

	header( "Location: index.php" );	

?>