<?php 
	require_once('../auth/connect_db.php');
	session_start();
	$msg = new \stdClass();

	if(!empty($_SESSION['user']) && $_SESSION['role'] == 1){

		$stmt = $db->prepare("INSERT INTO examData 
				(exam_type, subject, school, box_id, start_id, end_id, extra1,extra2, extra3, extra4, extra5, paper, paper_extra,paper_backup, post_id) VALUES
				(:exam_type,:subject,:school,:box_id,:start_id,:end_id, :extra1, :extra2, :extra3, :extra4, :extra5, :paper,:paper_extra,:paper_backup,:post_id) ");
		$stmt->bindParam("exam_type", $_POST['exam_type'], PDO::PARAM_INT);
		$stmt->bindParam("subject", $_POST['exam_subject'], PDO::PARAM_STR);
		$stmt->bindParam("school", $_POST['school'], PDO::PARAM_STR);
		$stmt->bindParam("box_id", $_POST['batch_no'], PDO::PARAM_STR);
		$stmt->bindParam("start_id", $_POST['id_start_no'], PDO::PARAM_STR);
		$stmt->bindParam("end_id", $_POST['id_end_no'], PDO::PARAM_STR);
		$stmt->bindParam("extra1", $_POST['extra1'], PDO::PARAM_STR);
		$stmt->bindParam("extra2", $_POST['extra2'], PDO::PARAM_STR);
		$stmt->bindParam("extra3", $_POST['extra3'], PDO::PARAM_STR);
		$stmt->bindParam("extra4", $_POST['extra4'], PDO::PARAM_STR);
		$stmt->bindParam("extra5", $_POST['extra5'], PDO::PARAM_STR);
		$stmt->bindParam("paper", $_POST['paper'], PDO::PARAM_STR);
		$stmt->bindParam("paper_extra", $_POST['paper_extra'], PDO::PARAM_STR);
		$stmt->bindParam("paper_backup", $_POST['paper_backup'], PDO::PARAM_STR);
		$stmt->bindParam("post_id", $_POST['uid'], PDO::PARAM_INT);
		$stmt->execute();

		$msg->status = 200;
		$msg->text = "เพิ่มข้อมูลสำเร็จ => [".$_POST['exam_type']."]";

		echo json_encode($msg);
	}
?>