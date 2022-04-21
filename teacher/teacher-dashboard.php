<?php
include('../connect.php');
include('../teacher/teacher-header.php');
$p = "select * from teacher_tbl where Id='$Id' and Inst_id='$inst_id'";
$r = mysqli_query($con, $p);
$row = mysqli_fetch_array($r);
?>
<html>

<body>
  <div class="d-flex">
    <?php include("teacher-sidebar.php"); ?>
    <div class="content mt-5 p-3">
      <div class="d-flex justify-content-center">
        teacher home
      </div>
    </div>
  </div>
  <!-- <?php include("../guest/footer.php"); ?> -->
</body>

</html>