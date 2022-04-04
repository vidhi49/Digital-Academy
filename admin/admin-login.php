<?php
session_start();

?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
<script src="../js/jquery-3.1.1.min"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    crossorigin="anonymous" />
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
        $('#emessage').html('').css('color', 'red');

      }

    });
  });
</script>


<section class="vh-100" style="background-color: #0E0A37;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-12">
        <div class="card" style="border-radius: 1rem;width:1100px">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="img1.webp" alt="login form" class="img-fluid" style="height: 660; border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form method="post">

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <img class='logo ms-1' src='../img/logo2.png' />
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                  <div class="form-outline mb-4">
                    <label class="form-label">Email address</label>
                    <input type="email" id="email" name="email" class="form-control form-control-lg" />
                    <span id="emessage"></span>

                  </div>

                  <div class="form-outline mb-2">
                    <label class="form-label p-1">Password</label>

                    <div class="input-group">
                      <input type="password" name="pwd" id="pwd" value="<?php if (isset($_COOKIE['passwordcookie'])) echo $_COOKIE['passwordcookie']; ?>" class="form-control form-control-lg " required />
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fa fa-eye" onclick="myFunction()"></i>
                        </span>
                      </div>
                    </div>

                  </div>
                  <div class="pt-1 mb-4">

                    <button class="btn btn-dark btn-lg btn-block" id="login" name="login" type="submit">Login</button>
                  </div>

                  <a class="small text-muted" href="admin-forgotpwd.php">Forgot password?</a>
                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="#!" style="color: #393f81;">Register here</a></p>
                  <a href="#!" class="small text-muted">Terms of use.</a>
                  <a href="#!" class="small text-muted">Privacy policy</a>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $pwd = $_POST['pwd'];

  include("../connect.php");
  $q = "select * from master_admin_tbl where Email = '$email'";

  $res = mysqli_query($con, $q) or die("Qiery failed q");
  $nor = mysqli_num_rows($res) or die("<script>alert('Not a Admin');</script>");
  echo "$nor";
  if ($nor == 1) {
    while ($row = mysqli_fetch_array($res)) {
      if (password_verify($pwd, $row[2])) {
        $_SESSION['email'] = $email;
        $_SESSION['id'] = $row[0];
        header("location:admin-dashboard.php");
      } else {
        echo "<script>alert('Passwrod Does not match');</script>";
      }
    }
  }
}

?>