<?php
    require_once("../Usuario.php");
    require_once '../connect_db.php';
    require_once '../enviarMail.php';
    session_start();
    $usuario = NULL;
    if(isset( $_SESSION["Usuario"] ) ){
        $usuario = $_SESSION["Usuario"];
    }  
    $id = htmlspecialchars($_POST["idC"] , ENT_QUOTES);
    $texto = htmlspecialchars($_POST["respuesta"], ENT_QUOTES);

    $link = conecta();
    $sql1 = "SELECT idComentario, texto, email, nombre FROM comentario WHERE idComentario='".$id."'";
    $myArray = consultageneral($sql1, $link);
    desconecta($link);

    if( count( $myArray ) != 1 ){
      header("Location: responderComentario.php?id="+$id);
    }
    $email = $myArray[0][2];
    $titulo = "Respuesta a tu comentario en el Autocinema";
    $result = enviarCorreo( $titulo , $texto, $email );

    if( $result == false ){
        header("Location: responderComentario.php?id="+$id);
    }
    else{
        $link = conecta();
        mysqli_set_charset($link, "utf8");
        $query = "DELETE from comentario WHERE idComentario='{$id}'";
        //echo $query;
        insert($query, $link);
        desconecta($link);
        header( "location: perfilAdmin.php" );
    }
    
?>