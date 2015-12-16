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
		$idSede = $_GET['sede'];
		$existencia = $_POST['existencia'];
		
		$query = "UPDATE disponibilidadProducto SET existencia = '{$existencia}' Where disponibilidadProducto.idProducto ='{$id}' AND  disponibilidadProducto.idSede='{$idSede}'";
		
		
	
		$link = conecta();
		mysqli_set_charset($link, "utf8");
		insert($query, $link);
		desconecta($link);
		header('Location: productos.php');
	}


?>