<?php
include('../connect.php');
include('../teacher/teacher-header.php');
$Id = $_SESSION['Id'];
$inst_id = $_SESSION['Inst_id'];
$p = "select * from staff_tbl where Id='$Id' and Inst_id='$inst_id'";
$r = mysqli_query($con, $p);
$row = mysqli_fetch_array($r);
$page = '';
?>
<html>

<body>
  <div class="d-flex">
    <?php include("teacher-sidebar.php"); ?>
    <div class="content mt-5 ">
      <div class="row shadow ml-2" style="border-radius: 20px;background-color:#fffdd0">

        <div class="col-sm-8 d-flex align-items-center">
          <div class="m-5 " style="line-height: 50px;">
            <p class="text-black" style="font-size: 50px;">Welcome Back!!!</p>
            <h3><?php echo $row['Name'] ?></h3>
            <p class="py-2 text-black" style="line-height: 25px;">
              A Teacher's Purpose is not to create students in his Image, but to develop students who can create their Image.
            </p>
          </div>

        </div>
        <div class="col-sm-4 ">
          <img class="card-img-bottom" src="../img/teacher-dashboard.png">
        </div>
      </div>
      <div class="row  mx-1 my-5">
        <div class="col-sm-4 mx-3 shadow" style="border-radius: 20px;background-color:#fffdd0">
          <h3 class="p-3">My Classes</h3>
        </div>
        <div class="col-sm-4 mx-3 shadow" style="border-radius: 20px;background-color:#fffdd0">
          <h3 class="p-3">Teacher Team</h3>
        </div>
        <div class="col-sm-3 mx-3 ">
          <div class="row mb-2 shadow" style="border-radius: 20px;background-color:#fffdd0">
            <h3 class="p-3">Present</h3>
          </div>
          <div class="row mb-2 shadow" style="border-radius: 20px;background-color:#fffdd0">
            <h3 class="p-3">Absent</h3>
          </div>

        </div>
      </div>
      <div class="row mx-2">
        <div class="col mx-2 shadow" style="border-radius: 20px;background-color:#fffdd0">
          <h3 class="p-3">Exams</h3>
        </div>
        <div class="col mx-2 shadow" style="border-radius: 20px;background-color:#fffdd0">
          <h3 class="p-3">Student Charts</h3>
        </div>
        
      </div>
      <div class="row mx-2 mt-3">
        <div class="col mb-3 mx-2 shadow" style="border-radius: 20px;background-color:#fffdd0">
          <h3 class="p-3">Materials Uploaded</h3>
        </div>
        <div class="col mx-2 mb-2 shadow" style="border-radius: 20px;background-color:#fffdd0">
          <h3 class="p-3">Student Charts</h3>
        </div>
        
      </div>
    </div>
  </div>

</body>

</html>