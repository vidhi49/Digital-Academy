<?php
include('../connect.php');
include('teacher-header.php');
$Inst_id = $_SESSION['Inst_id'];
$page = 'instituteinfo';
?>
<html>

<body>
  <div class="d-flex">
    <?php include("teacher-sidebar.php"); ?>
    <div class="content mt-5 " >
      <div class="d-flex justify-content-center align-items-center"> 
        <div class="card shadow p-5 w-70" style="border-radius:20px; background-image: url(../img/bg3.jpg); background-size: cover;">
          <div class="d-flex">
            <?php 
            
            $q1 = mysqli_query($con, "select * from staff_tbl where Inst_id='$inst_id'");
            $res = mysqli_fetch_array($q1);    
            // echo $res['Id'];
            $q = "select * from staff_tbl where Inst_id='$Inst_id' and Id='$res[0]'";
            $res = mysqli_query($con, $q);
            while ($r = mysqli_fetch_array($res)) {
            ?>
            <img src="../institute-admin/staff_profile/<?php echo $r[16]?>" class="img m-4" style="height:300px;width:300px;border-radius: 140px;" />
            <div class="p-2 m-5 d-block" style="height: 100;">
              <div class="d-flex justified-content-center">
                <h6 class="navy-blue fw-bold fs-5">  Name :  </h6>
               <p>&nbsp;<?php echo $r[2]; ?></p>
              </div>
              <div class="d-flex justified-content-center">
                <h6 class="navy-blue  fw-bold fs-5"> Email : </h6>
                <p>&nbsp;<?php echo $r[4]; ?></p>
              </div>
              <div class="d-flex justified-content-center">
                <h6 class="navy-blue fw-bold fs-5"> Address : </h6>
                <p>&nbsp;<?php echo $r[6]; echo ','; echo $r[7];  echo ',';echo $r[8];?></p>
              </div>
              <div class="d-flex justified-content-center">
                <h6 class="navy-blue fw-bold fs-5"> Gender : </h6>
                <p>&nbsp;<?php echo $r[3]; ?></p>
              </div>
              <div class="d-flex justified-content-center">
                <h6 class="navy-blue fw-bold fs-5"> Contact : </h6>
                <p>&nbsp;<?php echo $r[5]; ?></p>
              </div>
              <div class="d-flex justified-content-center">
                <h6 class="navy-blue fw-bold fs-5"> Dob : </h6>
                <p>&nbsp;<?php echo $r[9]; ?></p>
              </div >
              <div class="d-flex justified-content-center">
                <h6 class="navy-blue fw-bold fs-5"> Doj : </h6>
                <p>&nbsp;<?php echo $r[10]; ?></p>
              </div>
              <div class="d-flex justified-content-center">
                <h6 class="navy-blue fw-bold fs-5"> Bloodgroup : </h6>
                <p>&nbsp;<?php echo $r[17]; ?></p>
              </div>
              <div class="d-flex justified-content-center">
                <h6 class="navy-blue fw-bold fs-5"> Designation : </h6>
                <p>&nbsp;<?php echo $r[12]; ?></p>
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