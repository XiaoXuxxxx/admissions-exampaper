<?php

	require_once("./auth/connect_db.php");
	session_start();

	if(!isset($_SESSION['user']) && !isset($_SESSION['role'])){
		?>
			<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
   	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Athiti" rel="stylesheet">
	<style type="text/css">
		body{
		font-family: 'Athiti', sans-serif;
		}
		</style>
</head>
<body>	
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
<script type="text/javascript">
	swal("โปรดเข้าสู่ระบบ","","warning").then(() => {
		window.location.href="index.php"
	})
</script>

</body>
</html>

		<?php
		exit();
	}
	
?>