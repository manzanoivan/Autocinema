<?php
	require_once('ListaDeProductos.php');
	$pos = $_GET['pos'];
	if($pos != null){
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
			
			$limite = count($lista);
			for($i = 0; $i < $limite;$i++){
				if($i == $pos){
					$lista[$i][1] -= 1;
					if($lista[$i][1] < 1){
						unset($lista[$pos]);
					}						
				}
			}	
			
						
			
			$_SESSION["carrito"] = array();
			foreach($lista as $elemento)
				$_SESSION["carrito"][] = $elemento;
			
			header('Location:cafeteria.php');
		}  
		else{
			header('Location:../login.php');
		}
	}
?>