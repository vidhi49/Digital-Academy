<?php
// session_start();
// include("../admin/admin-header.php");
// include("../institute-admin/change-header.php");
// include("../institute-admin/institute-header.php");
include('../connect.php');
// $Inst_id = $_SESSION['Inst_id'];
include('teacher-header.php');
$a = "changepassword";
$page = 'instituteinfo';
?>

<head>
  <!-- <script src="../js/changepwd.js"></script> -->
  <script src="../js/jquery-3.1.1.min.js"></script>
  <script>
    $(document).ready(function() {
      var e_Reg = /^([a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/;
      $("#change").click(function() {
        if ($("#currentpassword").val() != "") {
          if ($("#currentpwd").text() != "") {
            alert($("#currentpwd").text());
            $("#currentpassword").focus();
            return false
          }
        }
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

      $('#newpassword, #confirmpassword ,#currentpassword').on('keyup', function() {

        if ($('#currentpassword').val() != '') {
          $.ajax({

            type: 'POST',
            url: 'teacherpwdvalidate.php',
            data: "currentpassword=" + $('#currentpassword').val(),
            success: function(response) {
              $('#currentpwd').html(response).css('color', 'red');
            }
          });

        }
        if ($("#newpassword").val() != "") {
          var password = $("#newpassword").val();
          var len = password.length;
          if (len < 8) {
            $('#newpwd').html(' Password must be greater then 8 characters').css('color', 'red');

          } else if ($("#confirmpassword").val() != $("#newpassword").val()) {
            $('#newpwd').html('');
            $('#confirmmessage').html('Password Must be Match').css('color', 'red');


          } else {
            $('#confirmmessage').html('');
          }
        }

      });


    });

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
    include("teacher-sidebar.php");
    // include("SIDEBAR.php");
    ?>
    <div class="content d-flex justify-content-center align-items-center text-muted">
      <div class="bg-white p-4 w-auto" style="border-radius:10px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
        <form method="post" class="p-4 cpwd-form">
          <h1 class="fs-2 text-dark "><i class="fa fa-lock"></i> Change Password</h1>
          <hr>
          <p class="m-3">Create a New Password For your Account</p>
          <br>
          <p class="mb-2">Current Password</p>
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


          <p class="mb-2">New Password</p>
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

          <p class="mb-2">Confirm New Password</p>
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
            <button class="btn bg-navy-blue text-white btn-lg " id="change" name="change" type="submit">Change
              Password</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>
<?php
if (isset($_REQUEST['change'])) {
  $newpwd = $_REQUEST['newpassword'];
  $pass_hash = password_hash($newpwd, PASSWORD_DEFAULT);
  $inst_id = $_SESSION['Inst_id'];
  $id=$_SESSION['Id'];
  $q = "update staff_tbl set Pwd='$pass_hash' where Inst_id='$inst_id' and Id='$id'";
  $res = mysqli_query($con, $q);
  if ($res) {
    echo "<script>Swal.fire({
          
            text: 'Password Change Succesfully.'
            
          })</script>";
  }
}
?>