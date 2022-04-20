<?php
include('../connect.php');
include('student-header.php');
$inst_id = $_SESSION['Inst_id'];
$Id = $_SESSION['Id'];
$cid = $_GET['cid'];
$subid = $_GET['sid'];
$page='material';
?>

<body>
  <div class="d-flex">
    <?php include("student-sidebar.php"); ?>
    <div class="student-content mt-5 ">
      <div class="row mt-5">
        <?php
        $q = "select * from upload_tbl where Inst_id='$inst_id' and Class_id='$cid' and Subject_Id='$subid'";
        // echo $q;
        $res = mysqli_query($con, $q);
        $num = mysqli_num_rows($res);
        if ($num > 0) {

          while ($row = mysqli_fetch_array($res)) {

            echo '<div class="col-sm-4 m-2">
                    <a href="material_upload/' . $row[1] . '" target="_blank" >
                      <div class="d-flex align-items-center bg-white  text-black" style="border-radius: 20px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;"  >
                          <i class="fa fa-file-pdf  text-danger fs-2 m-3" aria-hidden="true"></i>
                          <div class="text-wrap fs-5 text-center" >
                              <p class=" m-2 p-3"> ' . $row[1] . '</p>
                          </div>
                      </div>
                    </a>
                  </div>';
          }
        } else {
          echo "no records";
        }
        ?>

      </div>
    </div>
  </div>

</body>