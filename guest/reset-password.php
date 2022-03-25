<?php
session_start();
$useremail = $_REQUEST['email'];
include("../connect.php");
?>
<html>

<head>
    <title> Login </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style.css" />
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/reset.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <?php require("header.php"); ?>
    <script>
        function myFunction() {
            var x = document.getElementById("newpassword");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
            
        }
        function myFunction1(){
            var y = document.getElementById("confirmpassword");
            if (y.type === "password") {
                y.type = "text";
            } else {
                y.type = "password";
            }
        }
    </script>
</head>

<body>
    <div class="container" style="width: 50%;">
        <div class="row m-5 bg-white" style="border-radius:10px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">

            <div class="col ">
                <form method="post" class="p-4 m-2">
                    <div >
                        <!-- 
                        <img src="../img/logo2.png" height="40px">
                        <hr> -->
                        
                        <h1 class="fs-2 text-dark "><i class="fa fa-lock"></i>  Reset Password</h1>
                        <hr>
                        Enter New password for <?php echo $useremail ?>
                    </div>
                    <br>
                    <div class="form-group input-group">
                        <input name="newpassword" id="newpassword" class="form-control form-control-lg " placeholder="New Password" type="password" required>
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-eye" onclick="myFunction()"></i>
                            </span>
                        </div>                        
                    </div> 
                    <span id="passwordmessage"></span>                   
                    <div class="form-group input-group">
                        <input name="confirmpassword" id="confirmpassword" class="form-control form-control-lg " placeholder="Confirm New Password" type="password" required>
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-eye" onclick="myFunction1()"></i>
                            </span>
                        </div>
                        
                    </div>
                    <span id="confirmmessage"></span>    
                    <div class="pt-1 mb-4">
                        <button class="btn bg-navy-blue text-white btn-lg btn-block" id="reset" name="reset" type="submit">Reset New Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <?php require("footer.php"); ?>
</body>

</html>
<?php
if(isset($_REQUEST['reset']))
{
    $newpwd=$_REQUEST['newpassword'];
    $id=$_REQUEST['id'];
    $email=$_REQUEST['email'];
    $user=$_REQUEST['user'];
    $pass_hash = password_hash($newpwd, PASSWORD_DEFAULT);
    if($user=='Teacher')
    {
        $q="update staff_tbl set Pwd='$pass_hash' Where Email='$email' and Id='$id'";
        $result=mysqli_query($con,$q);
        if($result)
        {
            echo "<script>Swal.fire({
          
                text: 'Your Password is Reset'
                
              })</script>";
        }
    }
    if($user=='Student')
    {
        $q="update student_tbl set Pwd='$pass_hash' Where Email='$email' and Id='$id'";
        $result=mysqli_query($con,$q);
        if($result)
        {
            echo "<script>Swal.fire({
          
                text: 'Your Password is Reset'
                
              })</script>";
        }
    }
    if($user=='Institute')
    {
        $q="update institute_admin_tbl set Pwd='$pass_hash' Where Email='$email' and Id='$id'";
        $result=mysqli_query($con,$q);
        if($result)
        {
            echo "<script>Swal.fire({
          
                text: 'Your Password is Reset'
                
              })</script>";
        }
    }

}
?>