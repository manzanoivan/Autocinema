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
			$registrado = false;
			$limite = count($lista);
			
			for($i = 0; $i < $limite; $i = $i + 1){
				if($lista[$i][0]->getId() == $id){
					$registrado = true;
					$lista[$i][1] ++;
				}
			}
			if($registrado == false){
				$auxiliar = new ListaDeProductos();
				$lista[] = array($auxiliar->getProductosWhere("productoCafeteria.idProducto = ".$id." AND sede.idSede = ".$sede)[0],1);	
			}	
			$_SESSION["carrito"] = $lista;
			
			header('Location:cafeteria.php');
		}  
		else{
			header('Location:../login.php');
		}
	}
?>