<?php
	session_start();
?>
<html>

<head>
  <title> Login </title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/style.css" />
</head>
<?php require("header.php");?>

<body>
  <div class="container">
    <div class="row g-0  m-5" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
      <div class="col-md-6 nopadding">
        <img src="../img/logo3.jpg" alt="login form" class="img-fluid rounded rounded-4 w-100 h-100" />
      </div>
      <div class="col-md-6 nopadding d-flex justify-content-center bg-white">
        <form method="post" class="p-4 m-2">
          <div>
            <h1 class="fs-2 text-dark fw-bold"> Digital Academy
              <hr>
            </h1>
          </div>
          <div>
            <h6 class="fw-normal text-dark mb-5"> Sign in to your account</h6>
          </div>
          <div class="form-outline mb-4">
            <input type="email" id="email" name="email" class="form-control form-control-lg m-1" />
            <label class="form-label p-1">Email address</label>
          </div>
          <div class="form-outline mb-4">
            <input type="password" name="pwd" class="form-control form-control-lg m-1" />
            <label class="form-label p-1">Password</label>
          </div>

          <div class="pt-1 mb-4">
            <button class="btn bg-navy-blue text-white btn-lg btn-block" name="login" type="submit">Login</button>
          </div>
          <div class="row mt-5">
            <a class="small text-muted" href="#!">Forgot password?</a>
            <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="#!"
                style="color: #393f81;">Register here</a></p>
          </div>
          <div class="align-self-baseline">
            <a href="#!" class="small text-muted">Terms of use.</a>
            <a href="#!" class="small text-muted">Privacy policy</a>
          </div>
        </form>
      </div>
    </div>
    <!-- </div> -->
    <!-- </div> -->
  </div>
  </div>
  <?php require("footer.php");?>
</body>

</html>



<?php
	if(isset($_REQUEST['login']))
	{
		$eid=$_REQUEST['eid'];
		$pwd=$_REQUEST['pwd'];
		
		include('../connect.php');
		$q="select * from tbl_user where email='$eid' and pwd='$pwd' ";
		$res=mysqli_query($con,$q);
		$nor=mysqli_num_rows($res);
		if($nor>=1)
		{
			$r=mysqli_fetch_array($res);
			$_SESSION['name']=$r[1];
			
			if(isset($_REQUEST['rem']))
			{
				setcookie("emailid",$eid,time()+30*24*60*60);
				setcookie("password",$pwd,time()+30*24*60*60);
			}
			if($r[10]=='Customer')
			{
				header('location:../customer/customer_Home.php');
			}
			else{
				header('location:../admin/admin_home.php');
			}
			
		}
		else
		{
			echo "<center><h1>Either EmailID or Password is Wrong Try Again.</h1></center>";
		}
	}
?>