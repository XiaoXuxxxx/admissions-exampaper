<?php 

	session_start();
	unset($_SESSION['user']);
	unset($_SESSION['role']);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>	
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript">
	swal("Logout","ออกจากระบบสำเร็จ","success")
</script>
</body>
</html>
