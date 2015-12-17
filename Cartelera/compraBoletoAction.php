<?php
	require_once("../Usuario.php");
	require_once( "../config.php" );
	require_once("../connect_db.php");
	require_once("../Encrypter.php");
	require_once("conekta-php-master/lib/Conekta.php");
	require_once("ListaDeFunciones.php");
	require_once("../enviarMail.php");

	session_start();
    $usuario = NULL;
    if(isset( $_SESSION["Usuario"] ) ){
        $usuario = $_SESSION["Usuario"];
    }

    if( !isset( $usuario ) || is_null($usuario->getId())){
        header( "Location: ../login.php" );
    }

	Conekta::setApiKey($GLOBALS['PrivateKey']);
	$nombre = htmlspecialchars($_POST["nombre"] , ENT_QUOTES);
	$idF = htmlspecialchars($_GET["id"] , ENT_QUOTES);
	$cantidad = htmlspecialchars($_POST["boletos"] , ENT_QUOTES);

	$listaDeFunciones = new ListaDeFunciones();
    $funciones = $listaDeFunciones->getFuncionesWhere(" idFuncion='".$idF."'");

    if( count( $funciones ) > 1 || count( $funciones ) < 1 || $funciones[0]->getDisponibilidad() <= 0 )
    	header( "Location: compraBoleto.php?id=".$idf );

    date_default_timezone_set('America/Mexico_City');

    //echo $funciones[0]->getPrecio();
    $time = new DateTime($funciones[0]->getFecha());
    $desc = $time->format("d/m/Y h:i A");
    $time = new DateTime("now");
    $time = $time->format("Y-n-j H:i:s");

	try{
		$charge = Conekta_Charge::create(array(
		  'description'=> 'Ticket: '.$funciones[0]->getNombrePelicula().' '.$desc ,
		  'reference_id'=> $funciones[0]->getId().$funciones[0]->getDisponibilidad()-$cantidad,
		  'amount'=> $cantidad*$funciones[0]->getPrecio()*100,
		  'currency'=>'MXN',
		  'card'=> $_POST['conektaTokenId'],
		  'details'=> array(
		    'name'=> $nombre,
		    'email'=> $usuario->getEmail(),
		    'line_items'=> array(
		      array(
		        'name'=> $funciones[0]->getNombrePelicula(),
		        'description'=> $desc,
		        'unit_price'=> $funciones[0]->getPrecio()*100,
		        'quantity'=> $cantidad,
		        'sku'=> $funciones[0]->getId()
		      )
		    ),
		    'billing_address'=> ""
		  )
		));

		//echo $charge;
		$cargo = json_decode($charge, true);
		
		$link = conecta();
	    $sql1 = "INSERT INTO pagoBoleto ( idUsuario, idTipopago, boletosRestantes, fechaPago, nombre, referencia ) VALUES ( {$usuario->getId()},1,0,'{$time}', '{$nombre}','".$cargo['id']."')";
	    //echo $sql1;
	    $insertar = insert($sql1, $link);
	    $sql1 = "SELECT idPago from pagoBoleto WHERE BINARY referencia='".$cargo['id']."'";
	    $res = consultageneral( $sql1 , $link );
	    
	    $sql1 = "INSERT INTO boleto ( idFuncion, fechaCompra, cantidad, idPagoBoleto ) VALUES ( '".$idF."','".$time."',".$cantidad.", ".$res[0][0].")";
	    //echo $sql1;
	    $insertar = insert($sql1, $link);

	    $sql1 = "SELECT idBoleto from boleto WHERE BINARY idFuncion='".$idF."' AND fechaCompra = '".$time."' AND idPagoBoleto=".$res[0][0]."";
	    $res = consultageneral( $sql1 , $link );

	    $encrypted_string = Encrypter::encrypt( 'B'.$res[0][0] );
    	//echo $encrypted_string."<br>";
    	//echo 'B'.$res[0][0]."<br>";
    	//echo $encrypted_string."<br>";
    	//echo Encrypter::decrypt( $encrypted_string );
	    //echo htmlspecialchars($encrypted_string , ENT_QUOTES)."<br>";
	    $sql1 = "UPDATE boleto SET codigo='".$encrypted_string."' WHERE idBoleto='".$res[0][0]."'";
	    //echo $sql1;
    	$insertar = insert($sql1, $link);

	    $sql1 = "UPDATE funcion SET disponibilidad=".(($funciones[0]->getDisponibilidad())-$cantidad)." WHERE idFuncion='".$idF."'";
	    //echo $sql1;
    	$insertar = insert($sql1, $link);
    	desconecta($link);

    	$enviarCorreo( "Compra exitosa: ".$funciones[0]->getNombrePelicula(), "<h1>Compra exitosa para la función: ".$funciones[0]->getNombrePelicula()."</h1><h2>Código: ".$encrypted_string."</h2><img src='data:image/png;base64,".generaQR($GLOBALS['dominio'].'/login.php?codigo='.$ticket->getCodigo())."'>" , $usuario->getEmail() );

    	header( "Location: ../Perfil/perfil.php" );
	}
	catch( Conekta_Error $e ){
		echo $e->getMessage();
		header( "Location: compraBoleto.php?id=".$idf );
	}
?>