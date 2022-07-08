<?php

	class database {

		public function Connection(){
			
			//Your Credentials here.
			$user = '';
			$password = '';

			$database = 'customer-sample';
		
			$connection = mysqli_connect('localhost', $user, $password, $database);
	
			if(mysqli_connect_errno()){
				die("");
				return false;
			}else{
				return $connection;
			}
		}
	}

?>