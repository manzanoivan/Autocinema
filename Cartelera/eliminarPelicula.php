<?php
	require_once '../connect_db.php';
	$id = $_GET['id'];
	$link = conecta();
	mysqli_set_charset($link, "utf8");
	$query = "DELETE from pelicula WHERE idPelicula={$id}";
	echo $query;
	insert($query, $link);
	desconecta($link);
	header('Location: peliculas.php');
?>