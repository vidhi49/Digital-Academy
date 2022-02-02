

<?php
include("../connect.php");
include("admin-header.php");
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="../js/jquery-3.1.1.min"></script>
  <script src="../js/admin.js"></script>

<section class="vh-100" style="background-color: grey;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5">
            <h3 class="mb-4">Add Admin</h3>
            <form method="post">
            <div class="form-outline mb-4">
              <input type="email" id="eid"  name="eid" class="form-control form-control-lg" />
              <label class="form-label"  >Email Id</label>
            </div>  

            <div class="form-outline mb-4">
              <input type="password"  id="pwd" name="pwd" class="form-control form-control-lg" />
              <label class="form-label"  for="typePasswordX-2">Password</label>
            </div>           
            <button class="btn btn-dark btn-lg btn-block" id="add" name="add" type="submit">Add </button><br>
            </form>
            <a class="small text-muted" href="#!">Forgot password?</a>
            <p class="mb-3 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="#!" style="color: #393f81;">Register here</a></p>
            <a href="#!" class="small text-muted">Terms of use.</a>
            <a href="#!" class="small text-muted">Privacy policy</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
if(isset($_POST['add']))
{
    $email=$_POST['eid'];
    $pwd=$_POST['pwd'];
    $hash=password_hash($pwd,PASSWORD_DEFAULT);
    $q="select * from master_admin_tbl where Email='$email'";
    $res=mysqli_query($con,$q);
    $nor=mysqli_num_rows($res);
    if($nor<0)
    {
        $q1="insert into master_admin_tbl values(null,'$email','$hash')";
         if(mysqli_query($con,$q1))
			{
				echo "<script> alert('Thank You for Registration');</script>";
			}
			else
			{
				die("<center><h1>Query Failed".mysqli_error($con)."</h1></center>");
			}

    }else
    {
        echo "<script> alert('User Already Existed');</script>";
    }
    

}

        include("../guest/footer.php");
        ?>