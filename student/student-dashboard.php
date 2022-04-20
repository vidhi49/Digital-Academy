<?php
include('../connect.php');
include('student-header.php');
$page="dashboard";
?>
<html>

<body>
  <div class="d-flex">
    <?php include("student-sidebar.php"); ?>
    <div class="student-content mt-5 p-3">
      <div class="">
        <div class="row  shadow mx-5 mb-3" style="border-radius: 20px;background-color:#daedf4">
          <div class="col-6">
            <h1>Welcome Back!!!</h1>
          </div>
          <div class="col-sm-6 ">
            <img class="card-img-bottom" src="../img/student-dashboard.png" >
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>