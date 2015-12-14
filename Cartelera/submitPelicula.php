<?php

	require_once("../Usuario.php");
    require_once '../connect_db.php';
    session_start();
    $usuario = NULL;
    if(isset( $_SESSION["Usuario"] ) ){
        $usuario = $_SESSION["Usuario"];
    }
	
	if(!is_null($usuario)){
		
		$nombre = $_POST['nombre'];
		$segundoNombre = $_POST['segundoNombre'];
		$sinopsis = $_POST['sinopsis'];
		$director = $_POST['director'];
		$anio = $_POST['anio'];
		$actores = $_POST['actores'];
		$duracion = $_POST['duracion'];
		$trailer = $_POST['trailer'];
		$idClasificacion = $_POST['clasificacion'];
		$image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); 
		$query = "INSERT INTO pelicula (nombre, segundoNombre, sinopsis, director, anio, actores, duracion, trailer, idClasificacion, imagen) VALUES ('{$nombre}', '{$segundoNombre}', '{$sinopsis}', '{$director}', '{$anio}', '{$actores}', '{$duracion}', '{$trailer}', '{$idClasificacion}', '{$image}')";
		$link = conecta();
		mysqli_set_charset($link, "utf8");
		insert($query, $link);
		desconecta($link);
		header('Location: peliculas.php');
	}


?>