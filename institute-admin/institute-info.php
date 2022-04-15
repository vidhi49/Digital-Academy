
<?php require('institute-header.php');
include('../connect.php');
$id=$_SESSION['inst_id'];

?>
<head>
  
  <script src="../js/jquery-3.1.1.min.js"></script>
  <script src="../js/institute.js"></script>
</head>
<div class="container">
  <div class="row h-100 m-5 bg-light p-5">
    <div class="col-sm-6">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <h4 class="mb-5 text-center text-danger"> Please Fill Institute Details
            <hr>
          </h4>

        </div>
        <div class="mb-3">
          <label class="form-label" for="address">Address</label>
          <textarea cols='20' id="address" rows="2" class="form-control" name="address"></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label" for="city">City :</label>
          <select name="city" id="city" class="form-select" required>
            <option value="" disabled selected>Choose...</option>
            <option value="Surat">Surat</option>
            <option value="Mumbai">Mumbai</option>
            <option value="Puna">Puna</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label" for="state">State :</label>
          <select name="state" id="state" class="form-select" required>
            <option value="" disabled selected>Choose...</option>
            <option value="Gujarat">Gujarat</option>
            <option value="Rajasthan">Rajasthan</option>
            <option value="Maharashtra">Maharashtra</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label" for="country">Country :</label>
          <select name="country" id="country" class="form-select" required>
            <option value="" disabled selected>Choose...</option>
            <option value="India">India</option>
            <option value="Canada">Canada</option>
            <option value="America">America</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Provide School/College Logo Image :</label>
          <input type='file' name="logo" required class="form-control-file">
          
        </div>
        <button type="submit" id="signin" name="signin" class="btn btn-primary bg-navy-blue mt-4">Sign in</button>
      </form>
    </div>
    <div class="col-sm-6 d-none d-sm-block">
      <img src="../img/school.jpg" class="img-fluid h-100" />
    </div>
  </div>
</div>
<?php require("../guest/footer.php");?>
<?php
if(isset($_POST['signin']))
{
    $add=$_POST['address'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $country=$_POST['country'];
    $f=$_FILES['logo']['name'];
		$floc=$_FILES['logo']['tmp_name'];
    $extension=pathinfo($f,PATHINFO_EXTENSION);
    $q1="select * from institute_tbl where Id='$id'";
    $res1=mysqli_query($con,$q1);
    $r=mysqli_fetch_array($res1);
    $logo=$r[2].".".$extension;
    $_SESSION['logo']=$logo;
    move_uploaded_file($floc,"../Institute-logo/".$logo);
    $q="update institute_tbl set Address = '$add',City='$city',State='$state', Country='$country',Logo='$logo' where Id='$id'";
    if(mysqli_query($con,$q))
    {
      echo "<script> alert('Thank You for Provinding Your Information');</script>";
      echo"<script>window.location.href='institute-dashboard.php';</script>";
    }
    else{
      die("<center><h1>Query Failed".mysqli_error($con)."</h1></center>");
    }
}

?>