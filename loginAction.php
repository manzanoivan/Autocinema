<?php
    require_once("Usuario.php");
    require_once("Encrypter.php");

    session_start();

    $username = htmlspecialchars($_POST["user"] , ENT_QUOTES);
    $password = htmlspecialchars($_POST["password"], ENT_QUOTES);
    $codigo = htmlspecialchars($_POST["codigo"], ENT_QUOTES);
    $usuario = new Usuario( $username , $password );
    if(is_null($usuario->getId()) ){
        $_SESSION['errorLogin'] = "Nombre de usuario o contraseña incorrectos";
        header("Location: login.php");
    }
    else{
        $_SESSION['Usuario'] = $usuario;
        $tipo = "";
        if( isset($codigo) && !is_null($codigo) ){
            $descrifrado = Encrypter::decrypt( $codigo );
            if($descrifrado[0] == 'B'){
                $tipo = "B";
            }
            if( $descrifrado[0] == 'C' ){
                $tipo = "C";
            }
            //echo $codigo."<br>".$descrifrado;
        }

        switch ($usuario->getTipo()) {
            case 1:
                header("Location: Perfil/perfilAdmin.php");
                break;
            case 2:
                header("Location: Perfil/perfil.php");
                break;
            case 3:
                if( $tipo != "" ){
                    $location = "Location: Perfil/registrarEntrega.php?codigo=".$codigo;
                    header( $location );
                }
                else{
                    header("Location: Perfil/perfilCafeteria.php");
                }
                break;
            case 4:
                echo "tipo[".$tipo."]";
                if( $tipo != "" ){
                    $location = "Location: Perfil/registrarEntrada.php?codigo=".$codigo;
                    header( $location );
                }
                else{
                    header("Location: Perfil/perfilEntrada.php");    
                }
                break;
            default:
                break;
        }
    }
?>