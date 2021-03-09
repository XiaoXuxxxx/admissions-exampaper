<?php

	require_once("./auth/connect_db.php");
	session_start();

	if(!isset($_SESSION['user']) && !isset($_SESSION['role'])){
		?>
			<script type="text/javascript">
				window.alert('Please Login!');
          		window.location.href='index.php';
			</script>
		<?php
	}
	
?>