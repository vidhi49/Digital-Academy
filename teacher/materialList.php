<?php
include('../connect.php');
include('../teacher/teacher-header.php');
$inst_id = $_SESSION['Inst_id'];
$id = $_SESSION['Id'];
$cid = $_GET['cid'];
$sid = $_GET['sid'];
$page = "";
?>
<script>
$(document).ready(function() {
  $("#uploadMaterial").click(function() {
    if ($('#materialmessage').text() != "") {
      alert($('#materialmessage').text());
      $("#materialfile").focus();
      return false;
    }
  });
});
validationMaterial = () => {
  const fi = document.getElementById('materialfile');
  var filePath = fi.value;
  var allowedExtensions =
    /(\.pdf)$/i;
  if (!allowedExtensions.exec(filePath)) {
    // alert('Invalid file type');
    $("#materialmessage").html('File Must be in Pdf Format').css('color', 'red');
    // fi.value = '';
    return false;
  } else {
    $("#materialmessage").html('');
    // if (fi.files.length > 0) {
    //   for (const i = 0; i <= fi.files.length - 1; i++) {

    //     const fsize = fi.files.item(i).size;
    //     const file = Math.round((fsize / 1024));
    //     if (file > 200) {
    //       $("#materialmessage").html('File Must be less then 200kb').css('color', 'red');
    //       return false;
    //     } else {

    //       $("#materialmessage").html('');

    //       return false;
    //     }
    //   }
    // }
  }
}
</script>

<body>
  <div class="d-flex">
    <?php require("teacher-sidebar.php"); ?>
    <div class="content">
      <div class="row m-5">
        <form method="post" enctype="multipart/form-data">
          <div class="row mb-4 fs-1">
            <span>Upload Materials</span>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <input type='file' id="materialfile" required name="materialfile" onchange="validationMaterial()"
                class="form-control form-control-lg " />
              <span id="materialmessage"></span>
              <!-- <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupFileAddon01">Upload Material</span>
                </div>
                <div class="custom-file">
                  <input type="file" id="inputGroupFile01" name='matrialfile'>
                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
              </div> -->
            </div>
            <div class="col-sm-6">
              <input type='submit' class="btn btn-lg bg-navy-blue text-white" value="Upload" id="uploadMaterial"
                name="uploadMaterial">
            </div>
          </div>
        </form>
      </div>
      <div class="row  mt-5">
        <?php
        $q = "select * from upload_tbl where Inst_id='$inst_id' and Class_id='$cid' and Subject_id='$sid'";
        $res = mysqli_query($con, $q);
        $num = mysqli_num_rows($res);
        if ($num > 0) {
          while ($row = mysqli_fetch_array($res)) {
            $x = $inst_id . $cid . $sid . $row[0];
            $len = strlen($x);
            $name = substr($row[1], $len);
            echo '<div class="col-sm-4 m-2">
                    <a href="material_upload/' . $row[1] . '" target="_blank" >
                      <div class="d-flex align-items-center bg-white  text-black" style="border-radius: 20px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;"  >
                        <i class="fa fa-file-pdf  text-danger fs-2 m-3" aria-hidden="true"></i>
                        <div class="text-wrap fs-5 " >
                          <p class=" m-2 p-3 text-black"> ' . $name .  '</p>
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
  <?php
  if (isset($_POST['uploadMaterial'])) {
    // echo "hi";
    $f = $_FILES['materialfile']['name'];
    $floc = $_FILES['materialfile']['tmp_name'];
    $fileExtension = explode('.', $f);
    $fileExtension = strtolower(end($fileExtension));
    $newf = $inst_id . $cid . $sid . $f;
    $date=date('Y-m-d');
    $q = "insert into upload_tbl values(null,'$newf','$inst_id','$cid','$sid','$date')";
    $res = mysqli_query($con, $q);
    $q1 = "select * from upload_tbl where FileName='$newf'";
    // echo $q1;
    $res1 = mysqli_query($con, $q1);
    $row = mysqli_fetch_array($res1);
    $newf = $row[0] . $newf;
    // $newf .= "." . $fileExtension;
    $q2 = "update upload_tbl set FileName='$newf' where Id='$row[0]'";
    // echo $q2;
    $res2 = mysqli_query($con, $q2);
    move_uploaded_file($floc, "material_upload/" . $newf);
    echo "<script>Swal.fire({

        title: 'Updated',
        text: 'Your File is Uploaded Succesfully',
        type: 'warning',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK',
        preConfirm: function() {         
          window.location = (\"materialList.php?cid=$cid&sid=$sid\")
          },
          allowOutsideClick: false

      })</script>";
  }
  ?>

</body>