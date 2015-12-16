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
		$precio = $_POST['precio'];
		$descripcion = $_POST['descripcion'];
		if( $_FILES['image']['tmp_name'] != "" ){	
			echo "NO ES NULL";
			$image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); 
			$query = "UPDATE productocafeteria SET nombre = '{$nombre}', descripcion = '{$descripcion}', precio = '{$precio}', imagen = '{$image}' WHERE idProducto = '{$id}'";
		}
		else{
			echo "ES NULL";
			$query = "UPDATE productocafeteria SET nombre = '{$nombre}', descripcion = '{$descripcion}', precio = '{$precio}' WHERE idProducto = '{$id}'";
		}
		$link = conecta();
		mysqli_set_charset($link, "utf8");
		insert($query, $link);
		desconecta($link);
		header('Location: productos.php');
	}


?>