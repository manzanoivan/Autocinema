<?php
	require_once("../Usuario.php");
	require_once( "../config.php" );
	require_once("../connect_db.php");
	require_once("../Encrypter.php");
	require_once("../Cartelera/conekta-php-master/lib/Conekta.php");
	require_once("../enviarMail.php");
	require_once('ListaDeProductos.php');
	require_once("../qr.php");

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
	
	$total = 0;
	$productos = NULL;
	if(isset( $_SESSION["carrito"] ) ){
		$productos = $_SESSION['carrito']; 
	}
	if( is_null($productos) ){
		header( "Location: ../login.php" );
	}

	$listaDeProductos = new ListaDeProductos();
	$arreglo = array();
	foreach($productos as $producto){
		$auxProd = $listaDeProductos->getProductosWhere(" productoCafeteria.idProducto=".$producto[0]->getId())[0];
		if( $auxProd->getExistencia() < $producto[1] ){
			continue;
		}
		$total = $total + ($producto[0]->getPrecio()*$producto[1]);
		$arreglo[] = array( 
			'name'=> $producto[0]->getNombre(),
			'description'=> $producto[0]->getDescripcion(),
			'unit_price'=> $producto[0]->getPrecio()*100,
			'quantity'=> $producto[1],
			'sku'=> $producto[0]->getId()
		);
	}

    date_default_timezone_set('America/Mexico_City');

    //echo $funciones[0]->getPrecio();
    $time = new DateTime("now");
    $time = $time->format("Y-n-j H:i:s");

	try{
		$charge = Conekta_Charge::create(array(
		  'description'=> 'Compra cafetería autocinema',
		  'reference_id'=> '1',
		  'amount'=> $total*100,
		  'currency'=>'MXN',
		  'card'=> $_POST['conektaTokenId'],
		  'details'=> array(
		    'name'=> $nombre,
		    'email'=> $usuario->getEmail(),
		    'line_items'=> $arreglo,
		    'billing_address'=> ""
		  )
		));

		
		//echo $charge;
		$cargo = json_decode($charge, true);
		
		$link = conecta();
	    $sql1 = "INSERT INTO compraCafeteria ( idUsuario, fechaPago, referencia, nombre ) VALUES ( {$usuario->getId()}, '{$time}','".$cargo['id']."', '{$nombre}')";
	    //echo $sql1;
	    $insertar = insert($sql1, $link);
	    $sql1 = "SELECT idCompra from compraCafeteria WHERE BINARY referencia='".$cargo['id']."'";
	    $res = consultageneral( $sql1 , $link );
	    $idCompra = $res[0][0];

	    foreach($productos as $producto){
	    	$auxProd = $listaDeProductos->getProductosWhere(" productoCafeteria.idProducto=".$producto[0]->getId())[0];
	    	if( $auxProd->getExistencia() < $producto[1] ){
	    		continue;
	    	}
	    	$sql1 = "INSERT INTO detalleCompra ( idCompra, idProducto, cantidad, precioUnitario ) VALUES ( {$idCompra},".$producto[0]->getId().",".$producto[1].", ".$producto[0]->getPrecio().")";
	    	//echo $sql1."<br><br>Insert";
	    	$insertar = insert($sql1, $link);
	    	$sql1 = "UPDATE disponibilidadProducto SET existencia=".($auxProd->getExistencia() - $producto[1])." WHERE idProducto=".$producto[0]->getId();
		    //echo $sql1."<br>";
	    	$insertar = insert($sql1, $link);
	    }

	    $encrypted_string = Encrypter::encrypt( 'C'.$idCompra );
    	//echo $encrypted_string."<br>";
    	//echo 'B'.$res[0][0]."<br>";
    	//echo $encrypted_string."<br>";
    	//echo Encrypter::decrypt( $encrypted_string );
	    //echo htmlspecialchars($encrypted_string , ENT_QUOTES)."<br>";
	    $sql1 = "UPDATE compraCafeteria SET codigo='".$encrypted_string."' WHERE idCompra=".$idCompra;
	    //echo $sql1;
    	$insertar = insert($sql1, $link);
    	desconecta($link);

    	$titulo = "Compra exitosa en la cafetería ";
    	$qr = generaQR($GLOBALS['dominio']."/login.php?codigo='".$encrypted_string."'");
    	$msj = "<html><head></head><body><h1>Compra exitosa en la cafetería: ";
    	foreach($productos as $producto){
	    	$auxProd = $listaDeProductos->getProductosWhere(" productoCafeteria.idProducto=".$producto[0]->getId())[0];
	    	if( $auxProd->getExistencia() < $producto[1] ){
	    		continue;
	    	}
	    	$msj .= "<p>".$producto[1]." x ".$producto[0]->getNombre()."( $".$producto[0]->getPrecio()." ) = ".$producto[0]->getPrecio()*$producto[1]."</p>";
	    }
    	$msj .= "</h1><h2>Código: ".$encrypted_string."</h2><img src='data:image/png;base64,".$qr."'/>".$qr."</body></html>";
    	$var = enviarCorreo( $titulo, $msj , $usuario->getEmail() );
    	if( $var ){
    		echo "Sí";
    	}
    	else{
    		echo "No";
    	}
    	unset($_SESSION['carrito']);
    	header( "Location: ../Perfil/perfil.php" );
	}
	catch( Conekta_Error $e ){
		echo $e->getMessage();
		header( "Location: checkOut.php" );
	}
?>