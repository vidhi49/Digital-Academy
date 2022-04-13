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

</head>

<body>
  <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
      <div class="modal-content m-1" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
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
                <span id="emessage"></span>
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
                <p class="mb-4 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="#"
                    style="color: #393f81;">Register here</a></p>
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