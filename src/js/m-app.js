var sum_people = 0;
var sub_onet = `
	<option value="o1">ภาษาไทย</option>
	<option value="o2">คณิตศาสตร์</option>
	<option value="o3">วิทยาศาสตร์</option>
	<option value="o4">ภาษาอังกฤษ</option>
	<option value="o5">สังคมศึกษา ศาสนาและวัฒนธรรม</option>
`;
var sub_gat_pat = `
	<option value="g1">GAT ตอนที่ 1 (General Aptitude Test)</option>
	<option value="g2">GAT ตอนที่ 2 (General Aptitude Test)</option>
	<option value="p1">PAT 1 ความถนัดทางคณิตศาสตร์</option>
	<option value="p2">PAT 2 ความถนัดทางวิทยาศาสตร์</option>
	<option value="p3">PAT 3 ความถนัดทางวิศวกรรมศาสตร์</option>
	<option value="p41">PAT 4 (1) ความถนัดทางสถาปัตยกรรมศาสตร์</option>
	<option value="p42">PAT 4 (2) ความถนัดทางสถาปัตยกรรมศาสตร์</option>
	<option value="p43">PAT 4 (3) ความถนัดทางสถาปัตยกรรมศาสตร์</option>
	<option value="p5">PAT 5 ความถนัดทางวิชาชีพครู</option>
	<option value="p6">PAT 6 ความถนัดทางศิลปกรรมศาสตร์</option>
	<option value="p71">PAT 7.1 ความถนัดทางภาษาฝรั่งเศส</option>
	<option value="p72">PAT 7.2 ความถนัดทางภาษาเยอรมัน</option>
	<option value="p73">PAT 7.3 ความถนัดทางภาษาญี่ปุ่น</option>
	<option value="p74">PAT 7.4 ความถนัดทางภาษาจีน</option>
	<option value="p75">PAT 7.5 ความถนัดทางภาษาอาหรับ</option>
	<option value="p76">PAT 7.6 ความถนัดทางภาษาบาลี</option>
	<option value="p77">PAT 7.7 ความถนัดทางภาษาเกาหลี</option>
`;
var sub_main = `
	<option value="m1">ชีววิทยา</option>
	<option value="m2">ฟิสิกส์</option>
	<option value="m3">ภาษาไทย</option>
	<option value="m4">สังคมศึกษา</option>
	<option value="m5">คณิตศาสตร์ 1</option>
	<option value="m8">คณิตศาสตร์ 2</option>
	<option value="m6">ภาษาอังกฤษ</option>
	<option value="m9">วิทยาศาสตร์ทั่วไป</option>
	<option value="m7">เคมี</option>
`;

var sub_kru = `
	<option value="k1">วิชาการใช้ภาษาไทยเพื่อการสื่อสาร</option>
	<option value="k2">วิชาการใช้ภาษาอังกฤษเพื่อการสื่อสาร</option>
	<option value="k3">วิชาการใช้เทคโนโลยีดิจิทัลเพื่อการสื่อสาร</option>
	<option value="k4">วิชาชีพครู (ปรนัย)</option>
  <option value="k5">วิชาชีพครู (อัตนัย)</option>
`;

function auto_exam_list() {
  $("#exam_subject").find("option").remove().end();

  if ($("#exam_type").val() == 1) {
    $("#exam_subject").append(sub_onet);
  } else if ($("#exam_type").val() == 2) {
    $("#exam_subject").append(sub_gat_pat);
  } else if ($("#exam_type").val() == 3) {
    $("#exam_subject").append(sub_main);
  } else if ($("#exam_type").val() == 4) {
    $("#exam_subject").append(sub_kru);
  }
}

function call_people() {
  var sum = $("#id_end_no").val() - $("#id_start_no").val() + 1;

  if (sum <= 0) {
    $("#sum_people").html("<font color='red'>! Error !</font>");
  } else {
    $("#sum_people").html(sum + " คน");
  }

  sum_people = sum;
}

function sum_atten_people() {
  $("#sum_people").text("");
  $("#sum_people").text(
    parseInt($("#attend").val()) + parseInt($("#no_attend").val())
  );
}

sum_atten_people();

function call_paper() {
  var sum =
    parseInt($("#paper").val()) +
    parseInt($("#paper_extra").val()) +
    parseInt($("#paper_backup").val());
  $("#sum_paper").html(
    $("#paper").val() +
      "+" +
      $("#paper_extra").val() +
      "+" +
      $("#paper_backup").val() +
      " = " +
      sum +
      " ชุด"
  );
}

function insert() {
  var exam_type = $("#exam_type").val();
  var exam_subject = $("#exam_subject").val();
  var school = $("#school").val();
  var batch_no = $("#batch_no").val();
  var id_start_no = $("#id_start_no").val();
  var id_end_no = $("#id_end_no").val();
  var extra1 = $("#extra1").val();
  var extra2 = $("#extra2").val();
  var paper = $("#paper").val();
  var paper_extra = $("#paper_extra").val();
  var paper_backup = $("#paper_backup").val();
  var uid = $("#uid").val();

  console.log("ppbackup=>" + paper_backup);

  $.ajax({
    url: "/api/api.insert.php",
    method: "POST",
    data: {
      exam_type: exam_type,
      exam_subject: exam_subject,
      school: school,
      batch_no: batch_no,
      id_start_no: id_start_no,
      id_end_no: id_end_no,
      extra1: extra1,
      extra2: extra2,
      paper: paper,
      paper_extra: paper_extra,
      paper_backup: paper_backup,
      uid: uid,
    },
    success: function (resp) {
      var r = JSON.parse(resp);
      swal("Success", r.text, "success").then(() => {
        $("#form-insert")[0].reset();
        getHistory();
      });
    },
  });
}

var tb_his = $("#table-history").DataTable({
  order: [[0, "desc"]],
});

if ($("#role").val() == 1) {
  getHistory();
} else {
  getExamData();
  //$("#data-section").hide()
}

function getHistory() {
  $.ajax({
    url: "/api/getHistory.php?id=" + $("#uid").val(),
    method: "GET",
    success: function (r) {
      var resp = JSON.parse(r);
      var sumPaper = 0;
      var verify = "";
      var extra = "";
      tb_his.clear();
      for (var i = 0; i < resp.length; i++) {
        if (resp[i].verify == 1) {
          verify = " <font color='green'><i class='fa fa-check'></i></font>";
        } else {
          verify = " <font color='#999'><i class='fa fa-spinner'></i></font>";
        }
        if (resp[i].extra1 != "") {
          extra = "<br>พิเศษ : " + resp[i].extra1 + ", " + resp[i].extra2;
        } else {
          extra = "";
        }

        sumPaper =
          parseInt(resp[i].paper) +
          parseInt(resp[i].paper_extra) +
          parseInt(resp[i].paper_backup);
        tb_his.row
          .add([
            i + 1 + " " + verify,
            exam_type(resp[i].exam_type),
            exam_subject(resp[i].subject),
            resp[i].school,
            resp[i].box_id,
            resp[i].start_id + " - " + resp[i].end_id + extra,
            resp[i].paper +
              "+" +
              resp[i].paper_extra +
              "+" +
              resp[i].paper_backup +
              "=" +
              sumPaper,
            "<button onclick='delExamData(" +
              resp[i].id +
              ",`" +
              resp[i].subject +
              "`," +
              parseInt(i + 1) +
              ")' class='btn btn-sm btn-danger'><i class='fa fa-times'></i></button> ",
          ])
          .draw(false);
      }
    },
  });
}

function delExamData(id, subject, no) {
  swal({
    title: "ต้องการลบรายการนี้ใช่หรือไม่ ?",
    text: no + ". " + exam_subject(subject),
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((resp) => {
    if (resp) {
      $.ajax({
        url: "/api/deleteData.php",
        method: "POST",
        data: { id: id },
        success: function (resp) {
          if (resp == "200") {
            swal(
              "ลบสำเร็จ",
              no + ". " + exam_subject(subject) + " แล้ว",
              "success"
            ).then(() => {
              if ($("#role").val() == 1) {
                getHistory();
              } else {
                getExamData();
              }
            });
          }
        },
      });
    }
  });
}

/* Super Admin Section */

function getExamData() {
  $("#data-section").show("dd");
  if ($("#exam_type").val() == 0) $("#stat").hide("dd");
  $.ajax({
    url:
      "/api/getExamData.php?exam_type=" +
      $("#exam_type").val() +
      "&subject=" +
      $("#exam_subject").val(),
    method: "GET",
    success: function (r) {
      if (r == "404") {
        tb_his.rows().remove().draw();
        $("#stat").hide("dd");
      } else {
        var resp = JSON.parse(r);
        var sumPaper = 0;
        var verify = "";
        var disabled = "";
        var btn_type = "";
        tb_his.clear();
        for (var i = 0; i < resp.length; i++) {
          if (resp[i].verify == 1) {
            verify = " <font color='green'><i class='fa fa-check'></i></font>";
            disabled = "";
            btn_type = "btn-success";
            // disabled = "disabled"
            // btn_type = "btn-outline-success"
          } else {
            verify = " <font color='#999'><i class='fa fa-spinner'></i></font>";
            disabled = "";
            btn_type = "btn-success";
          }
          if (resp[i].extra1 != "") {
            extra = "<br>พิเศษ : " + resp[i].extra1 + ", " + resp[i].extra2;
          } else {
            extra = "";
          }

          sumPaper =
            parseInt(resp[i].paper) +
            parseInt(resp[i].paper_extra) +
            parseInt(resp[i].paper_backup);

          tb_his.row
            .add([
              i + 1 + " " + verify,
              exam_type(resp[i].exam_type),
              exam_subject(resp[i].subject),
              resp[i].school,
              resp[i].box_id,
              resp[i].start_id + " - " + resp[i].end_id + extra,
              resp[i].paper +
                "+" +
                resp[i].paper_extra +
                "+" +
                resp[i].paper_backup +
                "=" +
                sumPaper,
              resp[i].username,
              "<button onclick='VerifyData(" +
                resp[i].ide +
                ")' " +
                disabled +
                " class='btn btn-sm " +
                btn_type +
                "'>Verify</button> " +
                "<button onclick='viewData(" +
                resp[i].ide +
                ")' class='btn btn-sm btn-secondary'><i class='fa fa-eye'></i> </button> " +
                "<button onclick='delExamData(" +
                resp[i].ide +
                ",`" +
                resp[i].subject +
                "`," +
                parseInt(i + 1) +
                ")' class='btn btn-sm btn-danger'><i class='fa fa-times'></i></button> ",
            ])
            .draw(false);

          /* Count Section! */
          $.ajax({
            url:
              "/api/count.php?exam_type=" +
              $("#exam_type").val() +
              "&subject=" +
              $("#exam_subject").val(),
            method: "GET",
            success: function (resp) {
              var r = JSON.parse(resp);
              if ($("#exam_type").val() == 0) {
                $("#stat").hide("dd");
              } else {
                console.log(r[0].cpaper_backup);
                $("#cpaper").text(set_dat(r[0].cpaper));
                $("#cpaper_extra").text(
                  set_dat(r[0].cpaper_extra + "/" + r[0].cpaper_backup)
                );
                $("#cattend").text(set_dat(r[0].cattend));
                $("#cno_attend").text(set_dat(r[0].cno_attend));
                $("#stat").show("dd");
              }
            },
          });
        }
      }
    },
  });
}

function set_dat(val) {
  if (val == 0 || val == null) {
    return "-";
  } else {
    return val;
  }
}

var global_id_to_verify = 0;

function VerifyData(id) {
  global_id_to_verify = id;
  $("#v-app").modal("show");
  $.ajax({
    url: "/api/getExamByID.php?id=" + id,
    method: "GET",
    success: function (resp) {
      var r = JSON.parse(resp);
      $("#v_name").text(r.name);
      $("#v_exam_type").text(exam_type(r.exam_type));
      $("#v_exam_sub").text(exam_subject(r.subject));
      $("#v_school").text("โรงเรียน" + r.school);
      $("#v_box").text(r.box_id);
      $("#v_no_student").text(r.start_id + " - " + r.end_id);
      $("#v_no_student_ex").text(r.extra1 + ", " + r.extra2);
      $("#v_paper").text(
        parseInt(r.paper) + parseInt(r.paper_extra) + parseInt(r.paper_backup)
      );
      $("#attend").val(r.attend);
      $("#no_attend").val(r.no_attend);
    },
  });
}

function viewData(id) {
  $("#v-app-view").modal("show");
  $.ajax({
    url: "/api/getExamByID.php?id=" + id,
    method: "GET",
    success: function (resp) {
      var r = JSON.parse(resp);
      var msg1 = "";
      var msg2 = "";
      $("#vv_name").text(r.name);
      $("#vv_exam_type").text(exam_type(r.exam_type));
      $("#vv_exam_sub").text(exam_subject(r.subject));
      $("#vv_school").text("โรงเรียน" + r.school);
      $("#vv_box").text(r.box_id);
      $("#vv_no_student").text(r.start_id + " - " + r.end_id);
      $("#vv_no_student_ex").text(r.extra1 + ", " + r.extra2);
      $("#vv_paper").text(
        parseInt(r.paper) + parseInt(r.paper_extra) + parseInt(r.paper_backup)
      );
      if (r.attend == "" || r.attend == null) {
        msg1 = "- ยังไม่ได้ Verify -";
      } else {
        msg1 = r.attend + " คน";
      }

      if (r.no_attend == "" || r.no_attend == null) {
        msg2 = "- ยังไม่ได้ Verify -";
      } else {
        msg2 = r.no_attend + " คน";
      }

      $("#vattend").text(msg1);
      $("#vno_attend").text(msg2);
    },
  });
}

function verify_data() {
  $.ajax({
    url: "/api/verify.php",
    method: "POST",
    data: {
      id: global_id_to_verify,
      attend: $("#attend").val(),
      no_attend: $("#no_attend").val(),
    },
    success: function (resp) {
      if (resp == 200) {
        swal("Verified!", "ตรวจสอบข้อมูลสำเร็จ", "success").then(() => {
          $("#v-app").modal("hide");
          getExamData();
        });
      }
    },
  });
}

function exam_type(type) {
  if (type == "1") {
    return "ONET";
  } else if (type == "2") {
    return "GAT/PAT";
  } else if (type == "3") {
    return "วิชาสามัญ";
  } else if (type == "4") {
    return "ทดสอบวิชาชีพครู";
  }
}

function exam_subject(sub) {
  if (sub == "g1") {
    return "GAT ตอนที่ 1";
  } else if (sub == "g2") {
    return "GAT ตอนที่ 2";
  } else if (sub == "p1") {
    return "PAT 1 ความถนัดทางคณิตศาสตร์";
  } else if (sub == "p2") {
    return "PAT 2 ความถนัดทางวิทยาศาสตร์";
  } else if (sub == "p3") {
    return "PAT 3 ความถนัดทางวิศวกรรมศาสตร์";
  } else if (sub == "p41") {
    return "PAT 4 (1) ความถนัดทางสถาปัตยกรรมศาสตร์";
  } else if (sub == "p42") {
    return "PAT 4 (2) ความถนัดทางสถาปัตยกรรมศาสตร์";
  } else if (sub == "p43") {
    return "PAT 4 (3) ความถนัดทางสถาปัตยกรรมศาสตร์";
  } else if (sub == "p5") {
    return "PAT 5 ความถนัดทางวิชาชีพครู";
  } else if (sub == "p6") {
    return "PAT 6 ความถนัดทางศิลปกรรมศาสตร์";
  } else if (sub == "p71") {
    return "PAT 7.1 ความถนัดทางภาษาฝรั่งเศส";
  } else if (sub == "p72") {
    return "PAT 7.2 ความถนัดทางภาษาเยอรมัน";
  } else if (sub == "p73") {
    return "PAT 7.3 ความถนัดทางภาษาญี่ปุ่น";
  } else if (sub == "p74") {
    return "PAT 7.4 ความถนัดทางภาษาจีน";
  } else if (sub == "p75") {
    return "PAT 7.5 ความถนัดทางภาษาอาหรับ";
  } else if (sub == "p76") {
    return "PAT 7.6 ความถนัดทางภาษาบาลี";
  } else if (sub == "p77") {
    return "PAT 7.7 ความถนัดทางภาษาเกาหลี";
  } else if (sub == "m1") {
    return "ชีววิทยา";
  } else if (sub == "m2") {
    return "ฟิสิกส์";
  } else if (sub == "m3") {
    return "ภาษาไทย";
  } else if (sub == "m4") {
    return "สังคมศึกษา";
  } else if (sub == "m5") {
    return "คณิตศาสตร์ 1";
  } else if (sub == "m6") {
    return "ภาษาอังกฤษ";
  } else if (sub == "m7") {
    return "เคมี";
  } else if (sub == "m8") {
    return "คณิตศาสตร์ 2";
  } else if (sub == "m9") {
    return "วิทยาศาสตร์ทั่วไป";
  } else if (sub == "o1") {
    return "ภาษาไทย";
  } else if (sub == "o2") {
    return "คณิตศาสตร์";
  } else if (sub == "o3") {
    return "วิทยาศาสตร์";
  } else if (sub == "o4") {
    return "ภาษาอังกฤษ";
  } else if (sub == "o5") {
    return "สังคมศึกษา ศาสนาและวัฒนธรรม";
  } else if (sub == "k1") {
    return "วิชาการใช้ภาษาไทยเพื่อการสื่อสาร";
  } else if (sub == "k2") {
    return "วิชาการใช้ภาษาอังกฤษเพื่อการสื่อสาร";
  } else if (sub == "k3") {
    return "วิชาการใช้เทคโนโลยีดิจิทัลเพื่อการสื่อสาร";
  } else if (sub == "k4") {
    return "วิชาชีพครู (ปรนัย)";
  } else if (sub == "k5") {
    return "วิชาชีพครู (อัตนัย)";
  }
}
