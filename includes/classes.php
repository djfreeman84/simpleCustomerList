<?php

	require_once "../classes/database.php";
	require_once "../classes/encrypt.php";
	require_once "../classes/globals.php";
	require_once "../classes/customer.php";
	require_once "../classes/customers.php";
	
	$database = new database;
	
	$connection = $database->Connection();
	
?>