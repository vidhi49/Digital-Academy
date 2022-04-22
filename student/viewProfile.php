<?php
include('../connect.php');
include('student-header.php');
$inst_id = $_SESSION['Inst_id'];
$id=$_SESSION['Id'];
$page = 'viewProfile';
?>
<html>

<body>
  <div class="d-flex">
    <?php include("student-sidebar.php"); ?>
    <div class="content mt-5 " >
      <div class="d-flex justify-content-center align-items-center"> 
        <div class="card shadow p-5 w-70" style="border-radius:30px; background-image: url(../img/bg3.jpg); background-size: cover;">
          <div class="d-flex pt-5">
            <?php 
            
            // $q1 = mysqli_query($con, "select * from student_tbl where Inst_id='$inst_id'");
            // $res = mysqli_fetch_array($q1);    
            // echo $res['Id'];
            $q = "select * from student_tbl where Inst_id='$inst_id' and Id='$id'";
            $res = mysqli_query($con, $q);
            while ($r = mysqli_fetch_array($res)) {
            ?>
            <img src="../institute-admin/student_profile/<?php echo $r[17]?>" class="img m-4" style="height:300px;width:300px;border-radius: 150px;" />
            <div class="p-2 m-5 d-block" style="height: 100;">
            <div class="d-flex justified-content-center">
                <h6 class="navy-blue fw-bold fs-5"> Grno : </h6>
                <p>&nbsp;<?php echo $r[1]; ?></p>
              </div>
              <div class="d-flex justified-content-center">
                <h6 class="navy-blue fw-bold fs-5">  Name :  </h6>
               <p>&nbsp;<?php echo $r[3]; ?></p>
              </div>             
              <div class="d-flex justified-content-center">
                <h6 class="navy-blue fw-bold fs-5"> Address : </h6>
                <p>&nbsp;<?php echo $r[10]; echo ','; echo $r[11];  echo ',';echo $r[12];?></p>
              </div>
              <div class="d-flex justified-content-center">
                <h6 class="navy-blue  fw-bold fs-5"> Gender : </h6>
                <p>&nbsp;<?php echo $r[6]; ?></p>
              </div>
              <div class="d-flex justified-content-center">
                <h6 class="navy-blue fw-bold fs-5"> Contact : </h6>
                <p>&nbsp;<?php echo $r[8]; ?></p>
              </div>
              <div class="d-flex justified-content-center">
                <h6 class="navy-blue fw-bold fs-5"> Dob : </h6>
                <p>&nbsp;<?php echo $r[7]; ?></p>
              </div >
              <div class="d-flex justified-content-center">
                <h6 class="navy-blue  fw-bold fs-5"> Email : </h6>
                <p>&nbsp;<?php echo $r[9]; ?></p>
              </div>
              <div class="d-flex justified-content-center">
                <h6 class="navy-blue fw-bold fs-5"> Bloodgroup : </h6>
                <p>&nbsp;<?php echo $r[17]; ?></p>
              </div>
              <div class="d-flex justified-content-center">
                <h6 class="navy-blue fw-bold fs-5"> Class : </h6>
                <p>&nbsp;<?php echo $r[13]; ?></p>
              </div>
              <div class="d-flex justified-content-center">
                <h6 class="navy-blue fw-bold fs-5"> Section : </h6>
                <p>&nbsp;<?php echo $r[14]; ?></p>
              </div>
              
              
            </div>

            <?php
            }
            ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</body