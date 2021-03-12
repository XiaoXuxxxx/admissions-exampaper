<?php 

	session_start();
	require_once ('./auth/connect_db.php');

	if(isset($_POST['username']) && isset($_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$stmt = $db->prepare("SELECT * FROM users WHERE username=:username AND password=:password");
		$stmt->bindParam("username", $username,PDO::PARAM_STR);
		$stmt->bindParam("password", $password,PDO::PARAM_STR);
		$stmt->execute();
		$data = $stmt->rowCount();

		if($data){
			$user = $stmt->fetch(PDO::FETCH_OBJ);
			$_SESSION['user'] = $user->id;
			$_SESSION['role'] = $user->type;
			if($user->type == 1){
				header("Location:main.php");
			}else{
				header("Location:user_main.php");
			}
		}else{
			header("Location:index.php");
		}
	}

?>