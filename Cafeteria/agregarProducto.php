<?php
    session_start();
	$id = $_GET['id'];
	$sede = $_GET['sede'];
	$usuario = NULL;
    if(isset( $_SESSION["Usuario"] ) ){
        $usuario = $_SESSION["Usuario"];
    }  	
	if(!is_null( $usuario )){		
		$lista = NULL;
		if(isset( $_SESSION["carrito"] ) ){
			$lista = $_SESSION["carrito"];
		} 
        if(is_null($lista)){
			echo ' --ERA NULO-- ';
			$lista = array();
		}
		$lista[] = "perro";
		$_SESSION["carrito"] = $lista;
		
		foreach($_SESSION["carrito"] as $producto)
			echo $producto;
    }  
	else{
		header('Location:../login.php');
	}
?>