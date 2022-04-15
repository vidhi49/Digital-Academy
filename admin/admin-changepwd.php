<?php
include("../connect.php");
include("admin-header.php");
// include("admin-sidebar.php");
$a = 'changepwd';
?>
<html>

<head>

  <script src="../js/jquery-3.1.1.min.js"></script>
  <script src="../js/admin-changepwd.js"></script>
</head>
<script>
  function myFunction() {
    var x = document.getElementById("pwd");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }

  }

  function myFunction1() {
    var x = document.getElementById("cpwd");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }

  }
</script>

<body>
  <div class="d-flex">
    <!-- <div class="col-sm-2"> -->
    <?php include("admin-sidebar.php"); ?>
    <!-- </div> -->
    <!-- <div class="col-sm-10"> -->
    <div class="content m-3 p-3">
    <div class="row m-5 bg-white" style="border-radius:10px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">

<div class="col ">
    <form method="post" class="p-4 m-2">
        <div>
            <h1 class="fs-2 text-dark "><i class="fa fa-lock"></i> Change Password</h1>
            <hr>
            Create a New Password For your Account
        </div>
        <br>
        <span>Current Password</span>
        <div class="form-group">
            <div class="input-group">
                <input name="currentpassword" id="currentpassword" class="form-control  " placeholder="Current Password" type="password" required>
                <div class="input-group-prepend">
                    <span class="input-group-text form-control form-control-lg">
                        <i class="fa fa-eye " onclick="myFunction()"></i>
                    </span>
                </div>
            </div>
            <span id="currentpwd"></span>
        </div>

        <br>
        <span>New Password</span>
        <div class="form-group ">
            <div class="input-group">
                <input name="newpassword" id="newpassword" class="form-control  " placeholder="New Password" type="password" required>
                <div class="input-group-prepend">
                    <span class="input-group-text form-control form-control-lg">
                        <i class="fa fa-eye" onclick="myFunction1()"></i>
                    </span>
                </div>
            </div>

            <span id="newpwd"></span>
        </div>
        <br>
        <span>Confirm New Password</span>
        <div class="form-group ">
            <div class="input-group">
                <input name="confirmpassword" id="confirmpassword" class="form-control " placeholder="Confirm New Password" type="password" required>
                <div class="input-group-prepend">
                    <span class="input-group-text form-control form-control-lg">
                        <i class="fa fa-eye" onclick="myFunction2()"></i>
                    </span>
                </div>
            </div>
            <span id="confirmmessage"></span>


        </div>
        <br>
        <div class="pt-1 mb-4">
            <button class="btn bg-navy-blue text-white btn-lg " id="change" name="change" type="submit">Change Password</button>
        </div>
    </form>
</div>
</div>
      <!-- </div> -->
    </div>

  </div>

</body>

</html>
<?php
if(isset($_REQUEST['change']))
{
    $newpwd=$_REQUEST['newpassword'];
    $pass_hash=password_hash($newpwd,PASSWORD_DEFAULT);
    $id=$_SESSION['id'];
    $q="update master_admin_tbl set Pwd='$pass_hash' where Id='$id'";
    $res=mysqli_query($con,$q);
    if($res)
    {
        echo "<script>Swal.fire({
          
            text: 'Password Change Succesfully.'
            
          })</script>";
    }
    
}
?>