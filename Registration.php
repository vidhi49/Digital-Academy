<!DOCTYPE html>
<html>

<head>
	<title> Register </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="jquery-3.1.1.min.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	
	<script>	
		/*$(document).ready(function(){
  $("#submit").click(function(){
	  if($('#pwd').val() == $('#cpwd').val()){
		 	Swal.fire(
  			'Check Again!',
  			'Password does not Match!',
  			'error'
			)
		 }
    
  });
});*/
		
	$(document).ready(function()
	{
		//$('#submit').click(function(){
		//if ($('#pwd').val() == $('#cpwd').val()) 
		//			{
    				//	Swal.fire(
  			//'Check Again!',
  			//'Password does not Match!',
  		//	'error'
		//					)
  			//		} 
		//});
		$('#pwd, #cpwd').on('keyup', function () 
		{
			var len=$('#pwd').val();
			if(len.length > 6)
				{
					if ($('#pwd').val() == $('#cpwd').val()) 
					{
    					$('#message').html('');
  					} 
					else 
					{
						$('#message').html('Not Matching').css('color', 'red');
					}
					$('#messagepwd').html('');
				}
			else
				{
					$('#messagepwd').html('Must be greater then 6 character').css('color', 'red');	
				}
			
  			
		});
		});
		
	
	
	</script>
	<style>
		@media screen and (min-width: 992px) {
			.max-width-55 {
				max-width: 55;
			}
		}

		input[type="file"] {
			border: none;
		}
	</style>
</head>

<body>
	<?php require("Header.php");?>
	<div class="d-flex justify-content-center mt-5">
		<div class="container max-width-55 ">
			<center>
				<h3 class="m-4 text-danger">Register Here </h3>
				<hr width="100%">
			</center>

			<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label class="form-label">Enter School/College Name :</label>
					<input type='text' class="form-control" name="sname" required />
				</div>
				<div class="form-group">
					<label class="form-label">Address :</label>
					<textarea cols='20' rows="3" class="form-control" required name="address"></textarea>
				</div>
				<div class="form-group">
					<label class="form-label">Email :</label>
					<input type='email' class="form-control" name="email" required placeholder="Enter Valid Email Id" />
				</div>
				<div class="form-group">
					<label class="form-label">Contact No :</label>
					<input type='tel' maxlength="10" class="form-control" required name="cno" placeholder="10 Digits Only" />
				</div>
				<div class="form-group">
					<label class="form-label">User Name :</label>
					<input type='text' class="form-control" name="uname" required />
				</div>
				<div class="form-group">
					<label class="form-label">Password :</label>
					<input type='password' class="form-control" id="pwd" name="pwd" required />
					<span id='messagepwd'></span>
				</div>
				<div class="form-group">
					<label class="form-label">Confirmed Password :</label>
					<input type='password' class="form-control" id="cpwd"  name="cpwd" required />
					<span id='message'></span>
				</div>
				<div class="form-group row">
					<label class=" col-sm-4 col-form-label">Provide School Certificate Image :</label>
					<div class="col-sm-8">
						<input type='file' name="cimg" class="form-control-file" required />
					</div>
				</div>
				<div class="form-group mt-4">
					<button type="submit" id="submit" name="submit" class="btn btn-danger "> Register </button>
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
		$uname=$_POST['uname'];
		$pwd=$_POST['pwd'];
		$cpwd=$_POST['cpwd'];
		$f=$_FILES['cimg']['name'];
		$floc=$_FILES['cimg']['tmp_name'];
		$date=date("Y-m-d");
		
		if($pwd!=$cpwd)
		{
			echo "<script>alert('Passwrod does not match');</script>";
			/*echo "<script>$(function(){
			Swal.fire(
  			'Check Again!',
  			'Password does not Match!',
  			'error'
			)
			});</script>";*/
			
		}/*
		else
		{
			$q="insert into register_tbl values(null,'$sname','$address','$email','$cno','$uname','$pwd','$cpwd','$f','$date')";
			
		
			/*if(mysqli_query($con,$q))
			{
			move_uploaded_file($floc,"userprofile/".$f);
			?>

	
<?php
			echo "<script>$(function(){
			Swal.fire(
  			'Good job!',
  			'You have successfuly Register!',
  			'success'
			)
			});</script>";
			header('location:Login.php');
		}
		else
		{
			die("<center><h1>Query Failed".mysqli_error($con)."</h1></center>");
		}*/
		}
		
	//}
?>