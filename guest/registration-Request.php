<!DOCTYPE html>
<html lang="en">

<head>
  <title>Welcome Guest</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Aclonica&family=Nova+Slim" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="../js/jquery-3.1.1.min.js"></script>
  <script src="../js/signup.js"></script>

  <style>
  @media screen and (min-width: 992px) {
    .max-width-55 {
      max-width: 85;
    }
  }
  </style>
  <script>
  Filevalidation = () => {
    const fi = document.getElementById('cimg');
    var filePath = fi.value;
    var allowedExtensions =
      /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if (!allowedExtensions.exec(filePath)) {
      // alert('Invalid file type');
      $("#filemessage").html('Photo Must be jpg/jpeg/png/gif').css('color', 'red');
      // fi.value = '';
      return false;
    } else {
      // $("#filemessage").html('');
      if (fi.files.length > 0) {
        for (const i = 0; i <= fi.files.length - 1; i++) {

          const fsize = fi.files.item(i).size;
          const file = Math.round((fsize / 1024));
          if (file > 200) {
            $("#filemessage").html('File Must be less then 200kb').css('color', 'red');
            return false;
          } else {

            $("#filemessage").html('');

            return false;
          }
        }
      }
    }
  }
  </script>
</head>

<body>
  <div class="modal fade" id="registerRequestModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content m-1 rounded-3"
        style="background-image:url(../img/1.jpg);box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
        <!-- <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>-->
        <div class="d-flex justify-content-end m-2"><button type="button" class="btn-close flex-end text-muted"
            data-bs-dismiss="modal" aria-label="Close"></button></div>
        <!-- </div> -->
        <div class="modal-body">
          <!-- <div class="container"> -->
          <form name="inquiry-form" method="post" enctype="multipart/form-data">
            <div class="row m-3">
              <h3 class="m-4 navy-blue text-center">Registration Request</h3>
              <hr>
            </div>
            <div class="row m-1 form-group">
              <label class="form-label">Enter School Name :</label>
              <input type='text' id="sname" class="form-control form-control-lg" placeholder="Enter School Name"
                name="sname" />
              <span id='smessage'></span>
            </div>
            <div class="row m-1 form-group">
              <label class="form-label">Email :</label>
              <input type='email' id="email" class="form-control form-control-lg" name="email"
                placeholder="Enter Valid Email Id" />
              <span id='emessage'></span>
            </div>
            <div class="row m-1 form-group">
              <label class="form-label">Address :</label>
              <textarea cols='20' id="address" rows="3" class="form-control form-control-lg" name="address"></textarea>
            </div>
            <div class="row m-1">
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="form-label">Contact No :</label>
                  <input type='number' id="cno" maxlength="10" class="form-control form-control-lg" name="cno"
                    placeholder="10 Digits Only" />
                  <span id='cmessage'></span>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group ">
                  <label class=" form-label">Provide School/College Certificate Image :</label>
                  <input type='file' id="cimg" name="cimg" onchange="Filevalidation()" required
                    class="form-control form-control-lg" />
                  <span id='filemessage'></span>
                </div>
              </div>
            </div>
            <div class="row m-1">
              <div class="form-group mt-4">
                <button type="submit" id="submit" name="submit" class="btn bg-navy-blue text-white"> Submit
                </button>
              </div>
            </div>
        </div>
      </div>
      </form>
      <!-- </div> -->
    </div>
  </div>

</body>

</html>
<?php
if (isset($_POST['submit'])) {
  $sname = $_POST['sname'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $cno = $_POST['cno'];
  $f = basename($_FILES['cimg']['name']);
  $floc = $_FILES['cimg']['tmp_name'];
  $date = date("Y-m-d");
  $extension = pathinfo($f, PATHINFO_EXTENSION);
  $certi_img = $sname . "." . $extension;
  include("../connect.php");
  $q = "insert into inquiry_tbl values( null,'$sname','$email','$address','$cno','$certi_img','Pending','$date')";
  echo $q;
  if (mysqli_query($con, $q)) {
    move_uploaded_file($floc, "../certi_img/" . $certi_img);
    require 'email.php';
    echo "<script> alert('Thank You for Registration');</script>";
    echo "<script>window.location.href='login.php';</script>";
  } else {
    die("<center><h1>Query Failed" . mysqli_error($con) . "</h1></center>");
  }
}
?>