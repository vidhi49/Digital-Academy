<?php include("../connect.php");
// session_start();
// include("../admin/admin-header.php");
include("../institute-admin/change-header.php");
// include("../institute-admin/institute-header.php");
$a = "generateidcard";
$insti_id = $_SESSION['inst_id'];
?>
<script>
function printDiv(divName) {
  var printContents = document.getElementById(divName).innerHTML;
  var originalContents = document.body.innerHTML;

  document.body.innerHTML = printContents;

  window.print();

  document.body.innerHTML = originalContents;
}
</script>

<body>
  <?php
  // include("institute-sidebar.php");
  ?>
  <div class="">
    <button onclick="window.print('printableArea')">Print</button>
    <div id="printableArea">
      <?php
      $cid = $_GET['cid'];
      $sec = $_GET['sec'];
      $q = "select * from student_tbl where Inst_id='$insti_id' and Class='$cid' and Section='$sec'";
      // echo $q;
      $res = mysqli_query($con, $q);
      $n = mysqli_num_rows($res);


      $q2 = "select * from institute_tbl where Id='$insti_id'";
      $res1 = mysqli_query($con, $q2);
      $r1 = mysqli_fetch_array($res1);
      if ($n > 0) {
        while ($r = mysqli_fetch_array($res)) {

      ?>

      <div class="row mt-5  d-flex justify-content-center">
        <div class="text-center navy-blue fw-bold mt-3  mb-0 fs-3"><?php echo $r1[2]; ?>
        </div>
        <div class="d-flex justify-content-center text-muted ">
          <?php echo "$r1[4] , $r1[5] , $r1[6]";
              echo "<p class='ms-5 fw-bold navy-blue'>GR No : $r[1]</p>"; ?> </div>

        <div class="col-sm-6 d-flex justify-content-end">
          <img src="student_profile/<?php echo $r[17] ?>" class="w-25 mt-3 mb-2 h-75 img" />
        </div>
        <div class="col-sm-6">
          <div class="mt-3"> Name : <span> <?php echo $r[3]; ?></span></div>
          <div> Class : <span><?php echo $cid; ?></span></div>
          <div> Div : <span><?php echo $sec; ?></span></div>
          <div> Address : <span><?php echo $r[10]; ?></span></div>
          <div> Email : <span><?php echo $r[9]; ?></span></div>
          <div> Contact : <span><?php echo $r[8]; ?></span></div>
          <div> Birth Date : <?php echo $r[7]; ?></div>

        </div>
        <?php echo "<p class='text-center navy-blue fw-normal '>Ph : $r1[8]</p>"; ?>
      </div>

      <?php
        }
      } ?>

    </div>
  </div>
</body>