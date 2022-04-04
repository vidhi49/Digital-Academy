<?php include("../connect.php");
// session_start();
// include("../admin/admin-header.php");
include("../institute-admin/change-header.php");
// include("../institute-admin/institute-header.php");
$a = "changepassword";
?>

<head>
    <script src="../js/changepwd.js"></script>
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script>
        function myFunction() {
            var x = document.getElementById("currentpassword");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }

        }

        function myFunction1() {
            var x = document.getElementById("newpassword");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }

        }

        function myFunction2() {
            var y = document.getElementById("confirmpassword");
            if (y.type === "password") {
                y.type = "text";
            } else {
                y.type = "password";
            }
        }
    </script>
</head>
<html>

<body>
    <div class="d-flex">
        <?php
        include("institute-sidebar.php");
        // include("SIDEBAR.php");
        ?>
        <div class="institute-content  text-muted">
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
                                <input name="currentpassword" id="currentpassword" class="form-control form-control-lg " placeholder="Current Password" type="password" required>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-eye" onclick="myFunction()"></i>
                                    </span>
                                </div>
                            </div>

                            <span id="currentpwd"></span>
                        </div>


                        <span>New Password</span>
                        <div class="form-group ">
                            <div class="input-group">
                                <input name="newpassword" id="newpassword" class="form-control form-control-lg " placeholder="New Password" type="password" required>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-eye" onclick="myFunction1()"></i>
                                    </span>
                                </div>
                            </div>

                            <span id="newpwd"></span>
                        </div>

                        <span>Confirm New Password</span>
                        <div class="form-group ">
                            <div class="input-group">
                                <input name="confirmpassword" id="confirmpassword" class="form-control form-control-lg " placeholder="Confirm New Password" type="password" required>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-eye" onclick="myFunction2()"></i>
                                    </span>
                                </div>
                            </div>
                            <span id="confirmmessage"></span>


                        </div>

                        <div class="pt-1 mb-4">
                            <button class="btn bg-navy-blue text-white btn-lg " id="change" name="change" type="submit">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php
if(isset($_REQUEST['change']))
{
    $newpwd=$_REQUEST['newpassword'];
    $pass_hash=password_hash($newpwd,PASSWORD_DEFAULT);
    $institute_id=$_SESSION['inst_id'];
    $q="update institute_admin_tbl set Pwd='$pass_hash' where Inst_id='$institute_id'";
    $res=mysqli_query($con,$q);
    if($res)
    {
        echo "<script>Swal.fire({
          
            text: 'Password Change Succesfully.'
            
          })</script>";
    }
    
}
?>