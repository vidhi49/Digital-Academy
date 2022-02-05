<!DOCTYPE html>
<html>

<head>
  <title> Register </title>
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

  input[type="file"] {
    border: none;
  }
  </style>
</head>

<body>
  <?php require("header.php");
	
	
	?>
  <div class="d-flex justify-content-center mt-5">
    <div class="container max-width-55 w-50 ">
      <h3 class="m-4 navy-blue text-center">Inquiry Details</h3>
      <hr width="100%">

      <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label class="form-label">Enter School/College Name :</label>
          <input type='text' id="sname" class="form-control" name="sname" />
        </div>
        <div class="form-group">
          <label class="form-label">Email :</label>
          <input type='email' id="email" class="form-control" name="email" placeholder="Enter Valid Email Id" />
          <span id='emessage'></span>
        </div>
        <div class="form-group">
          <label class="form-label">Address :</label>
          <textarea cols='20' id="address" rows="3" class="form-control" name="address"></textarea>
        </div>
        <div class="form-group">
          <label class="form-label">Contact No :</label>
          <input type='tel' id="cno" maxlength="10" class="form-control" name="cno" placeholder="10 Digits Only" />
          <span id='cmessage'></span>
        </div>
        <div class="form-group row">
          <label class=" col-sm-4 col-form-label">Provide School/College Certificate Image :</label>
          <div class="col-sm-8">
            <input type='file' id="cimg" name="cimg" required class="form-control-file" />
          </div>
        </div>
        <div class="form-group mt-4">
          <button type="submit" id="submit" name="submit" class="btn bg-navy-blue text-white"> Submit </button>
        </div>

      </form>
    </div>
  </div>
  <?php require("footer.php");?>
</body>

</html>
<?php
	if(isset($_POST['submit']))
	{
		$sname=$_POST['sname'];
		$address=$_POST['address'];
		$email=$_POST['email'];
		$cno=$_POST['cno'];
		$f=basename($_FILES['cimg']['name']);
		$floc=$_FILES['cimg']['tmp_name'];
		$date=date("Y-m-d");
		include("../connect.php");
    print_r($_FILES);
		 $q="insert into inquiry_tbl values( null,'$sname','$email','$address','$cno','$f','Pending','$date')";
    //  $destination=dirname(__DIR__)."/certi_img/".$f;
    //  $destination="/var/www/html/dgskool/certi_img/".$f;
    //  echo "desination is $destination and temp nam is $floc<br>";
    //  var_dump(move_uploaded_file($floc,$destination));
    //  if(move_uploaded_file($floc,$destination))
      // echo "Done";
    // else
      // print $php_errormsg;
    //  echo $q;
			if(mysqli_query($con,$q))
			{
				move_uploaded_file($floc,"../certi_img/".$f);
				require 'email.php';
				echo "<script> alert('Thank You for Registration');</script>";
				echo"<script>window.location.href='login.php';</script>";
			}
			else
			{
				die("<center><h1>Query Failed".mysqli_error($con)."</h1></center>");
			}
		
		
	}
?>