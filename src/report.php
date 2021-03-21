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
							$school[0] = "วัดราชโอรส";
							$school[1] = "โพธิสารพิทยากร";
							$school[2] = "ปัญญาวรคุณ";
							$school[3] = "วัดนวลนรดิศ";
							$school[4] = "บางปะกอกวิทยาคม";
							$school[5] = "วิทยาลัยพณิชยการเชตุพน";
							$school[6] = "เทพศิรินทร์สมุทรปราการ";
							$school[7] = "สมุทรปราการ";
							$school[8] = "ทวีธาภิเศก";
							$school[9] = "สตรีสมุทรปราการ";
							$school[10] = "รัตนโกสินทร์สมโภชบางขุนเทียน";
							$school[11] = "มัธยมวัดสิงห์";
							$school[12] = "ราชประชาสมาสัยฝ่ายมัธยม";
							$school[13] = "มัธยมวัดหนองแขม";
							$school[14] = "วัดอินทาราม";
							$school[15] = "มัธยมวัดดาวคนอง";
							$school[16] = "ศึกษานารี";

							$sub[0] = "g1";
							$sub[1] = "g2";
							$sub[2] = "p1";
							$sub[3] = "p2";
							$sub[4] = "p3";
							$sub[5] = "p41";
							$sub[6] = "p42";
							$sub[7] = "p43";
							$sub[8] = "p5";
							$sub[9] = "p6";
							$sub[10] = "p71";
							$sub[11] = "p72";
							$sub[12] = "p73";
							$sub[13] = "p74";
							$sub[14] = "p75";
							$sub[15] = "p76";
							$sub[16] = "p77";
							$sub[17] = "m1";
							$sub[18] = "m2";
							$sub[19] = "m3";
							$sub[20] = "m4";
							$sub[21] = "m5";
							$sub[22] = "m6";
							$sub[23] = "m7";
							$sub[24] = "o1";
							$sub[25] = "o2";
							$sub[26] = "o3";
							$sub[27] = "o4";
							$sub[28] = "o5";


							function exam_subject($sub){
								if($sub == "g1"){
									return "GAT ตอนที่ 1";
								}else if($sub == "g2"){
									return "GAT ตอนที่ 2";
								}else if($sub == "p1"){
									return "PAT 1 ความถนัดทางคณิตศาสตร์";
								}else if($sub == "p2"){
									return "PAT 2 ความถนัดทางวิทยาศาสตร์";
								}else if($sub == "p3"){
									return "PAT 3 ความถนัดทางวิศวกรรมศาสตร์";
								}else if($sub == "p41"){
									return "PAT 4 (1) ความถนัดทางสถาปัตยกรรมศาสตร์";
								}else if($sub == "p42"){
									return "PAT 4 (2) ความถนัดทางสถาปัตยกรรมศาสตร์";
								}else if($sub == "p43"){
									return "PAT 4 (3) ความถนัดทางสถาปัตยกรรมศาสตร์";
								}else if($sub == "p5"){
									return "PAT 5 ความถนัดทางวิชาชีพครู";
								}else if($sub == "p6"){
									return "PAT 6 ความถนัดทางศิลปกรรมศาสตร์";
								}else if($sub == "p71"){
									return "PAT 7.1 ความถนัดทางภาษาฝรั่งเศส";
								}else if($sub == "p72"){
									return "PAT 7.2 ความถนัดทางภาษาเยอรมัน";
								}else if($sub == "p73"){
									return "PAT 7.3 ความถนัดทางภาษาญี่ปุ่น";
								}else if($sub == "p74"){
									return "PAT 7.4 ความถนัดทางภาษาจีน";
								}else if($sub == "p75"){
									return "PAT 7.5 ความถนัดทางภาษาอาหรับ";
								}else if($sub == "p76"){
									return "PAT 7.6 ความถนัดทางภาษาบาลี";
								}else if($sub == "p77"){
									return "PAT 7.7 ความถนัดทางภาษาเกาหลี";
								}else if($sub == "m1"){
									return "69 ชีววิทยา";
								}else if($sub == "m2"){
									return "49 ฟิสิกส์";
								}else if($sub == "m3"){
									return "09 ภาษาไทย";
								}else if($sub == "m4"){
									return "19 สังคมศึกษา";
								}else if($sub == "m5"){
									return "39 คณิตศาสตร์ 1";
								}else if($sub == "m6"){
									return "29 ภาษาอังกฤษ";
								}else if($sub == "m7"){
									return "59 เคมี";
								}else if($sub == "o1"){
									return "ภาษาไทย";
								}else if($sub == "o2"){
									return "คณิตศาสตร์";
								}else if($sub == "o3"){
									return "วิทยาศาสตร์";
								}else if($sub == "o4"){
									return "ภาษาอังกฤษ";
								}else if($sub == "o5"){
									return "สังคมศึกษา ศาสนาและวัฒนธรรม";
								}
							}

							for($i=0 ; $i<=16 ; $i++){
								echo "<br><h4>".$school[$i]."</h4>";

								echo "<table class='table table-hover table-bordered'>";
								echo "<tr>";
									echo "<th>รายวิชา</th>";
									echo "<th>จำนวนกระดาษ</th>";
									echo "<th>จำนวนกระดาษ พิเศษ</th>";
									echo "<th>จำนวนผู้เข้าสอบ</th>";
									echo "<th>จำนวนผู้ขาดสอบ</th>";
								echo "</tr>";

								for($s=0 ; $s<=28 ; $s++){
									$c = $db->prepare("SELECT * FROM examData WHERE school = '$school[$i]' AND subject = '$sub[$s]'");
									$c->execute();
									$count = $c->rowCount();

									if($count){
										$stmt = $db->prepare("SELECT SUM(paper) as cpaper, SUM(paper_extra) as cpaper_extra, SUM(attend) as cattend, SUM(no_attend) as cno_attend FROM examData WHERE school = '$school[$i]' AND subject = '$sub[$s]' AND verify = 1");
										$stmt->execute();
										$data = $stmt->fetch(PDO::FETCH_OBJ);

										echo "<tr>";
										echo "<td>".exam_subject($sub[$s])."</td>";
										echo "<td>".$data->cpaper." ใบ</td>";
										echo "<td>".$data->cpaper_extra." ใบ</td>";
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
<script type="text/javascript" src="./js/report.js"></script>
</body>
</html>