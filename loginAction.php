<?php
    require_once("Usuario.php");
    //require_once("validaciones.php");

    session_start();

    $username = $_POST["user"];
    $password = $_POST["password"];

    //$username = validate( $username );
    //$password = validate( $password );
    
    //$username = 'manzanoivan';
    //$password = 'usuario';
    
    $usuario = new Usuario( $username , $password );
    if(is_null ($usuario->getId()) ){
        header("Location: index.html");
    }
    else{
        $_SESSION['Usuario'] = $usuario;
        switch ($usuario->getTipo()) {
            case 1:
                header("Location: SinUtilizar/info3.html");
                break;
            case 2:
                header("Location: SinUtilizar/info2.html");
            case 3:
                header("Location: SinUtilizar/info.html");
            case 4:
                header("Location: SinUtilizar/profile3.html");    
            default:
                break;
        }
    }
    
?>