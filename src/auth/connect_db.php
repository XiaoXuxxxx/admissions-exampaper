<?php 
	
	/* Connect Database Function */
	$servername 	= "localhost";
	$username 		= "root";
	$password 		= "1234";
	$database  		= "ben"; 

	try {
	  $db = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
	  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
	  echo "Connection failed: " . $e->getMessage();
	}


?>