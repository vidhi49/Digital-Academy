<?php include("../connect.php");
// session_start();
include("change-header.php");
$inst_id = $_SESSION['inst_id'];
$inst_name = $_SESSION['name'];
$a = "studentregister";
?>
<html>

<head>
  <meta charset="utf-8">
  <title>Staff Emrolment</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

  <script src="../js/jquery-3.1.1.min.js"></script>
  <!-- <script src="../js/student.js"></script> -->
  <script src="../css/style.css"></script>
  <script>
    Filevalidation = () => {
      const fi = document.getElementById('file');
      var filePath = fi.value;
      var allowedExtensions =
        /(\.jpg|\.jpeg|\.png|\.gif)$/i;
      if (!allowedExtensions.exec(filePath)) {
        // alert('Invalid file type');
        $("#filemessage").html('Photo Must be jpg/jpeg/png/gif').css('color', 'red');
        // fi.value = '';
        return false;
      } else {
        // $("#filemessage").html('');
        if (fi.files.length > 0) {
          for (const i = 0; i <= fi.files.length - 1; i++) {

            const fsize = fi.files.item(i).size;
            const file = Math.round((fsize / 1024));
            if (file > 200) {
              $("#filemessage").html('File Must be less then 200kb').css('color', 'red');
              return false;
            } else {

              $("#filemessage").html('');

              return false;
            }
          }
        }
      }
    }

    function classDropdown(str) {
      if (str == "") {
        document.getElementById("section").innerHTML = "";
        return;
      } else {
        if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp = new XMLHttpRequest();
        } else {
          // code for IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("section").innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET", "ajaxSection.php?name=" + str, true);
        xmlhttp.send();
      }
    }

    function selectstate(str) {
      if (str == "") {
        document.getElementById("s").innerHTML = "";
        return;
      } else {
        if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp = new XMLHttpRequest();
        } else {
          // code for IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("s").innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET", "ajaxState.php?name=" + str, true);
        xmlhttp.send();
      }
    }

    $(document).ready(function() {

      var e_Reg = /^([a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/;
      var c_Reg = /^[0-9]+$/;

      $("#submit").click(function() {

        
          if ($('#emsg').text() != "") {
            alert($('#emsg').text());
            $("#e").focus();
            return false;

          }
        

        if (c_Reg.test($('#cno').val()) == false) {
          alert('Please Fill Cnotact Number with digit only...');
          $("#cno").focus();
          return false;
        } else if ($('#cno').val().length != 10) {
          alert('Please Fill 10 digit number...');
          $("#cno").focus();
          return false;
        }

        if ($('#file').val() != "") {

          const fi = document.getElementById('file');
          var filePath = fi.value;
          var allowedExtensions =
            /(\.jpg|\.jpeg|\.png|\.gif)$/i;
          if (!allowedExtensions.exec(filePath)) {
            alert('Photo Must be jpg/jpeg/png/gif');
            // $("#filemessage").html('File must be jpg').css('color', 'red');
            // alert('hello');
            // fi.value = '';
            $("#file").focus();
            return false;
          } else {
            // $("#filemessage").html('');
            if (fi.files.length > 0) {
              for (const i = 0; i <= fi.files.length - 1; i++) {

                const fsize = fi.files.item(i).size;
                const file = Math.round((fsize / 1024));
                if (file > 200) {
                  alert('size');
                  $("#file").focus();
                  // $("#filemessage").html('File Must be less then 200kb').css('color', 'red');
                  return false;
                } else {

                }
              }
            }
          }
        }
        if ($('#section').val() != '') {
          if ($('#elimit').text() != "") {
            alert($('#elimit').text());
            $("#section").focus();
            return false;
          }

        }

      });

      $('#e, #cno').on('keyup', function() {
        if (e_Reg.test($('#e').val()) == false) {
          $('#emsg').html('Please Fill Email in abc@xyz.com').css('color', 'red');
        } else {
          $.ajax({
            type: 'POST',
            url: 'studentemail.php',
            data: "check=check&e=" + $('#e').val(),
            success: function(response) {
              $('#emsg').html(response).css('color', 'red');
            }
          });

        }

        if (c_Reg.test($('#cno').val()) == false) {
          $('#cmessage').html('Contact Must be of digit only').css('color', 'red');
        } else if ($('#cno').val().length != 10) {
          $('#cmessage').html(' Please enter 10 digit').css('color', 'red');

        } else {
          $('#cmessage').html('');
        }


      });
      $('#section').change(function() {

        $.ajax({
          type: 'POST',
          url: 'ajaxStudentcount.php',
          data: "classid=" + $('#section').val(),
          success: function(response) {
            var result = response;
            // $('#elimit').html(response).css('color', 'red');
            $('#elimit').html(result).css('color', 'red');
          }
        });

      });

    });
  </script>
</head>

<body>

  <body>
    <div class="d-flex">
      <?php include("institute-sidebar.php"); ?>
      <div class=" institute-content p-5 text-muted h6">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h1 mb-0 text-muted">Student Enrolment</h1>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="institute-home.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Student Enrolment</li>
          </ol>
        </div>

        <form method="post" enctype="multipart/form-data">
          <div class="card mb-4 " style='box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;'>
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h4 class="m-0 font-weight-bold text-primary">Personal Details</h4>
              <div class="breadcrumb">
                <?php
                $q = "select * from student_tbl where Inst_id='$inst_id'";
                $res = mysqli_query($con, $q);
                $nor = mysqli_num_rows($res);
                // echo $res[0];
                if ($nor == 0) {
                  $gr = 1;
                } else {
                  $q1 = "select MAX(Grno) from student_tbl where Inst_id='$inst_id'";
                  $res1 = mysqli_query($con, $q1);
                  $result = mysqli_fetch_array($res1);
                  $gr = $result[0] + 1;
                }
                ?>
                GR No:<?php echo  $gr ?>

              </div>

            </div>
            <div class="card-body py-3">

              <div class="form-group">
                <div class="row ">
                  <div class="col-sm-3 col-lg-3">
                    <label class="form-control-label ml-2 p-1">Name:<span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-lg m-1" id="name" name="name" placeholder="First Name" required>
                  </div>
                  <div class="col-sm-3 col-lg-3">
                    <label class="form-control-label ml-2 p-1">Surname:<span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-lg m-1" id="surname" name="surname" placeholder="Surname" required>
                  </div>
                  <div class="col-sm-3 col-lg-3">
                    <label class="form-control-label ml-2 p-1">Father Name:<span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-lg m-1" id="fname" name="fname" placeholder="First Name/Surname" required>
                  </div>
                  <div class="col-sm-3 col-lg-3">
                    <label class="form-control-label ml-2 p-1">Mother Name:<span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-lg m-1" id="mname" name="mname" placeholder="First Name/Surname" required>
                  </div>
                </div>
                <div class="row ">
                  <div class="col">
                    <label class="form-label ml-2 p-1" for="city"> Gender : <span class="text-danger">*</span></label>
                    <select class="form-control form-control-lg m-1" name="gender" required>
                      <option value="" disabled selected> Choose... </option>
                      <option value="Male"> Male </option>
                      <option value="Female"> Female </option>
                      <option value="Other"> Other </option>
                    </select>
                  </div>
                  <div class=" col ">
                    <label class="form-label ml-2 p-1">DOB[Date of birth]:<span class="text-danger">*</span></label>
                    <input class="form-control form-control-lg m-1" type="date" id="dob" name="dob" required>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-4 col-lg-4">
                    <label class="form-label ml-2 p-1">Phone No.:<span class="text-danger">*</span></label>
                    <input class="form-control form-control-lg m-1" type="tel" maxlength="10" id="cno" name="cno" placeholder="Enter your phone number" required>
                    <span id="cmessage"></span>
                  </div>
                  <div class="col-sm-4 col-lg-4">
                    <label class="form-control-label ml-2 p-1">Email:<span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-lg m-1" id="e" name="email" placeholder="abc@xyz.com" required>
                    <span id="emsg"></span>
                  </div>
                  <div class="col">
                    <label class="form-label ml-2 p-1">Blood Group:<span class="text-danger">*</span></label>
                    <select class="form-control form-control-lg m-1" name="bloodgroup" required>
                      <option value="" disabled selected> Choose... </option>
                      <option> A+ </option>
                      <option> A- </option>
                      <option> AB+ </option>
                      <option> AB+ </option>
                      <option> B- </option>
                      <option> B+ </option>
                      <option> O+ </option>
                      <option> O- </option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col form-outline">
                    <label class="form-label ml-2 p-1">Address:<span class="text-danger">*</span></label>
                    <textarea cols='20' id="address" required rows="2" class="form-control form-control-lg m-1" name="address"></textarea>
                  </div>

                </div>
                <div class="row ">
                  <div class="col">
                    <label class="form-label ml-2 p-1" for="city"> Country : <span class="text-danger">*</span></label>
                    <select required name="country" onchange="selectstate(this.value)" class="form-control form-control-lg m-1">
                      <option value="">--Select Class--</option>

                      <option value="India"> India </option>

                    </select>
                  </div>
                  <div class=" col ">
                    <label class="form-label ml-2 p-1">State:<span class="text-danger">*</span></label>

                    <select required name="s" id="s" class="form-control form-control-lg m-1">
                      <option value=''>--Select Section--</option>
                    </select>
                  </div>
                </div>
              </div>

            </div>
          </div>


          <div class="card mb-4" style='box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;'>
            <div class="card-header py-4 d-flex flex-row align-items-center justify-content-between">
              <h4 class="m-0 font-weight-bold text-primary">Acedemic Details:</h4>

            </div>
            <div class="card-body ">
              <div class="row">
                <div class="col-xl-6">
                  <label class="form-control-label">Select Class<span class="text-danger ml-2">*</span></label>
                  <?php
                  $qry = "SELECT DISTINCT Name FROM class_tbl Where Insti_id='$inst_id' ORDER BY Name ASC";
                  $result = $con->query($qry);
                  $num = $result->num_rows;
                  if ($num > 0) {
                    echo ' <select required name="class" onchange="classDropdown(this.value)" class="form-control form-control-lg m-1">';
                    echo '<option value="">--Select Class--</option>';
                    while ($rows = $result->fetch_assoc()) {
                      echo '<option ' . (($row['Name'] == $rows['Name']) ? 'selected="selected"' : "") . ' value="' . $rows['Name'] . '" >' . $rows['Name'] . '</option>';
                    }
                    echo '</select>';
                  }
                  ?>
                </div>
                <div class="col-xl-6" id="hello">
                  <label class="form-control-label">Class Section<span class="text-danger ml-2">*</span></label>
                  <?php
                  // if (isset($Id)) {
                  //   $q = "SELECT * FROM class_tbl where Id='$Id' AND Insti_id='$inst_id'";
                  //   $res = mysqli_query($con, $q);
                  //   $res1 = mysqli_fetch_array($res);
                  //   $qry = "SELECT  * FROM class_tbl where Name='$res1[2]' AND  Insti_id='$inst_id' ORDER BY Section ASC";
                  //   $result = $con->query($qry);
                  //   $num = $result->num_rows;
                  //   if ($num > 0) {
                  //     echo ' <select required name="section" id="section"  class="form-control form-control-lg m-1">';

                  //     while ($rows = $result->fetch_assoc()) {
                  //       echo '<option ' . (($res1['Section'] == $rows['Section']) ? 'selected="selected"' : "") . '  value="' . $rows['Section'] . '" >' . $rows['Section'] . '</option>';
                  //     }
                  //     echo '</select>';
                  //     echo '<p id="elimit"></p>';
                  //   }
                  // } else {
                    echo ' <select required  name="section" id="section"  class="form-control form-control-lg m-1">';
                    echo "<option value=''>--Select Section--</option>";
                    echo "</select>";
                    echo '<p id="elimit"></p>';
                  // }
                  ?>

                </div>
              </div>
              <!--row-->
              <div class="row">
                <div class="col">

                  <label class="form-label p-1 ml-2">Academic Year:<span class="text-danger">*</span></label>
                  <input class="form-control form-control-lg m-1" type="text" id="aca_year" value="<?php echo date("Y") - 1 . "-" . date("Y"); ?>" name="aca_year" readonly required>

                </div>
                <div class="col">

                  <label class="form-label p-1 ml-2">Upload Photo:<span class="text-danger">*</span></label>
                  <input class="form-control form-control-lg m-1" type="file" id="file" onchange="Filevalidation()" name="photo" required>
                  <span id="filemessage"></span>
                </div>
              </div>

              <div class="row py-3">

                <div class="col">
                  <input type="submit" name="submit" id="submit" class="btn  btn-primary">
                </div>
              </div>
            </div>
          </div>
      </div>
      </form>
    </div>

  </body>
</body>
<?php

if (isset($_POST['submit'])) {

  $sname = $_POST['name'];
  $surname = $_POST['surname'];
  $fname = $_POST['fname'];
  $mname = $_POST['mname'];
  $gender = $_POST['gender'];
  $dob = $_POST['dob'];
  $cno = $_POST['cno'];
  $email = $_POST['email'];
  $bloodgroup = $_POST['bloodgroup'];
  $address = $_POST['address'];
  $country = $_POST['country'];
  $state = $_POST['s'];
  $class = $_POST['class'];
  $classid = $_POST['section'];
  $aca_year = $_POST['aca_year'];
  $imgname = $_FILES['photo']['name'];
  $tmpname = $_FILES['photo']['tmp_name'];
  $generator = "ABCDEFGHIJKLMNOPQRSTUVWXYZqwertyuiopasdfghjklzxcvbnm1234567890!@#$%^&*()_+-=,./;'[]\<>?:{}|";
  $password = substr(str_shuffle($generator), 0, 8);
  $pass_hash = password_hash($password, PASSWORD_DEFAULT);


  $imageExtension = explode('.', $imgname);
  $imageExtension = strtolower(end($imageExtension));

  $newimgname = $inst_id . $gr;
  $newimgname .= "." . $imageExtension;
  $query = mysqli_query($con, "select * from class_tbl where Id='$classid' and Insti_id='$inst_id'");
  $re = mysqli_fetch_array($query);
  $section = $re['Section'];
  $studname = $sname . " " . $surname;
  $q = "insert into student_tbl values(null,'$gr','$inst_id','$studname','$fname','$mname','$gender','$dob','$cno','$email',
  '$address','$country','$state','$class','$section','$classid','$bloodgroup','$newimgname','" . date("Y-m-d") . "','$aca_year','$pass_hash')";
  // echo $q;
  $q2 = "insert into class_wise_student values(null,'$classid','$class','$section','$studname','','$gender','$gr','$inst_id')";
  $res2 = mysqli_query($con, $q2);
  require 'sendstudentemail.php';
  $res = mysqli_query($con, $q);

  if ($res) {
    move_uploaded_file($tmpname, "student_profile/" . $newimgname);
    echo "<script> Swal.fire(
      'Registered',
      'Enrolled Successfully',
      'success'
    )</script>";
  } else {
    die("<center><h1>Query Failed" . mysqli_error($con) . "</h1></center>");
  }
}
?>