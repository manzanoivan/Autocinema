<?php
	require_once('ListaDeProductos.php');
	$id = $_GET['id'];
	$sede = $_GET['sede'];
	if($id != null && $sede != null){
		$usuario = NULL;
		session_start();
		if(isset( $_SESSION["Usuario"] ) ){
			$usuario = $_SESSION["Usuario"];
		}  	
		if(!is_null( $usuario )){
			$lista = NULL;
			if(isset( $_SESSION["carrito"] ) ){
				$lista = $_SESSION["carrito"];
			} 
			if(is_null($lista)){
				$lista = array();
			}
			$auxiliar = new ListaDeProductos();
			$lista[] = $auxiliar->getProductosWhere("productoCafeteria.idProducto = ".$id." AND sede.idSede = ".$sede)[0];		
			$_SESSION["carrito"] = $lista;
			
			header('Location:cafeteria.php');
		}  
		else{
			header('Location:../login.php');
		}
	}
?>