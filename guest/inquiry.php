<!DOCTYPE html>
<html>

<head>
  <title> Registeration Request </title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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

<body style="background-image: url('../img/register-bg.jpg');">
  <?php require("header.php");
  ?>
  <div class="d-flex justify-content-center">
    <div class="container">
      <form name="inquiry-form" method="post" enctype="multipart/form-data">
        <div class="m-5" style="background-color: white;border-radius:10px">
          <div class="row m-3">
            <div class="col">
              <h3 class="m-4 navy-blue text-center">Registration Request</h3>
              <hr>
            </div>
          </div>
          <div class="row m-3">
            <div class="col">
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label class="form-label">Enter School Name :</label>
                    <input type='text' id="sname" class="form-control form-control-lg" placeholder="Enter School Name"
                      name="sname" />
                    <span id='smessage'></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label class="form-label">Email :</label>
                    <input type='email' id="email" class="form-control form-control-lg" name="email"
                      placeholder="Enter Valid Email Id" />
                    <span id='emessage'></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label class="form-label">Address :</label>
                    <textarea cols='20' id="address" rows="3" class="form-control form-control-lg"
                      name="address"></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label class="form-label">Contact No :</label>
                    <input type='text' id="cno" maxlength="10" class="form-control form-control-lg" name="cno"
                      placeholder="10 Digits Only" />
                    <span id='cmessage'></span>
                  </div>
                </div>
                <div class="col">
                  <div class="form-group ">
                    <label class=" form-label">Provide School/College Certificate Image :</label>

                    <input type='file' id="cimg" name="cimg" onchange="Filevalidation()" required
                      class="form-control form-control-lg" />
                    <span id='filemessage'></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group mt-4">
                    <button type="submit" id="submit" name="submit" class="btn bg-navy-blue text-white"> Submit
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>





      </form>
    </div>
  </div>
  <?php require("footer.php"); ?>
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