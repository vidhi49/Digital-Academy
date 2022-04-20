<?php
session_start();
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
</head>

<body>
  <div class="container" style="width: 50%;">
    <div class="row m-5 bg-white" style="border-radius:10px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">

      <div class="col ">
        <form method="post" class="p-4 m-2">
          <div>
            <!-- 
                        <img src="../img/logo2.png" height="40px">
                        <hr> -->
            <h1 class="fs-2 text-dark "> Forgot Your Password</h1>
            <hr>
            Enter Your Email Address Associated With Your account to reset your Password

          </div>
          <br>
          
          <div class="form-group input-group">
            
            <select class="form-control form-control-lg " name="user" required>
              <option value="" disabled selected>Select User</option>
              <option> Teacher </option>
              <option> Student </option>
              <option> Institute </option>

            </select>
            <div class="input-group-prepend">
              <span class="input-group-text">
              <i class="fa fa-user"></i>
              </span>
            </div>
          </div>
         
          <div class="form-group input-group">
            
            <input name="email" class="form-control form-control-lg " id="e" placeholder="Enter Email" type="email" require>
            <div class="input-group-prepend">
              <span class="input-group-text">
              <i class="fa fa-envelope"></i>
              </span>
            </div>
          </div>
          <span id="emsg"></span>
          <div class="row mt-3 ">
            <div class="col">
              <a class="small text-muted" href="login.php">Sign In</a>
              <p class="mb-4 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="inquiry.php" style="color: #393f81;">Register here</a></p>

            </div>
            <div class="col d-flex justify-content-end align-items-center">
              <button class="btn bg-navy-blue text-white " name="send" id="send" type="submit">Send Reset Link</button>
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
if (isset($_REQUEST['send'])) {
  $email = $_POST['email'];
  $user = $_POST['user'];
  echo $email,$user;

  if ($user == 'Teacher') {
    $q = "select * from staff_tbl where Email = '$email'";
    $res = mysqli_query($con, $q) or die("Qiery failed q");
    $nor = mysqli_num_rows($res) or die("<script> Swal.fire({
      icon: 'error',
      
      text: 'User Type And Email Does Not Match!'
      
    })</script>");
    if ($nor == 1) {
      while ($row = mysqli_fetch_array($res)) {

        require 'recoveryemail.php';
        echo "<script>Swal.fire({
          
          text: 'Check Your Mail for Reset Information'
          
        })</script>";

      }
    }
  }
  if ($user == 'Student') {
    $q = "select * from student_tbl where Email='$email'";
    $res = mysqli_query($con, $q) or die("Qiery failed q");
    $nor = mysqli_num_rows($res) or die("<script> Swal.fire({
      icon: 'error',
      
      text: 'User Type And Email Does Not Match!'
      
    })</script>");
    if ($nor == 1) {
      while ($row = mysqli_fetch_array($res)) {

        require 'recoveryemail.php';
        echo "<script>Swal.fire({
          
          text: 'Check Your Mail for Reset Information'
          
        })</script>";

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
      
      text: 'User Type and Email does not Match!'
      
    })</script>");
      if ($nor == 1) {

        while ($row = mysqli_fetch_array($res)) {
          // $_SESSION['email'] = $email;
          // $_SESSION['name'] = $row['Name'];
          // $_SESSION['inst_id'] = $row['Id'];
          require 'recoveryemail.php';
          echo "<script>Swal.fire({
          
            text: 'Check Your Mail for Reset Information'
            
          })</script>";

        }
      }
    }
  }
}
?>