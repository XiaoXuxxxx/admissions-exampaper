<?php 
	require_once('../auth/connect_db.php');
	session_start();


	if(!empty($_SESSION['user']) && $_SESSION['role'] == 1){

		$stmt = $db->prepare("SELECT * FROM examData WHERE post_id =:id");
		$stmt->bindParam("id", $_GET['id'],PDO::PARAM_INT);
		$stmt->execute();
		$data = $stmt->fetchAll();

		echo json_encode($data);
	}
?>