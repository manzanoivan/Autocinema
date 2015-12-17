<?php
	require_once("phpqrcode/qrlib.php");
	
	function generaQR( $cadena ){
		ob_start();
		QRCode::png($cadena, null,QR_ECLEVEL_M, 10, 3);
		$imageString = base64_encode( ob_get_contents() );
		ob_end_clean();
		return $imageString;
	}
	//data:image/png;base64,<?php echo $imageString; ?>"	
?> 

