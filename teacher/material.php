<?php
include('../connect.php');
include('../teacher/teacher-header.php');
$inst_id = $_SESSION['Inst_id'];
$id = $_SESSION['Id'];
?>
<style>
@media (max-width: 500px) {
  .card-body {
    padding: 1px !important;
    font-size: x-small;
  }
}
</style>

<body>
  <div class="d-flex">
    <?php require("teacher-sidebar.php"); ?>
    <div class="content">
      <div class="row mt-5  d-flex justify-content-center  align-items-center">
        <?php
        $q = "select DISTINCT(Class_id) from teacher_wise_subject_tbl where  Teacher_id='$id' and Inst_id='$inst_id'";
        $res = mysqli_query($con, $q);
        // echo $q;
        $nor = mysqli_num_rows($res);
        while ($r = mysqli_fetch_array($res)) {
          $c = "select * from class_tbl where Id='$r[0]' and Insti_id='$inst_id'";
          // echo $c;
          $res1 = mysqli_query($con, $c);
          $rs = mysqli_fetch_array($res1);
        ?>

        <div class="col-sm-4">
          <?php echo "<a href='classwiseSub.php?cid=$rs[0]'>"; ?>
          <div class="card shadow bg-white p-2" style="border-radius: 20px;" onclick="showsubject();">
            <div class="card-body p-5">
              <div class="row">
                <div class="col-6">
                  <h2 class="text-black font-w700">
                    <?php echo $rs[2] . "-" . $rs[7]; ?>
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
        // echo $q; 
        ?>
      </div>
    </div>
  </div>
</body>