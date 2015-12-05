<?php
    require_once("Usuario.php");

    $usuario = new Usuario();
    $usuario->setId(5);
    $usuario->setUsername("Falso");
    $usuario->setTipo(1);
    echo $usuario->getId();
    echo $usuario->getUsername();
    echo $usuario->getTipo();
        
	
?>