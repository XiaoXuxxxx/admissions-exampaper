<?php 
	require_once('../auth/connect_db.php');
	session_start();

	if(!empty($_SESSION['user']) && $_SESSION['role'] == 2){

			$stmt = $db->prepare("SELECT sum(e.paper) as cpaper , sum(e.paper_extra) as cpaper_extra, sum(attend) as cattend, sum(no_attend) as cno_attend FROM examData as e LEFT JOIN users as u ON e.post_id = u.id where exam_type = '$_GET[exam_type]' and subject = '$_GET[subject]'");
			$stmt->execute();
			$data = $stmt->fetchAll();

			echo json_encode($data);
		
		
	}
?>