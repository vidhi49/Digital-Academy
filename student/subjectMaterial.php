<?php
include('../connect.php');
include('student-header.php');
$inst_id = $_SESSION['Inst_id'];
$Id = $_SESSION['Id'];


?>
<html>
<style>
a,
a:hover,
a:focus {
  color: white;
}
</style>

<body>
  <div class="d-flex">
    <?php require("student-sidebar.php"); ?>
    <div class="student-content">
      <div class="row mt-5  d-flex justify-content-center  align-items-center">
        <?php
        $q = "select * from student_tbl where  Id='$Id' and Inst_id='$inst_id'";
        $res = mysqli_query($con, $q);
        // echo $q;
        $nor = mysqli_num_rows($res);
        while ($r = mysqli_fetch_array($res)) {
          $q6 = "select * from class_tbl where Insti_id='$inst_id' and Id='$r[15]'";
          // echo $q6;
          $resc = mysqli_query($con, $q6);
          $rs3 = mysqli_fetch_array($resc);

          $q2 = "select * from class_tbl where Insti_id='$inst_id' and Name='$rs3[2]' and Section='A'";
          // echo $q2;
          $res2 = mysqli_query($con, $q2);
          $rs2 = mysqli_fetch_array($res2);


          $c = "select * from subject_tbl where Class_id='$rs2[0]' and Inst_id='$inst_id'";
          // echo $c;
          $res1 = mysqli_query($con, $c);
          while ($rs = mysqli_fetch_array($res1)) {
        ?>

        <div class="col-sm-4">
          <?php echo "<a href='studmaterialList.php?cid=$r[15]&sid=$rs[0]' >"; ?>
          <div class="card shadow bg-white p-2" style="border-radius: 20px;">
            <div class=" card-body p-5">
              <div class="row">
                <div class="col-6">
                  <h2 class="text-black font-w700">
                    <?php echo $rs[3]; ?>
                  </h2>
                </div>
                <div class="col-6 d-flex justify-content-end">
                  <li class="fa fa-bookmark fs-1 ms-5 text-dark"></li>
                </div>
              </div>
            </div>
          </div>
          </a>
        </div>
        <?php
          }
        }
        // echo $q; 
        ?>
      </div>
    </div>
  </div>
</body>

</html>