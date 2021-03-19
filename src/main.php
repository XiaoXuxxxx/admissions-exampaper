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
					<?php if($_SESSION['role'] == 1){ ?>
						<h2><i class="fa fa-file"></i> เพิ่มข้อมูลข้อสอบ</h2>
						<hr>
						<form action="javascript:insert()" id="form-insert">
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label>เลือกการจัดสอบ</label>
										<select class="form-control" id="exam_type" required onchange="auto_exam_list()">
											<option value="0">โปรดเลือก ...</option>
											<option value="1">O-NET</option>
											<option value="2">GAT/PAT</option>
											<option value="3">วิชาสามัญ</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>รายวิชา</label>
									<select class="form-control" id="exam_subject" required></select>
									</div>
								</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>โรงเรียน</label>
									<select class="form-control" id="school" required>
										<option value="0">โปรดเลือก ...</option>
										<option>ทวีธาภิเศก</option>
										<option>เทพศิรินทร์สมุทรปราการ</option>
										<option>บางปะกอกวิทยาคม</option>
										<option>ปัญญาวรคุณ</option>
										<option>โพธิสารพิทยากร</option>
										<option>มัธยมวัดดาวคนอง</option>
										<option>มัธยมวัดสิงห์</option>
										<option>มัธยมวัดหนองแขม</option>
										<option>รัตนโกสินทร์สมโภชบางขุนเทียน</option>
										<option>ราชประชาสมาสัยฝ่ายมัธยม</option>
										<option>วัดนวลนรดิศ</option>
										<option>วัดราชโอรส</option>
										<option>วัดอินทาราม</option>
										<option>วิทยาลัยพณิชยการเชตุพน</option>
										<option>ศึกษานารี</option>
										<option>สตรีสมุทรปราการ</option>
										<option>สมุทรปราการ</option>
									</select>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>กล่องที่</label>
									<input type="text" id="batch_no" class="form-control" required placeholder="กล่องที่">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<div class="form-group">
									<label>เลขที่ผู้เข้าสอบ (เริ่ม)</label>
									<input type="number" id="id_start_no" onchange="call_people()" class="form-control" required placeholder="เลขที่เริ่ม" min="1" max="1000000000">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>เลขที่ผู้เข้าสอบ (ท้าย)</label>
									<input type="number" id="id_end_no" onchange="call_people()" class="form-control" required placeholder="เลขที่ท้าย" min="1" max="1000000000">
								</div>
							</div>
							<div class="col-md-1">
								<div class="form-group">
									<label>เลขที่ผู้เข้าสอบ</label>
									<input type="text" id="extra1" placeholder="พิเศษ 1" class="form-control">
								</div>
							</div>
							<div class="col-md-1">
								<div class="form-group">
									<label>เลขที่ผู้เข้าสอบ</label>
									<input type="text" id="extra2" placeholder="พิเศษ 2" class="form-control">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>จำนวนกระดาษ</label>
									<input type="number" id="paper" onchange="call_paper()" class="form-control" required placeholder="จำนวนกระดาษ" max="10000">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>จำนวนกระดาษ (พิเศษ)</label>
									<input type="number" id="paper_extra" onchange="call_paper()" class="form-control" required placeholder="จำนวนกระดาษพิเศษ" value="0" max="10000">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>จำนวนกระดาษทั้งหมด</label><br>
									<div id="sum_paper">0 ชุด</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-11"></div>
							<div class="col-md-1">
								<div class="form-group">
									<input type="text" id="uid" value="<?php echo $_SESSION['user'];?>" hidden>
									<input type="submit" class="btn btn-success btn-block" value="บันทึกข้อมูล">
								</div>
							</div>
						</div>
						
					</form>
					<!-- section history -->
					<div id="history">
						<hr>
						<h2><i class="fa fa-history"></i> ประวัติบันทึกข้อมูล</h2>
						<p><b>ผู้บันทึกข้อมูล :</b> <?php echo $_SESSION['name'];?> [UID: <?php echo $_SESSION['user'];?>] </p>
						<div class="table-responsive">
							<table id="table-history" border="0" class="table table-hover display" >
								<thead>
									<tr>
										<th>ที่</th>
										<th>การจัดสอบ</th>
										<th>รายวิชา</th>
										<th>โรงเรียน</th>
										<th>กล่องที่</th>
										<th>เลขที่ผู้เข้าสอบ</th>
										<th>จำนวนกระดาษ</th>
										<th>จัดการ</th>
									</tr>
								</thead>
								<tbody id="data-history"></tbody>
									
							</table>
						</div>
					</div>



				<!-- SUPER Admin Section  -->

				<?php }else{ ?>

					<h2><i class="fa fa-search"></i> ค้นหาข้อมูลข้อสอบ</h2>
					<form action="javascript:getExamData()" id="form-search">
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label>เลือกการจัดสอบ</label>
										<select class="form-control" id="exam_type" required onchange="auto_exam_list()">
											<option value="0">โปรดเลือก ...</option>
											<option value="1">O-NET</option>
											<option value="2">GAT/PAT</option>
											<option value="3">วิชาสามัญ</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>รายวิชา</label>
									<select class="form-control" id="exam_subject" required></select>
									</div>
								</div>
								<div class="col-md-1">
									<div class="form-group">
										<label>ค้นหา</label>
										<input type="submit" class="btn btn-primary btn-block" value="ค้นหา">
									</div>
								</div>
							</div>
						</form>
						<hr>
						<div id="data-section">
							<h2><i class="fa fa-file"></i> ข้อมูลข้อสอบ</h2>
							<div class="table-responsive">
							<table id="table-history" border="0" class="table table-hover display" >
								<thead>
									<tr>
										<th>ที่</th>
										<th>การจัดสอบ</th>
										<th>รายวิชา</th>
										<th>โรงเรียน</th>
										<th>กล่องที่</th>
										<th>เลขที่ผู้เข้าสอบ</th>
										<th>จำนวนกระดาษ</th>
										<th>โดย</th>
										<th>ดำเนินการ</th>
									</tr>
								</thead>
								<tbody></tbody>
									
							</table>
						</div>
						<hr>
						<div id="stat">
							<h2><i class="fa fa-chart-pie"></i> สถิติ <small>(Verified)</small></h2>
							<div class="row">
								<div class="col-md-3">
									<div class="panel panel-default">
							            <div class="panel-heading"><center>
							              <h5 class="panel-title"><b> จำนวนกระดาษ</b></h5>
							            </div>
							            <div class="panel-body"><center>
							            	<h1 id="cpaper"></h1>
							            </div>
							          </div>
								</div>
								<div class="col-md-3">
									<div class="panel panel-default">
							            <div class="panel-heading"><center>
							              <h5 class="panel-title"><b> จำนวนกระดาษ (พิเศษ)</b></h5>
							            </div>
							            <div class="panel-body"><center>
							            	<h1 id="cpaper_extra"></h1>
							            </div>
							          </div>
								</div>
								<div class="col-md-3">
									<div class="panel panel-default">
							            <div class="panel-heading"><center>
							              <h5 class="panel-title"><b> จำนวนผู้เข้าสอบ</b></h5>
							            </div>
							            <div class="panel-body"><center>
							            	<h1 id="cattend"></h1>
							            </div>
							          </div>
								</div>
								<div class="col-md-3">
									<div class="panel panel-default">
							            <div class="panel-heading"><center>
							              <h5 class="panel-title"><b> จำนวนผู้<u>ขาดสอบ</u></b></h5>
							            </div>
							            <div class="panel-body"><center>
							            	<h1 id="cno_attend"></h1>
							            </div>
							          </div>
								</div>

							</div>
						</div>
						

						<!-- Modal -->
						<div class="modal fade" id="v-app" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-history"></i> โปรดตรวจสอบข้อมูลให้ครบถ้วน</h4>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						  
						      	<div class="row">
						      		<div class="col-md-12">
						      			<div class="form-group">
						      				<label>
						      					<b>ประเภทการสอบ</b> : <text id="v_exam_type"></text><br>
						      					<b>รายวิชา</b> : <text id="v_exam_sub"></text><br>
						      					<b>สนามสอบ</b> : <text id="v_school"></text><br>
						      					<b>กล่องที่ </b> : <text id="v_box"></text><br>
						      					<b>เลขที่ผู้เข้าสอบ</b> : <text id="v_no_student"></text><br>
						      					<b>เลขที่ผู้เข้าสอบ(พิเศษ)</b> : <text id="v_no_student_ex"></text><br>
						      					<b>จำนวนกระดาษ</b> : <text id="v_paper"></text><br>
						      					<b>ผู้บันทึก :</b> <text id="v_name"></text> 
						      				</label>
						      				<hr>
						      			</div>
						      		</div>
						      	</div>
						      	<div class="row">
						      		<div class="col-md-6">
						      			<div class="form-group">
						      				<label>จำนวนผู้<font color="green"><u>เข้าสอบ </u></font></label>
						      				<input class="form-control" autofocus type="number" id="attend" placeholder="จำนวนผู้เข้าสอบ">
						      			</div>
						      		</div>
						      		<div class="col-md-6">
						      			<div class="form-group">
						      				<label>จำนวนผู้<font color="red"><u>ขาดสอบ </u></font></label>
						      				<input class="form-control" type="number" id="no_attend" placeholder="จำนวนผู้ขาดสอบ">
						      			</div>
						      		</div>
						      	</div>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						        <button type="button" onclick="verify_data()" class="btn btn-success"><i class="fa fa-check"></i> Verify!</button>
						      </div>
						    </div>
						  </div>
						</div>



						<div class="modal fade" id="v-app-view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-history"></i> ข้อมูลข้อสอบ</h4>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						  
						      	<div class="row">
						      		<div class="col-md-12">
						      			<div class="form-group">
						      				<label>
						      					<b>ประเภทการสอบ</b> : <text id="vv_exam_type"></text><br>
						      					<b>รายวิชา</b> : <text id="vv_exam_sub"></text><br>
						      					<b>สนามสอบ</b> : <text id="vv_school"></text><br>
						      					<b>กล่องที่ </b> : <text id="vv_box"></text><br>
						      					<b>เลขที่ผู้เข้าสอบ</b> : <text id="vv_no_student"></text><br>
						      					<b>เลขที่ผู้เข้าสอบ(พิเศษ)</b> : <text id="vv_no_student_ex"></text><br>
						      					<b>จำนวนกระดาษ</b> : <text id="vv_paper"></text><br>
						      					<b>ผู้บันทึก :</b> <text id="vv_name"></text> 
						      				</label>
						      				<hr>
						      			</div>
						      		</div>
						      	</div>
						      	<div class="row">
						      		<div class="col-md-6">
						      			<div class="form-group">
						      				<label>จำนวนผู้<font color="green"><u>เข้าสอบ </u></font></label><br>
						      				<text id="vattend"></text>
						      			</div>
						      		</div>
						      		<div class="col-md-6">
						      			<div class="form-group">
						      				<label>จำนวนผู้<font color="red"><u>ขาดสอบ </u></font></label><br>
						      				<text id="vno_attend"></text>
						      			</div>
						      		</div>
						      	</div>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						      </div>
						    </div>
						  </div>
						</div>

						</div>
						
				<?php }?>
			</div>

				<!-- End super admin section -->

				<!-- Button trigger modal -->

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
<script type="text/javascript" src="./js/main-app.js"></script>
</body>
</html>