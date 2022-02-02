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
</head>

<body>

	<?php require("header.php");?>
<div class="d-flex justify-content-center">
    <div class="container  mt-5" style="width:25%">
        <form method="post">
            <center>
                <h3 class="mt-4 text-danger"> Sign In </h3>
                <hr width="100%">
            </center>
            <div class="form-group">
                <input type="email" required class="form-control" placeholder="ABC12@gmail.com" autocomplete="off">
            </div>
            <div class="form-group">
                <input type="password" autocomplete="new-password" placeholder="Enter Password " class="form-control" required>
            </div>
            <div class="form-group form-check">
                <label class="form-check-label">
                    <input class="form-check-input" name="rem" type="checkbox"> Remember me
                </label>
            </div>
            <div class="form-group text-right">
                <button type="submit" value="Submit" class="btn btn-danger "> Login </button>
                <p class="medium fw-bold mt-2 pt-1 ">Don't have an account? <a href="Registration.php" class="link-danger"> &nbsp;Register </a></p>
            </div>
        </form>
    </div>
</div>
	<?php require("footer.html");?>
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