<?php
	function enviarCorreo($titulo , $mensaje, $dest){
		
		$headers = "MIME-Version: 1.0\r\n"; 
		$headers .= "Content-type: text/html; charset=utf-8\r\n"; 
		$headers .= "From: Autocinema < informacion@autocinema.hol.es >\r\n";
		$bool = mail($dest,$titulo,$mensaje,$headers);
		return $bool;
	}
?>