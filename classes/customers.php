<?php

	require_once "../classes/encrypt.php";

	//Handles static functionality relevant to customers as a whole.
	class Customers{
			
		static function GetAll($connection){	
			
			$customers = [];
			
			if($statement = $connection->prepare("SELECT `alpha`, `first`, `last`, `sex`, `birthdate`, `phone`, `email`, `created`, `modified` FROM `customers` ORDER BY alpha ASC")){
					
				if($statement->execute()){

					if($statement->bind_result($alpha, $first, $last, $sex, $birthdate, $phone, $email, $created, $modified)){
						
						$i = 0;
						
						while($statement->fetch()){
								
							$customers[$i]['alpha'] 	= $alpha;
							$customers[$i]['first'] 	= Encrypt::decrypt_db($first);
							$customers[$i]['last']	 	= Encrypt::decrypt_db($last);
							$customers[$i]['sex'] 		= $sex;
							$customers[$i]['sexWord']	= $sex == 0 ? "Female" : "Male";
							$customers[$i]['birthdate'] = $birthdate;
							$customers[$i]['birthdateWord'] = date("M j, Y", $birthdate);
							$customers[$i]['phone'] 	= Encrypt::decrypt_db($phone);
							$customers[$i]['email'] 	= Encrypt::decrypt_db($email);
							$customers[$i]['created'] 	= $created;
							$customers[$i]['modified'] 	= $modified;

							
							$i++;
						}
					}
				}
			}
			
			return $customers;	
		}
		
		static function Insert($connection){
			$efirst = Encrypt::encrypt_db("");
			$elast = Encrypt::encrypt_db("");
			$ephone = Encrypt::encrypt_db("");
			$eemail = Encrypt::encrypt_db("");
			$created = date("U");
			
			if($statement = $connection->prepare("INSERT INTO `customers`(`alpha`, `first`, `last`, `sex`, `birthdate`, `phone`, `email`, `created`, `modified`) VALUES (NULL,?,?,1,0,?,?,?,0)")){
					
				if($statement->bind_param('ssssi', $efirst, $elast, $ephone, $eemail, $created)){	
					
					if($statement->execute()){
						$alpha = $connection->insert_id;
					}
				}
			}
			
			return $alpha;	
		}
		
		static function Update($connection, $alpha, $first, $last, $sex, $birthdate, $phone, $email, $modified){
			$efirst = Encrypt::encrypt_db($first);
			$elast = Encrypt::encrypt_db($last);
			$cbirthdate = strtotime($birthdate);
			$ephone = Encrypt::encrypt_db($phone);
			$eemail = Encrypt::encrypt_db($email);
			
			if($statement = $connection->prepare("UPDATE `customers` SET `first`=?,`last`=?,`sex`=?,`birthdate`=?,`phone`=?,`email`=?,`modified`=? WHERE `alpha` = ?")){
					
				if($statement->bind_param('ssiissii', $efirst, $elast, $sex, $cbirthdate, $ephone, $eemail, $modified, $alpha)){	
					
					if($statement->execute()){
						return true;
					}
				}
			}
			
			return false;
			
		}
		
		static function Delete($connection, $alpha){
			if($statement = $connection->prepare("DELETE FROM `customers` WHERE `alpha` = ?")){
					
				if($statement->bind_param('i', $alpha)){	
					
					if($statement->execute()){
						return true;
					}
				}
			}
			
			return false;
		}
	}
	
?>