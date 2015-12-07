<?php
    require_once("Usuario.php");
    require_once("connect_db.php");
    //require_once("validaciones.php");
    session_start();

    $username = $_POST["usuario"];
    $password = $_POST["password"];
    $apellidos = $_POST['apellidos'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $sexo = $_POST['sexo'];

    //$username = validate( $username );
    //$password = validate( $password );
    $link = conecta();
    $sql1 = "select idUsuario, nombre, apellidos, email, tipo, username from usuario where username='".$username."' OR email='".$email."'";
    echo $sql1;
    $myArray = consultaUsuarios($sql1, $link);
    desconecta($link);
    
    if( count($myArray) > 0 ){
        header("Location: login.php");
    }
    else{
        $link = conecta();
        $sql1 = "INSERT INTO usuario ( nombre, apellidos, email, password, username, tipo, idSexo ) VALUES ('".$nombre."','".$apellidos."','".$email."','".$password."','".$username."',2,".$sexo.")";
        echo $sql1;
        $insertar = insert($sql1, $link);
        desconecta($link);
        if( $insertar ){
            $usuario = new Usuario( $username , $password );
            $_SESSION['Usuario'] = $usuario;
            header("Location: Perfil/perfil.php");
        }
        else{
            header("Location: login.php");
        }
        
    }
?>