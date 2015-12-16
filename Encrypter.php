<?php
	require_once( "config.php" );
	class Encrypter {
	 
	    private static $Key = "key_t1AnkxXbMRcf4Zs4r6oKwA";
	 
	    public static function encrypt ($input) {
	        $output = urlencode(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5(Encrypter::$Key), $input, MCRYPT_MODE_CBC, md5(md5(Encrypter::$Key)))));
	        return $output;
	    }
	 
	    public static function decrypt ($input) {
	        $output = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5(Encrypter::$Key), urldecode(base64_decode($input)), MCRYPT_MODE_CBC, md5(md5(Encrypter::$Key))), "\0");
	        return $output;
	    }
	 
	}
?>