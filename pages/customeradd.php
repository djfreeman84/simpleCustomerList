<?php
	
	require_once "../includes/classes.php";
	
	if($alpha = Customers::Insert($connection)){
		$eAlpha = Encrypt::encrypt_url($alpha);
		header('location:customeredit.php?customer='.$eAlpha);
	}
?>