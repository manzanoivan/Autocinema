<?php

	require_once("../Usuario.php");
    require_once '../connect_db.php';
    session_start();
    $usuario = NULL;
    if(isset( $_SESSION["Usuario"] ) ){
        $usuario = $_SESSION["Usuario"];
    }
	
	if(!is_null($usuario)){
		$id = $_GET['id'];
		$nombre = $_POST['nombre'];
		$segundoNombre = $_POST['segundoNombre'];
		$sinopsis = $_POST['sinopsis'];
		$director = $_POST['director'];
		$anio = $_POST['anio'];
		$actores = $_POST['actores'];
		$duracion = $_POST['duracion'];
		$trailer = $_POST['trailer'];
		$idClasificacion = $_POST['clasificacion'];
		if( $_FILES['image']['tmp_name'] != "" ){	
			echo "NO ES NULL";
			$image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); 
			$query = "UPDATE pelicula SET nombre = '{$nombre}', segundoNombre = '{$segundoNombre}', sinopsis = '{$sinopsis}', director = '$director', anio = '{$anio}', actores = '{$actores}', duracion = '{$duracion}', trailer = '{$trailer}', idClasificacion = '{$idClasificacion}', imagen = '{$image}' WHERE idPelicula = '{$id}'";
		}
		else{
			echo "ES NULL";
			$query = "UPDATE pelicula SET nombre = '{$nombre}', segundoNombre = '{$segundoNombre}', sinopsis = '{$sinopsis}', director = '$director', anio = '{$anio}', actores = '{$actores}', duracion = '{$duracion}', trailer = '{$trailer}', idClasificacion = '{$idClasificacion}' WHERE idPelicula = '{$id}'";
		}
		$link = conecta();
		mysqli_set_charset($link, "utf8");
		insert($query, $link);
		desconecta($link);
		header('Location: revisarPelicula.php?id='.$id);
	}


?>