<?php 
	/* variable */	
	/* Connect Database Function */
	$servername 	= "exampaper_database";
	$username 		= "root";
	$password 		= "password1234";
	$database  		= "exampaper"; 

	try {
	  $db = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
	  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
	  echo "Connection failed: " . $e->getMessage();
	}


?>
