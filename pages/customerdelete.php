<?php
	
	require_once "../includes/classes.php";
	
	$alpha = globals::GetEncryptedInt("delete");
	if($alpha > 0){
		if(Customers::Delete($connection, $alpha)){
			header('location:customers.php?deleted=true');
		}else{
			header('location:customers.php?deleted=false');
		}
	}else{
		header('location:customers.php?deleted=false');
	}
	
	
	
?>