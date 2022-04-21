<?php include("../connect.php");
// session_start();
// include("../admin/admin-header.php");
include("../institute-admin/change-header.php");
// include("../institute-admin/institute-header.php");
$a = "generateidcard";
$insti_id = $_SESSION['inst_id'];
?>

<style>
@media print {

  /* All your print styles go here */
  .printbtn {
    display: none !important;
  }
}
</style>

<body>
  <div class="d-flex">
    <?php
    include("institute-sidebar.php");
    ?>
    <div class="institute-content">
      <button class="printbtn" onclick="window.print()">Print</button>
      <div id="printableArea" style="display:flex;flex-wrap:wrap;">
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
        <div style="width: 40%;margin:5%;">
          <div class="bg-white " style="padding:10px;border: 1px dashed;">
            <small class='navy-blue fw-normal float-right' style="padding-right:5px;">
              <?php echo "Ph : $r1[8]"; ?></small>

            <div class="text-center navy-blue fw-bold mt-3  mb-0 fs-3" style="clear: both;"><?php echo $r1[2]; ?>
            </div>
            <p class="text-center text-muted " style="border-top: 1px solid;border-bottom:1px solid">
              <?php echo "$r1[4] , $r1[5] , $r1[6]";
                  echo "<span class='ms-5 fw-bold navy-blue'>GR No : $r[1]</span>"; ?>
            </p>
            <div style="display: flex;align-items: start;justify-content: start">
              <div style="width: 30%;">
                <img src="student_profile/<?php echo $r[17] ?>" style="width: 100px;margin:15px;" />
              </div>
              <div style="width: 70%;padding-left:20px;">
                <div> Name : <span> <?php echo $r[3]; ?></span></div>
                <div> Class : <span><?php echo $cid; ?></span></div>
                <div> Div : <span><?php echo $sec; ?></span></div>
                <div> Address : <span><?php echo $r[10]; ?></span></div>
                <div> Email : <span><?php echo $r[9]; ?></span></div>
                <div> Contact : <span><?php echo $r[8]; ?></span></div>
                <div> Birth Date : <?php echo $r[7]; ?></div>

              </div>
            </div>
          </div>
        </div>
        <?php
          }
        } ?>

      </div>
    </div>
  </div>
</body>