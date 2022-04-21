<?php
session_start();
ob_start();
include("../connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Welcome Guest</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Aclonica&family=Nova+Slim" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="../js/jquery-3.1.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
  function myFunction() {
    var x = document.getElementById("pwd");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }

  }
  $(document).ready(function() {
    var e_Reg = /^([a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/;
    $("#login").click(function() {
      if ($('#email').val() != '') {
        if ($('#emsg').text() != "") {
          alert($('#emsg').text());
          $("#email").focus();
          return false;

        }
      }
    });
    $('#email').on('keyup', function() {
      //var clen = $('#cno').val();
      var email = $('#email').val();
      if (e_Reg.test(email) == false) {
        $('#emsg').html('Email Must be in abc@xyz Format').css('color', 'red');
      } else {
        $('#emsg').html('').css('color', 'red');

      }

    });
  });
  </script>

</head>

<body>
  <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
      <div class="modal-content m-1 rounded-3" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
        <!-- <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>-->
        <div class="d-flex justify-content-end m-2"><button type="button" class="btn-close flex-end text-muted"
            data-bs-dismiss="modal" aria-label="Close"></button></div>
        <!-- </div> -->
        <div class="modal-body" style="background: linear-gradient(to bottom, #ffffff 0%, #ffff00 140%);">
          <div class="nopadding d-flex justify-content-center">
            <form method="post" class="p-2">
              <h1 class="fs-2 navy-blue fw-bolder"> Digital Academy
                <hr>
              </h1>
              <div>
                <h6 class="fw-normal text-dark mb-5"> Sign in to your account</h6>
              </div>
              <div class="form-outline mb-2">
                <label class="form-label p-1 navy-blue">Select User</label>
                <select class="form-control form-control-lg m-1 text-muted fs-6" name="user" required>
                  <option value="" disabled selected>--- select user ---</option>
                  <option <?php if (isset($_COOKIE['usercookie'])) {
                            if ($_COOKIE['usercookie'] == 'Teacher') {
                              echo "selected";
                            }
                          } ?>> Teacher </option>
                  <option <?php if (isset($_COOKIE['usercookie'])) {
                            if ($_COOKIE['usercookie'] == 'Student') {
                              echo "selected";
                            }
                          } ?>> Student </option>
                  <option <?php if (isset($_COOKIE['usercookie'])) {
                            if ($_COOKIE['usercookie'] == 'Institute') {
                              echo "selected";
                            }
                          } ?>> Institute </option>

                </select>
              </div>
              <div class="form-outline mb-2">
                <label class="form-label p-1 navy-blue">Email address</label>
                <input type="email" id="email" name="email"
                  value="<?php if (isset($_COOKIE['emailcookie'])) echo $_COOKIE['emailcookie']; ?>"
                  class="form-control form-control-lg m-1 text-muted fs-6 " required />
                <span id="emsg"></span>
              </div>
              <div class="form-outline mb-2">
                <label class="form-label p-1 navy-blue">Password</label>
                <div class="input-group">
                  <input type="password" name="pwd" id="pwd"
                    value="<?php if (isset($_COOKIE['passwordcookie'])) echo $_COOKIE['passwordcookie']; ?>"
                    class="form-control form-control-lg text-muted fs-6" required />
                  <!-- <div class="input-group-prepend"> -->
                  <button class="input-group-text">
                    <i class="fa fa-eye" onclick="myFunction()"></i>
                  </button>
                  <!-- </div> -->
                </div>
              </div>
              <div class="form-outline mb-2">
                <input type="checkbox" name="rem" class="m-1 mb-3" /> Remember Me
              </div>
              <div class="pt-1 mb-4 ">
                <button class="btn bg-navy-blue text-white btn-lg w-25 " id="login" name="login"
                  type="submit">Login</button>
              </div>
              <div class="row mt-3">
                <a class="small text-dark" href="forgotpassword.php">Forgot password?</a>
                <p class="mb-4 pb-lg-2" style="color: #393f81;">Don't have an account?
                  <a href="#" style="color: #393f81;" data-bs-toggle="modal"
                    data-bs-target="#registerRequestModal">Register
                    here</a>
                </p>
              </div>
              <div class="align-self-baseline">
                <a href="#!" class="small text-dark">Terms of use.</a>
                <a href="#!" class="small text-dark">Privacy policy</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
<?php
if (isset($_REQUEST['login'])) {
  $email = $_POST['email'];
  $pwd = $_POST['pwd'];
  $user = $_POST['user'];
  if (isset($_REQUEST['rem'])) {

    setcookie("emailcookie", $email, time() + 86400);
    setcookie("passwordcookie", $pwd, time() + 86400);
    setcookie("usercookie", $user, time() + 86400);
  }

  if ($user == 'Teacher') {

    $q = "select * from staff_tbl where Email = '$email'";
    $res = mysqli_query($con, $q) or die("Qiery failed q");
    $nor = mysqli_num_rows($res) or die("<script> Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Not a Valid User!'
    });
    </script>");

    if ($nor == 1) {
      while ($row = mysqli_fetch_array($res)) {
        if (password_verify($pwd, $row[19])) {
          $_SESSION['email'] = $email;
          $_SESSION['Id'] = $row['Id'];
          $_SESSION['Inst_id'] = $row['Inst_id'];
          echo "t";
          // echo "<script>window.location.href='../teacher/teacher-home.php';</script>";
          echo "<script>window.location.href='../teacher/teacher-home.php';</script>";
        } else {
          echo "<script>Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Passward Does Not Match!'
            
          })</script>";
        }
      }
    }
  }
  if ($user == 'Student') {
    $q = "select * from student_tbl where Email = '$email'";
    $res = mysqli_query($con, $q) or die("Qiery failed q");
    $nor = mysqli_num_rows($res) or die("<script> Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Not a Valid User!'
      
    })</script>");
    if ($nor == 1) {
      while ($row = mysqli_fetch_array($res)) {
        if (password_verify($pwd, $row[20])) {
          $_SESSION['email'] = $email;
          $_SESSION['Id'] = $row['Id'];
          $_SESSION['Inst_id'] = $row['Inst_id'];
          echo "s";
          echo "<script>window.location.href='../student/student-dashboard.php';</script>";
        } else {
          echo "<script>Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Passward Does Not Match!'
            
          })</script>";
        }
      }
    }
  }

  if ($user == "Institute") {

    $query = "select status from inquiry_tbl where Email='$email'";
    $result = mysqli_query($con, $query);
    $r = mysqli_fetch_array($result);
    if ($r[0] == 'Pending') {
      echo "<script>Swal.fire({
            
            title: 'Oops...',
            text: 'Yet Admin didnt approved request!'
            
          })</script>";
    } else {
      $q = "select * from institute_admin_tbl where Email = '$email'";
      $res = mysqli_query($con, $q) or die("Qiery failed q");
      $nor = mysqli_num_rows($res) or die("<script>Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Not a Valid User!'
      
    })</script>");
      if ($nor == 1) {

        while ($row = mysqli_fetch_array($res)) {


          if (password_verify($pwd, $row[5])) {
            $_SESSION['email'] = $email;
            $q = "select Logo,Name,Id from institute_tbl where Email='$email'";
            $res = mysqli_query($con, $q) or die("Query failed");
            $row = mysqli_fetch_assoc($res);
            if ($row['Logo'] != "") {
              $_SESSION['logo'] = $row['Logo'];
              $_SESSION['name'] = $row['Name'];
              $_SESSION['inst_id'] = $row['Id'];
              echo "i";
              echo "<script>window.location.href='../institute-admin/institute-dashboard.php';</script>";
            } else {
              $_SESSION['name'] = $row['Name'];
              $_SESSION['inst_id'] = $row['Id'];
              echo "<script>window.location.href='../institute-admin/institute-info.php';</script>";
            }
          } else {
            echo "<script>alert('Password does not match');</script>";
          }
        }
      }
    }
  }
}
?>