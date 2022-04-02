<?php
// include("admin-header.php");
include_once('../connect.php');
// session_start();
$email=$_SESSION['email'];
$q="select * from master_admin_tbl where Email='$email'";
$res=mysqli_query($con,$q);
$result=mysqli_fetch_array($res);
?>
<html>
<style>
  
  .admin-sidebar ul
  {
    padding: 15px;
  }
   .admin-sidebar ul li a{
    color:azure;
  }
  .admin-sidebar ul li{
    padding: 10px 30px 10px 30px;
    font-size: large;
    margin: 2px;
  }
  .admin-sidebar ul li:hover{
      background-color: #eee;
      border-radius: 10px;
  } 
  .admin-sidebar ul li:hover a{
    color:#041562;
  } 
  .admin-sidebar ul li.active{
      background-color: #eee;
      border-radius: 10px;
  } 
  .admin-sidebar ul li.active a{
    color:#041562;
  } 

</style>
<body  style="box-shadow: inset 0 10px 15px -6px black;">
  <!-- <div class="content"> -->
  <div class="row bg-navy-blue   width-sidebar p-2 pt-5  admin-sidebar" style="box-shadow: inset 0 10px 15px -6px black;">
    <!-- <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-sidebar"> -->
    <!-- <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 min-vh-100"> -->
    <!-- <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-decoration-none text-dark">
      <p class="fs-5 d-none d-sm-inline" aria-disabled="true">Menu</p>
    </a> -->
    <ul class="nav nav-pills flex-column mb-sm-auto">
      <?php
      if($result[4]=='1')
      {
      ?>
        <li <?php
          if (($a == 'addadmin')) {
            echo "class=' active nav-item m-1 '";
          } ?>>
        <a href="add-admin.php" class="nav-link  px-0">
          <i class="fas fa-user-plus fs-5"></i>
          <p class="ms-2 d-none d-sm-inline">Add Admin</p>
        </a>
      </li>
      <?php
      }
      ?>
      
      <li <?php
          if (($a == 'adminedit')) {
            echo "class=' active nav-item m-1 '";
          } ?>>
        <a href="admin-edit.php" class="nav-link align-middle px-0">
          <i class="fas fa-edit fs-5"></i>
          <p class="ms-2 d-none d-sm-inline">Edit Profile</p>
        </a>
      </li>
      <li <?php
          if (($a == 'changepwd')) {
            echo "class=' active nav-item m-1 '";
          } ?>>
        <a href="admin-changepwd.php" class="nav-link align-middle px-0">
          <i class="fas fa-key fs-5"></i>
          <p class="ms-2 d-none d-sm-inline">Change Password</p>
        </a>
      </li>
      
      
      <li <?php
          if (($a == 'allrequest')) {
            echo "class=' active nav-item m-1 '";
          } ?>>
        <a href="admin-home.php" class="nav-link align-middle px-0 ">
          <i class="fas fa-clipboard-list fs-5"></i>
          <p class="ms-2 d-none d-sm-inline">All Inquiry</p>
        </a>
      </li>
      <li <?php
          if (($a == 'pendingrequest')) {
            echo "class=' active nav-item m-1 '";
          } ?>>
        <a href="pending-request.php" class="nav-link align-middle px-0 ">
          <i class="fas fa-spinner fs-5"></i>
          <p class="ms-2 d-none d-sm-inline">Pending Request</p>
        </a>
      </li>
      <li <?php
          if (($a == 'approvedrequest')) {
            echo "class=' active nav-item m-1 '";
          } ?>>
        <a href="approval-request.php" class="nav-link  align-middle px-0 ">
          <i class="fas fa-check fs-5"></i>
          <p class="ms-2 d-none d-sm-inline ">Approved Request</p>
        </a>
      </li>
      <li <?php
          if (($a == 'rejectedrequest')) {
            echo "class=' active nav-item m-1 '";
          } ?>>
        <a href="rejected-request.php" class="nav-link align-middle px-0 ">
          <i class="far fa-window-close fs-5"></i>
          <p class="ms-2 d-none d-sm-inline">Rejected Request</p>
        </a>
      </li>
      <li <?php
          if (($a == 'institute')) {
            echo "class=' active nav-item m-1 '";
          } ?>>
        <a href="total-institute.php" class="nav-link align-middle px-0">
          <i class="fas fa-university fs-5"></i>
          <p class="ms-2 d-none d-sm-inline">Institute</p>
        </a>
      </li>
    </ul>

    <!-- <div class="dropdown pb-4">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
              id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
              <span class="d-none d-sm-inline mx-1">loser</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
              <li><a class="dropdown-item" href="#">New project...</a></li>
              <li><a class="dropdown-item" href="#">Settings</a></li>
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Sign out</a></li>
            </ul>
          </div> 
    </div> -->
  </div>
  <!-- </div> -->
  <!-- </div> -->

</body>

</html>