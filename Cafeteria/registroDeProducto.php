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
		$precio = $_POST['precio'];
		$existencias1 = $_POST['existencias1'];
		$existencias2 = $_POST['existencias2'];
		$descripcion = $_POST['descripcion'];		
		$image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); 
		
		$link = conecta();
		mysqli_set_charset($link, "utf8");
		
		$query1 = "INSERT INTO productocafeteria(nombre,descripcion,precio, imagen) VALUES ('{$nombre}','{$descripcion}','{$precio}', '{$image}')";		
		insert($query1, $link);
		
		$id = -1;
		$consulta = "SELECT idProducto FROM productocafeteria";
		if(!$result = mysqli_query($link,$consulta)){ 
			die();
		}
		while($row = mysqli_fetch_array($result))
		{
			$id = $row['idProducto'];
		}
		$query2 = "INSERT INTO disponibilidadproducto (idProducto, idSede, existencia) VALUES ('{$id}',1,'{$existencias1}')";
		$query3 = "INSERT INTO disponibilidadproducto (idProducto, idSede, existencia) VALUES ('{$id}',2,'{$existencias2}')";		
		insert($query2, $link);
		insert($query3, $link);
		desconecta($link);
		header('Location: productos.php');
	}


?>