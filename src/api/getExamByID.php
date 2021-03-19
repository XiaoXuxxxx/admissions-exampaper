<?php 
	require_once('../auth/connect_db.php');
	session_start();


	if(!empty($_SESSION['user']) && $_SESSION['role'] == 2){

		$stmt = $db->prepare("SELECT e.attend, e.no_attend,e.school, e.extra1,e.extra2, e.id ,e.exam_type,e.subject, e.box_id, e.start_id,e.end_id, e.paper, e.paper_extra, e.post_id, e.verify, u.name FROM examData as e LEFT JOIN users as u ON e.post_id = u.id WHERE e.id =:id");
		$stmt->bindParam("id", $_GET['id'],PDO::PARAM_INT);
		$stmt->execute();
		$data = $stmt->fetch(PDO::FETCH_OBJ);

		echo json_encode($data);
	}
?>