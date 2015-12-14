<?php
    require_once("../connect_db.php");
    require_once("../Usuario.php");

    session_start();

    $username = htmlspecialchars($_POST["usuario"] , ENT_QUOTES);
    $password = htmlspecialchars($_POST["password"] , ENT_QUOTES);
    $confpassword = htmlspecialchars($_POST["confirmacion"] , ENT_QUOTES);
    $apellidos = htmlspecialchars($_POST["apellidos"] , ENT_QUOTES);
    $nombre = htmlspecialchars($_POST["nombre"] , ENT_QUOTES);
    $email = htmlspecialchars($_POST["email"] , ENT_QUOTES);
    $sexo = htmlspecialchars($_POST["sexo"] , ENT_QUOTES);
    
    $usuario = NULL;
    if(isset( $_SESSION["Usuario"] ) ){
        $usuario = $_SESSION["Usuario"];
    }
    else{
        header("Location: login.php");
    }
    
    $cambios = array();
    
    if( !($username === $usuario->getUsername()) && !($username === "") ){
        $link = conecta();
        $sql1 = "select idUsuario from usuario where username='" . $username . "'";
        $myArray = consultaUsuarios($sql1, $link);
        desconecta($link);

        if (count($myArray) > 0) {
            header("Location: editar.php");
        }else{
            $cambios[] = " username = '".$username."' ";
        }
    }
    if( !($apellidos === $usuario->getApellidos()) && !($apellidos === "") ){
        $cambios[] = " apellidos = '".$apellidos."' ";
    }
    if( !($nombre === $usuario->getNombre()) && !($nombre === "") ){
        $cambios[] = " nombre = '".$nombre."' ";
    }
    if( !($email === $usuario->getEmail()) && !($email === "") ){
        $link = conecta();
        $sql1 = "select idUsuario from usuario where email='" . $email . "'";
        $myArray = consultaUsuarios($sql1, $link);
        desconecta($link);

        if (count($myArray) > 0) {
            header("Location: editar.php");
        }else{
            $cambios[] = " email = '".$email."' ";
        }
    }
    if( !($username === $usuario->getUsername()) && !($username === "") ){
        $cambios[] = " username = '".$username."' ";
    }
    if( !($sexo === $usuario->getSexo()) && !($sexo === "") ){
        $cambios[] = " idSexo = '".$sexo."' ";
    }
    if( $password === $confpassword  && !($password === "")){
        $cambios[] = " password = '".$password."' ";
    }
    
    $sql = "";
    $maximo = count($cambios);
    $cont = 0;
    foreach ($cambios as $value) {
        $sql .= $value;
        if( ++$cont != $maximo ){
            $sql .= ",";
        }
    }
    
    $link = conecta();
    mysqli_set_charset($link, "utf8");
    $sql1 = "UPDATE usuario SET ".$sql." WHERE idUsuario='".$usuario->getId()."'";
    if (!$result = mysqli_query($link, $sql1)) {
        header("Location: Perfil/editar.php");
        die();
    }
    desconecta($link);
    
    $nuevoUsuario = Usuario::withId( $usuario->getId() );
    
    $_SESSION['Usuario'] = $nuevoUsuario;
    switch ($nuevoUsuario->getTipo()) {
        case 1:
            header("Location: SinUtilizar/info3.html");
            break;
        case 2:
            header("Location: perfil.php");
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
?>