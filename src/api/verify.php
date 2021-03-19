<?php 
	require_once('../auth/connect_db.php');
	session_start();


	if(!empty($_SESSION['user']) && $_SESSION['role'] == 2){
		$attend = 0;
		$no_attend = 0;

		if($_POST['attend'] == "" || $_POST['attend'] == "undefined"){
			$attend = 0;
		}else{
			$attend = $_POST['attend'];
		}

		if($_POST['no_attend'] == "" || $_POST['no_attend'] == "undefined"){
			$no_attend = 0;
		}else{
			$no_attend = $_POST['no_attend'];
		}


		$stmt = $db->prepare("UPDATE examData SET verify = 1,attend =:attend, no_attend=:no_attend WHERE id =:id");
		$stmt->bindParam("id", $_POST['id'],PDO::PARAM_INT);
		$stmt->bindParam("attend", $attend,PDO::PARAM_INT);
		$stmt->bindParam("no_attend", $no_attend,PDO::PARAM_INT);
		$stmt->execute();

		echo 200;
	}
?>