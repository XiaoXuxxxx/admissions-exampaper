<?php 
	
	require_once ('./session.php');
	require_once ('./auth/connect_db.php');

	if(isset($_POST['name']) && isset($_POST['date'])){
		$stmt = $db->prepare("INSERT INTO sessions (name,date) VALUES (:name, :date)");
		$stmt->bindParam("name", $_POST['name'], PDO::PARAM_STR);
		$stmt->bindParam("date", $_POST['date'], PDO::PARAM_STR);
		$send = $stmt->execute();

		if($send){
			?>
				<script type="text/javascript">
					window.alert("Add Session success!")
					window.location.href = "main.php"
				</script>
			<?php
		}else{
			?>
				<script type="text/javascript">
					window.alert("Error")
					window.location.href = "main.php"
				</script>
			<?php
		}
	}

?>