<?php

	//This class is used to quickly draw Get, Post, Session, and Request data, whether ints or strings, encrypted or plain.

	class globals{

		static function GetPlainInt($name){
			if(isset($_GET[$name])){
				if(is_numeric($_GET[$name])){
					return $_GET[$name];
				}else{
					return 0;
				}
			}else{
				return 0;
			}
		}
		
		static function GetEncryptedInt($name){
			if(isset($_GET[$name]))
			{
				$decrypted = encrypt::decrypt_url($_GET[$name]);
			
				if(is_numeric($decrypted)){
					return $decrypted;
				}else{
					return 0;
				}
			}else{
				return 0;
			}
		}
		
		static function GetPlainString($name){
			
			if(isset($_GET[$name]))
			{
				return $_GET[$name];
				
			}else{
				return "";
			}
		}
		
		static function GetEncryptedString($name){
			
			if(isset($_GET[$name])){
				if($decrypted = encrypt::decrypt_url($_GET[$name])){
			
					return $decrypted;
				
				}else{
					
					return "";
					
				}
				
			}else{
				return "";
			}
		}

		static function SessionPlainInt($name){
			if(isset($_SESSION[$name])){
				if(is_numeric($_SESSION[$name])){
					return $_SESSION[$name];
				}else{
					return 0;
				}
			}else{
				return 0;
			}
		}
		
		static function SessionEncryptedInt($name){
			
			if(isset($_SESSION[$name]))
			{
				$decrypted = encrypt::decrypt_url($_SESSION[$name]);
			
				if(is_numeric($decrypted)){
					return $decrypted;
				}else{
					return 0;
				}
			}else{
				return 0;
			}
		}
	
		static function PostPlainInt($name){
			if(isset($_POST[$name])){
				if(is_numeric($_POST[$name])){
					return $_POST[$name];
				}else{
					return 0;
				}
			}else{
				return 0;
			}
		}
		
		static function PostEncryptedInt($name){
			if(isset($_POST[$name]))
			{
				$decrypted = encrypt::decrypt_url($_POST[$name]);
			
				if(is_numeric($decrypted)){
					return $decrypted;
				}else{
					return 0;
				}
			}else{
				return 0;
			}
		}
		
		static function PostPlainString($name){
			
			if(isset($_POST[$name]))
			{
				return $_POST[$name];
				
			}else{
				return "";
			}
		}
		
		static function PostEncryptedString($name){
			if(isset($_POST[$name])){
				if($decrypted = encrypt::decrypt_url($_POST[$name])){
			
					return $decrypted;
				
				}else{
					
					return "";
					
				}
				
			}else{
				return "";
			}
		}
		
		static function RequestPlainInt($name){
			if(isset($_REQUEST[$name])){
				if(is_numeric($_REQUEST[$name])){
					return $_REQUEST[$name];
				}else{
					return 0;
				}
			}else{
				return 0;
			}
		}
		
		static function RequestEncryptedInt($name){
			if(isset($_REQUEST[$name]))
			{
				$decrypted = encrypt::decrypt_url($_REQUEST[$name]);
			
				if(is_numeric($decrypted)){
					return $decrypted;
				}else{
					return 0;
				}
			}else{
				return 0;
			}
		}
		
		static function RequestPlainString($name){
			
			if(isset($_REQUEST[$name]))
			{
				return $_REQUEST[$name];
				
			}else{
				return "";
			}
		}
		
		static function RequestEncryptedString($name){
			if(isset($_REQUEST[$name])){
				if($decrypted = encrypt::decrypt_url($_REQUEST[$name])){
			
					return $decrypted;
				
				}else{
					
					return "";
					
				}
				
			}else{
				return "";
			}
		}
	}
	
?>