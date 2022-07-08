<?php

	//Handles functionality relevant to a single instantiated customer object.
	class Customer{
		public $alpha;
		public $first;
		public $last;
		public $sex;
		public $birthdate;
		public $phone;
		public $email;
		public $created;
		public $modified;
		
		function __construct($connection, $alpha){	
			
			if($statement = $connection->prepare("
			SELECT `first`, `last`, `sex`, `birthdate`, `phone`, `email`, 
			`created`, `modified` FROM `customers` WHERE `alpha` = ? LIMIT 1")){
					
				if($statement->bind_param('i', $alpha)){	
					
					if($statement->execute()){

						if($statement->bind_result(
							$first, $last, $sex, $birthdate, $phone, $email, $created, 
							$modified)){
							
							$i = 0;
							
							while($statement->fetch()){
									
								$this->alpha 		= $alpha;
								$this->first 		= Encrypt::decrypt_db($first);
								$this->last	 		= Encrypt::decrypt_db($last);
								$this->sex 			= $sex;
								$this->sexWord		= $sex == 0 ? "Female" : "Male";
								$this->birthdate 	= $birthdate;
								$this->birthdateValue= date("Y-m-d", $birthdate);
								$this->birthdateWord= date("M j, Y", $birthdate);
								$this->phone 		= Encrypt::decrypt_db($phone);
								$this->email 		= Encrypt::decrypt_db($email);
								$this->created 		= $created;
								$this->modified 	= $modified;

								
								$i++;
							}
						}
					}
				}
			}
		}
	
		function ReturnJSON(){
			$object = '{';
				$object .= '\"alpha\":\"'.$this->alpha.'\",';
				$object .= '\"first\":\"'.$this->first.'\",';
				$object .= '\"last\":\"'.$this->last.'\",';
				$object .= '\"sex\":'.$this->sex.',';
				$object .= '\"birthdate\":\"'.$this->birthdateValue.'\",';
				$object .= '\"phone\":\"'.$this->phone.'\",';
				$object .= '\"email\":\"'.$this->email.'\"';
			$object .= '}';
			
			return $object;
		}
	}
	
?>