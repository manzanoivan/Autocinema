<?php
	require_once '../connect_db.php';
	$id = $_GET['id'];
	$link = conecta();
	mysqli_set_charset($link, "utf8");
	$query = "DELETE from productoCafeteria WHERE idProducto={$id}";
	insert($query, $link);
	desconecta($link);
	header('Location: productos.php');
?>