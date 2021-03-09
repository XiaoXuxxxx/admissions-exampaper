<?php 

	session_start();
	unset($_SESSION['user']);
	unset($_SESSION['role']);

?>
	<script type="text/javascript">
		window.alert("Logout Success!")
		window.location.href='index.php'
	</script>