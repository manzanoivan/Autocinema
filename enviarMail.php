<?php
	require_once '../PHPMailer/class.phpmailer.php';
	
	function enviarCorreo($titulo , $mensaje, $dest){
		$mail = new PHPMailer(true); 

		try{
			$mail->AddAddress( $dest , "");
			$mail->SetFrom('informacion@autocinema.hol.es', 'Autocinema');
			$mail->AddReplyTo('informacion@autocinema.hol.es', 'Autocinema');
			$mail->Subject = $titulo;
			$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
			$mail->MsgHTML( $mensaje );
			$mail->Send();
			return true;
		} catch (phpmailerException $e) {
			echo $e->errorMessage(); //Pretty error messages from PHPMailer
		} catch (Exception $e) {
			echo $e->getMessage(); //Boring error messages from anything else!
		}
		return false;
		/*
		$headers = "MIME-Version: 1.0\r\n"; 
		$headers .= "Content-type: text/html; charset=utf-8\r\n"; 
		$headers .= "From: Autocinema < informacion@autocinema.hol.es >\r\n";
		$bool = mail($dest,$titulo,$mensaje,$headers);
		*/
		return $bool;
	}
?>