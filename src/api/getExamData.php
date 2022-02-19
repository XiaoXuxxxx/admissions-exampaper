<?php 
	require_once('../auth/connect_db.php');
	session_start();

	if(!empty($_SESSION['user']) && $_SESSION['role'] == 2){
		if($_GET['exam_type'] == "0"){
			$stmt = $db->prepare("SELECT u.username, e.school, e.extra1,e.extra2, e.id as ide,e.exam_type,e.subject, e.box_id, e.start_id,e.end_id, e.paper, e.paper_extra, e.paper_backup, e.post_id, e.verify, u.name FROM examData as e LEFT JOIN users as u ON e.post_id = u.id");
			$stmt->execute();
			$data = $stmt->fetchAll();

			echo json_encode($data);
		}else{
			$stmt = $db->prepare("SELECT u.username, e.school, e.extra1,e.extra2, e.id as ide,e.exam_type,e.subject, e.box_id, e.start_id,e.end_id, e.paper, e.paper_extra, e.paper_backup, e.post_id, e.verify, u.name FROM examData as e LEFT JOIN users as u ON e.post_id = u.id WHERE e.exam_type =:type AND e.subject =:sub");
			$stmt->bindParam("type", $_GET['exam_type'],PDO::PARAM_INT);
			$stmt->bindParam("sub", $_GET['subject'],PDO::PARAM_STR);
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count){
				$data = $stmt->fetchAll();
				echo json_encode($data);
			}else{
				echo 404;
			}
			
		}
		
	}
?>