<?php 
	require_once('../auth/connect_db.php');
	session_start();


	if(!empty($_SESSION['user']) && isset($_SESSION['role'])){

		$stmt = $db->prepare("DELETE FROM examData WHERE id =:id");
		$stmt->bindParam("id", $_POST['id'],PDO::PARAM_INT);
		$stmt->execute();

		echo 200;
	}
?>