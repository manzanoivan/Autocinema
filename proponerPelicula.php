<?php
	require_once 'connect_db.php';
	session_start();

	$nombre = htmlspecialchars($_POST["nombre"] , ENT_QUOTES);

	$link = conecta();
    $sql1 = "INSERT INTO propuesta ( textoPropuesta ) VALUES ( '".$nombre."' )";
    $insertar = insert($sql1, $link);
    desconecta($link);

    if( $insertar === true ){
    	$_SESSION['errorIndex'] = "Sugerencia de película registrada exitosamente :)";	
    }
    else{
    	$_SESSION['errorIndex'] = "Hubo un error registrando tu sugerencia, lo sentimos :(";	
    }
    header( "location: index.php" );

?>