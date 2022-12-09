<!DOCTYPE html>
<html>
	<head>
		<title>Admissions ExamPaper</title>
		<meta charset="utf-8">
		<?php require_once('./session.php');?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/css?family=Athiti" rel="stylesheet">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="./css/app.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.css" integrity="sha512-EaaldggZt4DPKMYBa143vxXQqLq5LE29DG/0OoVenoyxDrAScYrcYcHIuxYO9YNTIQMgD8c8gIUU8FQw7WpXSQ==" crossorigin="anonymous" />
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Srisakdi:wght@700&display=swap" rel="stylesheet">
		<style type="text/css">
		body{
		font-family: 'Athiti', sans-serif;
		}
		</style>
	</head>
	<body>
		<input type="text" id="role" value="<?php echo $_SESSION['role'];?>" hidden>
		<div id="main-container">
			
			<div id="main-page">
				<div id="main-content">
					<ol class="breadcrumb">
						<li><a href="">Home</a></li>
						<li>Welcome :: <?php echo $_SESSION['name']; ?></li>
						<li class=""><a href="./logout.php">logout</a></li>
					</ol>
					<div id="main-content-container">
						<h2><i class="fa fa-file-signature"></i> สรุปรายการแต่ละโรงเรียน</h2>
						<?php
							$school[0] = "วัดนวลนรดิศ";
							$school[1] = "วัดราชโอรส";
							$school[2] = "บางปะกอกวิทยาคม";
							$school[3] = "วิทยาลัยพณิชยการเชตุพน";
							$school[4] = "ปัญญาวรคุณ";
							$school[5] = "โพธิสารพิทยากร";
							$school[6] = "สมุทรปราการ";
							$school[7] = "เทพศิรินทร์ สมุทรปราการ";
							$school[8] = "สตรีสมุทรปราการ";
							$school[9] = "ศึกษานารี";
							$school[10] = "มัธยมวัดสิงห์";
							$school[11] = "รัตนโกสินทร์สมโภช บางขุนเทียน";
							$school[12] = "มจธ. CBT";

							$sub[0] = "tg1";
							$sub[1] = "tg2";
							$sub[2] = "tg3";
							$sub[3] = "tp21";
							$sub[4] = "tp22";
							$sub[5] = "tp23";
							$sub[6] = "tp3";
							$sub[7] = "tp4";
							$sub[8] = "tp5";
							$sub[9] = "m1";
							$sub[10] = "m2";
							$sub[11] = "m3";
							$sub[12] = "m4";
							$sub[13] = "m5";
							$sub[14] = "m6";
							$sub[15] = "m7";
							$sub[16] = "m8";
							$sub[17] = "m9";
							$sub[18] = "m10";
							$sub[19] = "m11";
							$sub[20] = "m12";
							$sub[21] = "m13";
							$sub[22] = "m14";
							$sub[23] = "m15";
							$sub[24] = "m16";
							$sub[25] = "o1";
							$sub[26] = "o2";
							$sub[27] = "o3";
							$sub[28] = "o4";
							$sub[29] = "o5";
							$sub[30] = "k1";
							$sub[31] = "k2";
							$sub[32] = "k3";
							$sub[33] = "k4";
							$sub[34] = "k5";

							function exam_subject($sub){
								if($sub == "tg1"){
									return "TGAT1 การสื่อสารภาษาอังกฤษ";
								}else if($sub == "tg2"){
									return "TGAT2 การคิดอย่างมีเหตุผล";
								}else if($sub = "tg3"){
									return "TGAT3 สมรรถนะการทำงาน";
								}else if($sub = "tp21"){
									return "ทัศนศิลป์";
								}else if($sub = "tp22"){
									return "ดนตรี";
								}else if($sub = "tp23"){
									return "นาฏศิลป์";
								}else if($sub = "tp3"){
									return "ความถนัดวิทยาศาสตร์ เทคโนโลยี วิศวกรรมศาสตร์";
								}else if($sub = "tp4"){
									return "ความถนัดสถาปัตยกรรมศาสตร์";
								}else if($sub = "tp5"){
									return "ความถนัดครุศาสตร์-ศึกษาศาสตร์";
								}else if($sub = "m1"){
									return "A-Level คณิตศาสตร์ประยุกต์ 1 (พื้นฐาน+เพิ่มเติม)";
								}else if($sub = "m2"){
									return "A-Level คณิตศาสตร์ประยุกต์ 2 (พื้นฐาน)";
								}else if($sub = "m3"){
									return "A-Level วิทยาศาสตร์ประยุกต์";
								}else if($sub = "m4"){
									return "A-Level ฟิสิกส์";
								}else if($sub = "m5"){
									return "A-Level เคมี";
								}else if($sub = "m6"){
									return "A-Level ชีววิทยา";
								}else if($sub = "m7"){
									return "A-Level สังคมศาสตร์";
								}else if($sub = "m8"){
									return "A-Level ภาษาไทย";
								}else if($sub = "m9"){
									return "A-Level ภาษาอังกฤษ";
								}else if($sub = "m10"){
									return "A-Level ภาษาฝรั่งเศส";
								}else if($sub = "m11"){
									return "A-Level ภาษาเยอรมัน";
								}else if($sub = "m12"){
									return "A-Level ภาษาญี่ปุ่น";
								}else if($sub = "m13"){
									return "A-Level ภาษาเกาหลี";
								}else if($sub = "m14"){
									return "A-Level ภาษาจีน";
								}else if($sub = "m15"){
									return "A-Level ภาษาบาลี";
								}else if($sub = "m16"){
									return "A-Level ภาษาสเปน";
								}else if($sub == "o1"){
									return "ONET - ภาษาไทย";
								}else if($sub == "o2"){
									return "ONET - คณิตศาสตร์";
								}else if($sub == "o3"){
									return "ONET - วิทยาศาสตร์";
								}else if($sub == "o4"){
									return "ONET - ภาษาอังกฤษ";
								}else if($sub == "o5"){
									return "ONET - สังคมศึกษา ศาสนาและวัฒนธรรม";
								}else if($sub == "k1"){
									return "ครู - ภาษาไทยเพื่อการสื่อสาร";
								}else if($sub == "k2"){
									return "ครู - ภาษาอังกฤษเพื่อการสื่อสาร";
								}else if($sub == "k3"){
									return "ครู - เทคโนโลยีดิจิทัลเพื่อการสื่อสาร";
								}else if($sub == "k4"){
									return "ครู - วิชาชีพครู (ปรนัย)";
								}else if($sub == "k5"){
									return "ครู - วิชาชีพครู (อัตนัย)";
								}
							}

							for($i=0 ; $i<=15 ; $i++){
								echo "<br><h4>".$school[$i]."</h4>";

								echo "<table class='table table-hover table-bordered'>";
								echo "<tr>";
									echo "<th>รายวิชา</th>";
									echo "<th>จำนวนกระดาษ</th>";
									echo "<th>จำนวนกระดาษ พิเศษ</th>";
									echo "<th>จำนวนกระดาษ สำรอง</th>";
									echo "<th>จำนวนผู้เข้าสอบ</th>";
									echo "<th>จำนวนผู้ขาดสอบ</th>";
								echo "</tr>";

								for($s=0 ; $s<=34 ; $s++){
									$c = $db->prepare("SELECT * FROM examData WHERE school = '$school[$i]' AND subject = '$sub[$s]'");
									$c->execute();
									$count = $c->rowCount();

									if($count){
										$stmt = $db->prepare("SELECT SUM(paper) as cpaper, SUM(paper_extra) as cpaper_extra, SUM(paper_backup) as cpaper_backup, SUM(attend) as cattend, SUM(no_attend) as cno_attend FROM examData WHERE school = '$school[$i]' AND subject = '$sub[$s]' AND verify = 1");
										$stmt->execute();
										$data = $stmt->fetch(PDO::FETCH_OBJ);

										echo "<tr>";
										echo "<td>".exam_subject($sub[$s])."</td>";
										echo "<td>".$data->cpaper." ใบ</td>";
										echo "<td>".$data->cpaper_extra." ใบ</td>";
										echo "<td>".$data->cpaper_backup." ใบ</td>";
										echo "<td>".$data->cattend." คน</td>";
										echo "<td>".$data->cno_attend." คน</td>";
										echo "</tr>";
									}
									
								}

								echo "</table>";
							}
						?>
					</div>

				<div id="footer">
					Admissions and Recruitment KMUTT<br>
					Tel : <a href="tel:024708333">02 470 8333</a>
				</div>
				<br>
				<br>
			</div>
		</div>
	</div>
</div>
<script src="https://kit.fontawesome.com/1bab47d858.js" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap.min.js"></script>
</body>
</html>