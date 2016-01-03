<?php
	require_once '../connect_db.php';
	require_once("../Usuario.php");

	$usuario = NULL;
    if(isset( $_SESSION["Usuario"] ) ){
        $usuario = $_SESSION["Usuario"];
    }

    if( !isset( $usuario ) || is_null($usuario->getId()) || $usuario->getTipo() != 1 )
        header("Location: ../login.php");

	$id = htmlspecialchars($_GET["id"] , ENT_QUOTES);
	$link = conecta();
	mysqli_set_charset($link, "utf8");
	$query = "DELETE from comentario WHERE idComentario='{$id}'";
	//echo $query;
	insert($query, $link);
	desconecta($link);
	header('Location: perfilAdmin.php');
?>