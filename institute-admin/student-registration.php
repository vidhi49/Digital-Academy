<?php include("../connect.php");
include("change-header.php");
$inst_id=$_SESSION['inst_id'];
    $inst_name=$_SESSION['name'];
?>
<html>

<head>
  <meta charset="utf-8">
  <title>Staff Emrolment</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="../js/jquery-3.1.1.min.js"></script>
  <script src="../js/student.js"></script>
  <script>
    function classDropdown(str) {
      if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
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
            document.getElementById("txtHint").innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET", "ajaxclass.php?name=" + str, true);
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
  </script>
</head>

<body>

  <body>
    <div class="container p-5 text-muted h6">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h1 mb-0 text-muted">Student Enrolment</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="institute-home.php">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Student Enrolment</li>
        </ol>
      </div>
      <?php
      $q="select max(Id) from student_tbl where Inst_id='$inst_id'";
      $res=mysqli_query($con,$q);
      ?>
      <form method="post" enctype="multipart/form-data">
        <div class="card mb-4 " style='box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;'>
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h4 class="m-0 font-weight-bold text-primary">Personal Details</h4>
            <div class="breadcrumb">
              
              GR No:<?php echo "GR".date("Ymd")?>
            </div>
          </div>
          <div class="card-body py-3">

            <div class="form-group">
              <div class="row ">
                <div class="col-sm-4 col-lg-4">
                  <label class="form-control-label ml-2 p-1">Name:<span class="text-danger">*</span></label>
                  <input type="text" class="form-control form-control-lg m-1" id="name" name="name" placeholder="First Name/Surname" required>
                </div>
                <div class="col-sm-4 col-lg-4">
                  <label class="form-control-label ml-2 p-1">Father Name:<span class="text-danger">*</span></label>
                  <input type="text" class="form-control form-control-lg m-1" id="fname" name="fname" placeholder="First Name/Surname" required>
                </div>
                <div class="col-sm-4 col-lg-4">
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
                  
                   <select required  name="s" id="s"  class="form-control form-control-lg m-1">
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
                $qry = "SELECT DISTINCT Name FROM class_tbl ORDER BY Name ASC";
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
                if (isset($Id)) {
                  $q = "SELECT * FROM class_tbl where Id='$Id'";
                  $res = mysqli_query($con, $q);
                  $res1 = mysqli_fetch_array($res);
                  $qry = "SELECT  * FROM class_tbl where Name='$res1[2]' ORDER BY Section ASC";
                  $result = $con->query($qry);
                  $num = $result->num_rows;
                  if ($num > 0) {
                    echo ' <select required name="section" id="txtHint"  class="form-control form-control-lg m-1">';

                    while ($rows = $result->fetch_assoc()) {
                      echo '<option ' . (($res1['Section'] == $rows['Section']) ? 'selected="selected"' : "") . '  value="' . $rows['Section'] . '" >' . $rows['Section'] . '</option>';
                    }
                    echo '</select>';
                  }
                } else {
                  echo ' <select required  name="section" id="txtHint"  class="form-control form-control-lg m-1">';
                  echo "<option value=''>--Select Section--</option>";
                  echo "</select>";
                }
                ?>

              </div>
            </div>
            <div class="row">
              <div class="col">
               
                <label class="form-label p-1 ml-2">Academic Year:<span class="text-danger">*</span></label>
                <input class="form-control form-control-lg m-1" type="text" id="aca_year" value= "<?php echo date("Y")-1 ."-". date("Y"); ?>" name="aca_year" readonly required>

              </div>
              <div class="col">

                <label class="form-label p-1 ml-2">Upload Photo:<span class="text-danger">*</span></label>
                <input class="form-control form-control-lg m-1" type="file" id="photo" name="photo" required>

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
  </body>
</body>
<?php

if(isset($_POST['submit']))
{
  
  $sname=$_POST['name'];
  $fname=$_POST['fname'];
  $mname=$_POST['mname'];
  $gender=$_POST['gender'];
  $dob=$_POST['dob'];
  $cno=$_POST['cno'];
  $email=$_POST['email'];
  $bloodgroup=$_POST['bloodgroup'];
  $address=$_POST['address'];
  $country=$_POST['country'];
  $state=$_POST['s'];
  $class=$_POST['class'];
  $section=$_POST['section'];
  $aca_year=$_POST['aca_year'];
  $imgname=$_FILES['photo']['name'];
  $imgsize=$_FILES['photo']['size'];
  $tmpname=$_FILES['photo']['tmp_name'];

  //img validation
  $validImageExtension=['jpg','jpeg','png'];
  $imageExtension=explode('.',$imgname);
  $imageExtension=strtolower(end($imageExtension));
  if(!in_array($imageExtension,$validImageExtension))
  {
    echo "<script>
        alert('Invalid Image Extension');
        </script>
    ";
  }
  elseif($imgsize>12000000){
    echo "
      <script>alert('Image Size is Too Large');</script>
    ";
  }
  else{
    $newimgname="abc".date("Y.m.d");
    $newimgname .=".".$imageExtension;
    echo "$newimgname";
  }

  $q="insert into student_tbl values(null,'','$inst_id','$inst_name','$sname','$fname','$mname')";

}
?>