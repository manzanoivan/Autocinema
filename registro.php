<?php
    require_once("Usuario.php");
    require_once("connect_db.php");
    //require_once("validaciones.php");
    session_start();
    
    if(is_null($_POST["usuario"]) ){
        header("Location: signup.php");
    }
    
    $username = htmlspecialchars($_POST["usuario"] , ENT_QUOTES);
    $password = htmlspecialchars($_POST["password"] , ENT_QUOTES);
    $apellidos = htmlspecialchars($_POST["apellidos"] , ENT_QUOTES);
    $nombre = htmlspecialchars($_POST["nombre"] , ENT_QUOTES);
    $email = htmlspecialchars($_POST["email"] , ENT_QUOTES);
    $sexo = htmlspecialchars($_POST["sexo"] , ENT_QUOTES);

    //$username = validate( $username );
    //$password = validate( $password );
    $link = conecta();
    $sql1 = "select idUsuario, nombre, apellidos, email, tipo, username from usuario where username='".$username."' OR email='".$email."'";
    $myArray = consultaUsuarios($sql1, $link);
    desconecta($link);
    
    if( count($myArray) > 0 ){
        header("Location: signup.php");
    }
    else{
        $link = conecta();
        $sql1 = "INSERT INTO usuario ( nombre, apellidos, email, password, username, tipo, idSexo ) VALUES ('".$nombre."','".$apellidos."','".$email."','".$password."','".$username."',2,".$sexo.")";
        $insertar = insert($sql1, $link);
        desconecta($link);
        if( $insertar ){
            $mail = "<h1>Bienvenido a la comunidad del autocinema</h1>\n Has sido registrado con el usuario: ".$username;
            $titulo = "Registro exitoso";
            $headers = "MIME-Version: 1.0\r\n"; 
            $headers .= "Content-type: text/html; charset=utf-8\r\n"; 
            $headers .= "From: Autocinema < informacion@autocinema.hol.es >\r\n";
            $bool = mail($email,$titulo,$mail,$headers);
            if($bool){
                echo "Mensaje enviado";
            }else{
                echo "Mensaje no enviado";
            }
            $usuario = new Usuario( $username , $password );
            $_SESSION['Usuario'] = $usuario;
            header("Location: Perfil/perfil.php");
        }
        else{
            header("Location: signup.php");
        }
        
    }
?>