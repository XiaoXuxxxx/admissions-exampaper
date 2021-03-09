<!DOCTYPE html>
<html>
<head>
	<?php 
		require_once("./session.php"); 
	?>
	<title>Attendance Check :: main</title>
</head>
	<body>
		<h1>Teacher Main Page</h1>
		<hr>
		<a href="logout.php">Logout</a>
		<h3>Create Session</h3>
			<form action="add_session.php" method="post">
				<table>
					<tr>
						<td>Name Session :</td>
						<td><input type="text" required name="name"></td>
					</tr>
					<tr>
						<td>Date : </td>
						<td><input type="text" required name="date"></td>
					</tr>
				</table>
				<input type="submit" value="Add">
			</form>

		<h3>View All Session</h3>
		<?php 
			$stmt = $db->prepare("SELECT * FROM sessions ORDER BY date DESC");
			$stmt->execute();
			$count = $stmt->rowCount();
			$data = $stmt->fetchAll();

			echo "<ul>";
			for($i=0; $i<$count; $i++){
				echo "<a href='view_atten.php?atten_id=".$data[$i]['id']."'>";
				if(!$i){
					echo "<li>Date : ".$data[$i]['date']." >> ".$data[$i]['name']." <font color='red'>** new </font></li>";
				}else{
					echo "<li>Date : ".$data[$i]['date']." >> ".$data[$i]['name']." </li>";
				}
				echo "</a>";
			}
			echo "</ul>";
		?>
	</body>
</html>