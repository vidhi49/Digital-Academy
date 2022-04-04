<?php
session_start();
include("../connect.php");
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
        $(document).ready(function() {
            var e_Reg = /^([a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/;
            $("#send").click(function() {
                if ($('#email').val() != '') {
                    if ($('#emessage').text() != "") {
                        alert($('#emessage').text());
                        $("#email").focus();
                        return false;

                    }
                }
            });
            $('#email').on('keyup', function() {
                //var clen = $('#cno').val();
                var email = $('#email').val();
                if (e_Reg.test(email) == false) {
                    $('#emessage').html('Email Must be in abc@xyz Format').css('color', 'red');
                } else {
                    $.ajax({
                        type: 'POST',
                        url: 'ajaxEmailfpwd.php',
                        data: "email=" + $('#email').val(),
                        success: function(response) {
                            $('#emessage').html(response).css('color', 'red');
                        }
                    });
                    // $('#emessage').html('').css('color', 'red');

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
                            <h1 class="fs-2 text-dark "> Forgot Your Password</h1>
                            <hr>
                            Enter Your Email Address Associated With Your account to reset your Password

                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col">
                            <div class="form-group input-group">

                                <input name="email" class="form-control form-control-lg " id="email" placeholder="Enter Email" type="email" require>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                </div>
                            </div>
                            <span id="emessage"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="pt-1 mb-4">
                                <button class="btn btn-dark btn-lg btn-block" id="send" name="send" type="submit">Send Link</button>
                            </div>
                            <div class="pt-1 mb-4">
                                <button class="btn btn-warning btn-lg btn-block" id="login" name="login" type="submit">Login</button>
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
if (isset($_REQUEST['login'])) {
    header('location:admin-login.php');
}
if (isset($_REQUEST['send'])) {
    $email = $_POST['email'];
    $q = "select * from master_admin_tbl where Email = '$email'";
    $res = mysqli_query($con, $q) or die("Qiery failed q");
    $nor = mysqli_num_rows($res) or die("<script> Swal.fire({
      icon: 'error',
      
      text: 'Admin Does Not Match!'
      
    })</script>");
    if ($nor == 1) {
        while ($row = mysqli_fetch_array($res)) {

            require 'recoveryemailadmin.php';
            echo "<script>Swal.fire({
          
          text: 'Check Your Mail for Reset Information'
          
        })</script>";
        }
    }
}
?>