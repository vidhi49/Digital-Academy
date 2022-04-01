<?php
include("../connect.php");
include("admin-header.php");
// include("admin-sidebar.php");
$a = 'addadmin';
?>
<html>
  <head>
  
  <script src="../js/jquery-3.1.1.min.js"></script>
  <script src="../js/admin.js"></script>
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
              <h1 class="fs-2 text-dark ">Add Admin</h1>
              <hr>

            </div>
            <br>
            <span>Email</span>
            <div class="form-group">
              <div class="input-group">
                <input id="eid" name="eid" class="form-control form-control-lg " placeholder="abc@gmail.com" type="email" required>
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-envelope" ></i>
                  </span>
                </div>
              </div>
              <span id="emsg"></span>
            </div>
            <span>Password</span>
            <div class="form-group ">
              <div class="input-group">
                <input id="pwd" name="pwd" class="form-control form-control-lg " placeholder="New Password" type="password" required>
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-eye" onclick="myFunction()"></i>
                  </span>
                </div>
              </div>
              <span id="mpwd"></span>
            </div>
            <span>Password</span>
            <div class="form-group ">
              <div class="input-group">
                <input id="cpwd" name="cpwd" class="form-control form-control-lg " placeholder="New Password" type="password" required>
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-eye" onclick="myFunction1()"></i>
                  </span>
                </div>
              </div>
              <span id="mcpwd"></span>
            </div>
            <div class="pt-1 mb-4">
              <button class="btn bg-navy-blue text-white btn-lg " id="add" name="add" type="submit">Add</button>
            </div>
          </form>
        </div>
      </div>
      <!-- </div> -->
    </div>

  </div>

  <?php include("../guest/footer.php"); ?>
</body>

</html>
<?php
if (isset($_POST['add'])) {
  $email = $_POST['eid'];
  $pwd = $_POST['pwd'];
  $hash = password_hash($pwd, PASSWORD_DEFAULT);
  $q = "select * from master_admin_tbl where Email='$email'";
  $res = mysqli_query($con, $q);
  $nor = mysqli_num_rows($res);
  //echo "$nor";
  if ($nor == 0) {
    $q1 = "insert into master_admin_tbl values(null,'$email','$hash')";
    if (mysqli_query($con, $q1)) {
      echo "<script> alert('Thank You for Registration');</script>";
    } else {
      die("<center><h1>Query Failed" . mysqli_error($con) . "</h1></center>");
    }
  } else {
    echo "<script> alert('User Already Existed');</script>";
  }
}

?>