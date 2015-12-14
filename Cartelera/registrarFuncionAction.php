<?php
    require_once("../Usuario.php");
    require_once("../connect_db.php");
    session_start();
    
    $usuario = NULL;
    if(isset( $_SESSION["Usuario"] ) ){
        $usuario = $_SESSION["Usuario"];
    }
    $idF = htmlspecialchars($_GET["id"] , ENT_QUOTES);

    if( !isset( $usuario ) || is_null($usuario->getId()) || $usuario->getTipo() != 1 )
        header("Location: modificarFuncion.php?id=".$idF);

    $time = "";
    $time = $_POST['fecha']." ".$_POST['time'];
    //echo $time;
    $dt = DateTime::createFromFormat('d/m/Y h:i A', $time);

    $var = $dt->format("Y-n-j H:i:s");
    
    $link = conecta();
    $sql1 = "INSERT INTO funcion ( fecha, idPelicula, precio, disponibilidad, idSede ) VALUES ( '".$var."', ".$_POST['pelicula'].", ".$_POST['precio'].", ".$_POST['cupo'].", ".$_POST['sede']." )";
    //echo $sql1;
    $insertar = insert($sql1, $link);
    desconecta($link);
    header("Location: funciones.php");
?>