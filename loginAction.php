<?php
    require_once("Usuario.php");

    session_start();

    $username = htmlspecialchars($_POST["user"] , ENT_QUOTES);
    $password = htmlspecialchars($_POST["password"], ENT_QUOTES);
    
    $usuario = new Usuario( $username , $password );
    if(is_null($usuario->getId()) ){
        header("Location: login.php");
    }
    else{
        $_SESSION['Usuario'] = $usuario;
        switch ($usuario->getTipo()) {
            case 1:
                header("Location: SinUtilizar/info3.html");
                break;
            case 2:
                header("Location: Perfil/perfil.php");
                break;
            case 3:
                header("Location: SinUtilizar/info.html");
                break;
            case 4:
                header("Location: SinUtilizar/profile3.php");    
                break;
            default:
                break;
        }
    }
    
?>