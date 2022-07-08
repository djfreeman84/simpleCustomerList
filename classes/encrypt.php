<?php
	
	//Everything Encryption
	//Provide your own random key and initialization vector in each function
	//Note that this isn't secure enough for passwords
	
	class Encrypt{
		
		static function encrypt_url($string){
			$output = openssl_encrypt($string, 'AES-128-CTR', 'encryptionkeyhere', 0, '0123456789012345');
			$output = rawurlencode($output);
			return $output;
		}
		
		static function decrypt_url($string){
			$output = rawurldecode($string);
			$output = openssl_decrypt($output, 'AES-128-CTR', 'encryptionkeyhere', 0, '0123456789012345');
			return $output;
		}
		
		static function encrypt_db($string){
			$output = openssl_encrypt($string, 'AES-128-CTR', 'encryptionkeyhere', 0, '0123456789012345');
			return $output;
		}
		
		static function decrypt_db($string){
			$output = openssl_decrypt($string, 'AES-128-CTR', 'encryptionkeyhere', 0, '0123456789012345');
			return $output;
		}

	}
	
?>