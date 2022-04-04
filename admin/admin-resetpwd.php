<?php
session_start();
include("../connect.php");
$useremail = $_REQUEST['email'];
?>
<html>

<head>
    <title> Forgot Password </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../js/jquery-3.1.1.min.js"></script>
    <!-- <script src="../js/admin.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" crossorigin="anonymous" />

    <script>
        function myFunction() {
            var x = document.getElementById("newpassword");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }

        }

        function myFunction1() {
            var y = document.getElementById("confirmpassword");
            if (y.type === "password") {
                y.type = "text";
            } else {
                y.type = "password";
            }
        }
        $(document).ready(function() {
            $("#reset").click(function() {
                if ($("#newpassword").val() != "") {
                    var password = $("#newpassword").val();
                    var len = password.length;
                    if (len < 8) {
                        alert('Password Must be Greater then 8 characters');
                        $("#newpassword").focus();
                        return false;
                    } else if ($("#confirmpassword").val() != $("#newpassword").val()) {
                        alert('Password Must be matched');
                        $("#confirmpassword").focus();
                        return false;

                    }

                }
            });
            $('#newpassword, #confirmpassword').on('keyup', function() {
                if ($("#newpassword").val() != "") {
                    var password = $("#newpassword").val();
                    var len = password.length;
                    if (len < 8) {
                        $('#passwordmessage').html(' Password must be greater then 8 characters').css('color', 'red');

                    } else if ($("#confirmpassword").val() != $("#newpassword").val()) {
                        $('#passwordmessage').html('');
                        $('#confirmmessage').html('Password Must be Match').css('color', 'red');


                    } else {
                        $('#confirmmessage').html('');
                    }
                }

            });
        });
    </script>
</head>

<body style="background-color: #0E0A37;">
    <div class="container  " style="width: 40%;">

        <div class="row  h-100">

            <div class="col my-auto bg-white" style="border-radius:10px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                <form method="post" class="p-4 m-2">
                    <div class="row">
                        <div class="col text-center">
                            <div class=" mb-3 pb-1">
                                <img class='logo ms-1' src='../img/logo2.png' />
                            </div>
                            <h1 class="fs-2 text-dark "> Reset Password</h1>
                            <hr>
                            Enter New password for <?php echo $useremail ?>

                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col">
                            <div class="form-group input-group">
                                <input name="newpassword" id="newpassword" class="form-control form-control-lg " placeholder="New Password" type="password" required>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-eye" onclick="myFunction()"></i>
                                    </span>
                                </div>
                            </div>
                            <span id="passwordmessage"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group input-group">
                                <input name="confirmpassword" id="confirmpassword" class="form-control form-control-lg " placeholder="Confirm New Password" type="password" required>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-eye" onclick="myFunction1()"></i>
                                    </span>
                                </div>

                            </div>
                            <span id="confirmmessage"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="pt-1 mb-4">
                                <button class="btn btn-dark btn-lg btn-block" id="reset" name="reset" type="submit">Reset Password</button>
                            </div>

                        </div>
                    </div>



                </form>
            </div>
        </div>

    </div>
    </div>

</body>

</html>
<?php
if (isset($_REQUEST['reset'])) {
    $newpwd=$_REQUEST['newpassword'];
    $id=$_REQUEST['id'];
    $email=$_REQUEST['email'];
    $pass_hash = password_hash($newpwd, PASSWORD_DEFAULT);
    
        $q="update master_admin_tbl set Pwd='$pass_hash' Where Email='$email' and Id='$id'";
        $result=mysqli_query($con,$q);
        if($result)
        {  
              echo "<script>Swal.fire({
          
                title: 'Updated',
                text: 'Your Password is Reset',
                type: 'warning',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                preConfirm: function() {
        
                    window.location = (\"admin-login.php\")
          
                  },
                  allowOutsideClick: false
                
              })</script>";
        }
}

?>