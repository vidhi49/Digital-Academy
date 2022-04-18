<?php
include('../connect.php');
include('../teacher/teacher-header.php');
$inst_id = $_SESSION['Inst_id'];
$id = $_SESSION['Id'];
$cid = $_GET['cid'];
$sid = $_GET['sid'];
?>

<body>
  <div class="d-flex">
    <?php require("teacher-sidebar.php"); ?>
    <div class="content">
      <div class="row m-5">
        <form method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-6">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupFileAddon01">Upload Material</span>
                </div>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="inputGroupFile01"
                    aria-describedby="inputGroupFileAddon01" name='matrialfile'>
                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <input type='submit' class="btn bg-navy-blue text-white" value="Upload" name="uploadMaterial">
            </div>
          </div>
        </form>
      </div>
      <div class="row  mt-5">

        <!-- <div class="col-sm-4">
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
        </div> -->
      </div>
    </div>
    <?php
    if (isset($_POST['uploadMaterial'])) {
      // echo "hi";
      $f = $_FILES['matrialfile']['name'];
      $floc = $_FILES['logo']['tmp_name'];
      $extension = pathinfo($f, PATHINFO_EXTENSION);
    }
    ?>

</body>