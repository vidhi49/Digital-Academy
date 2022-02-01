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
	require 'phpmailer/PHPMailer.php';
	require 'phpmailer/Exception.php';
	require 'phpmailer/SMTP.php';
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	use PHPMailer\PHPMailer\SMTP;
	
	?>
  <div class="d-flex justify-content-center mt-5">
    <div class="container max-width-55 w-50 ">
      <h3 class="m-4 text-danger text-center">Inquiry Details</h3>
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
          <button type="submit" id="submit" name="submit" class="btn btn-danger "> Submit </button>
        </div>

      </form>
    </div>
  </div>
  <?php require("Footer.html");?>
</body>

</html>
<?php
	if(isset($_POST['submit']))
	{
		$sname=$_POST['sname'];
		$address=$_POST['address'];
		$email=$_POST['email'];
		$cno=$_POST['cno'];
		$uname=trim($_POST['uname']);
		$pwd=$_POST['pwd'];
		$f=$_FILES['cimg']['name'];
		$floc=$_FILES['cimg']['tmp_name'];
		$hash = password_hash($pwd, PASSWORD_DEFAULT);
		$date=date("Y-m-d");
		include("../connect.php");
		$q="insert into register_tbl values(null,'$sname','$address','$email','$cno','$uname','$hash','$f','$date')";
		$q1="insert into request_tbl values(null,'$uname','$email','$cno','$f','$date','0000-00-00','Pending')";
			if(mysqli_query($con,$q) && mysqli_query($con,$q1))
			{
				move_uploaded_file($floc,"../certi_img/".$f);
				$mail = new PHPMailer();
				$mail->isSMTP();
				$mail->Host='smtp.gmail.com';
				$mail->SMTPAuth = "true";
				$mail->SMTPSecure = "tls";
				$mail->Port="587";
				$mail->isHTML(true);
				$mail->addAttachment("../certi_img/$f");
				$mail->Body="<h2>Request for approval...</h2>
				<p>$sname has been requested authorization to use DGskool web app.
The information provided by [user] is:</p><p>User Name:$uname <br>Email Id : $email<br>Phone No.:$cno</p>
				";
				$mail->Username="sem5b.01.tmtbca@gmail.com";
				$mail->Password = "optical1030";
				$mail->Subject="Request For Approval...";
				$mail->setFrom("sem5b.01.tmtbca@gmail.com");
				$mail->addAddress("sem5b.02.tmtbca@gmail.com");
				if ($mail->send()){
				echo "Email sent";	
				}
				else{
					echo "Error";
				}
				$mail->smtpClose();
				echo "<script> alert('Thank You for Registration');</script>";
				echo"<script>window.location.href='Login.php';</script>";
			}
			else
			{
				die("<center><h1>Query Failed".mysqli_error($con)."</h1></center>");
			}
		
		
	}
?>