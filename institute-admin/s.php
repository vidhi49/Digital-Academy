<?php
// include("admin-header.php");
include_once('../connect.php');
// include("change-header.php");
// session_start();
$a = "";

?>
<html>
<style>
  .admin-sidebar .nav {
    padding: 15px 0px 15px 30px;
  }

  .admin-sidebar .nav .nav-item {
    position: relative;
  }

  .admin-sidebar .nav .nav-item a {
    color: azure;
  }

  .admin-sidebar .nav .nav-item {
    padding: 10px 0px 10px 30px;
    font-size: large;
    margin: 5px 0px;
  }

  .admin-sidebar .nav .nav-item:hover {
    background-color: #FFD124;
    border-radius: 30px 0px 0px 30px;
    /* margin:0px 10px 0px 0px; */
    margin-right: 10px;
  }

  .admin-sidebar .nav .nav-item:hover a {
    color: #041562;
  }

  .admin-sidebar .nav .nav-item.active {
    background-color: white;
    border-radius: 30px 0px 0px 30px;
    /* border-bottom-right-radius: 10px; */
  }

  .admin-sidebar .nav .nav-item.active a {
    color: #041562;
  }

  .admin-sidebar .nav .nav-item.active b:nth-child(1) {
    position: absolute;
    width: 100%;
    height: 10px;
    /* justify-content: end; */
    background: #f2f6fa;
    /* border-bottom-right-radius: 60px; */
    top: -10px;
    left: 0px;
    /* right: 0; */
  }

  .admin-sidebar .nav .nav-item.active b:nth-child(1)::after {
    position: absolute;
    content: '';
    width: 100%;
    height: 10px;
    background: #041562;
    border-bottom-right-radius: 60px;
    /* top: -20px; */
    left: 0;
  }

  .admin-sidebar .nav .nav-item.active b:nth-child(2) {
    position: absolute;
    width: 100%;
    height: 10px;
    background: #f2f6fa;
    bottom: -10px;
    left: 0;
  }

  .admin-sidebar .nav .nav-item.active b:nth-child(2)::after {
    position: absolute;
    content: '';
    width: 100%;
    height: 10px;
    background: #041562;
    border-top-right-radius: 60px;
    left: 0;
    /* bottom: -30px; */
  }
</style>

<body>
  <!-- <div class="content"> -->
  <div class="row bg-navy-blue pt-5 admin-sidebar" style="box-shadow: inset 0 10px 35px -7px black;border-radius: 0px 150px 0px 0px;">
    <!-- <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-sidebar"> -->
    <!-- <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 min-vh-100"> -->
    <!-- <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-decoration-none text-dark">
      <p class="fs-5 d-none d-sm-inline" aria-disabled="true">Menu</p>
    </a> -->
    <ul class="nav nav-pills flex-column mb-sm-auto">
      <li <?php
          if (($a == 'admindashboard')) {
            echo "class=' active nav-item '";
          } else {
            echo "class='nav-item'";
          } ?>>
        <a href="admin-dashboard.php" class="nav-link align-middle px-0 ">
          <i class="fa fa-th-large" aria-hidden="true"></i>
          <p class="ms-2 d-none d-sm-inline">Dashboard</p>
        </a>
      </li>
      <li <?php
          if (($a == 'adminedit')) {
            echo "class=' active nav-item  '";
          } else {
            echo "class='nav-item'";
          } ?>>
        <b></b>
        <b></b>
        <a href="admin-edit.php" class="nav-link align-middle px-0">
          <i class="fas fa-edit fs-5"></i>
          <p class="ms-2 d-none d-sm-inline">Edit Profile</p>
        </a>
      </li>
      <li <?php
          if (($a == 'changepwd')) {
            echo "class=' active nav-item '";
          } else {
            echo "class='nav-item'";
          } ?>>
        <a href="admin-changepwd.php" class="nav-link align-middle px-0">
          <i class="fas fa-key fs-5"></i>
          <i class="fa-solid fa-table-list"></i>
          <p class="ms-2 d-none d-sm-inline">Change Password</p>
        </a>
      </li>


      <li class="active nav-item ">
        <b></b>
        <b></b>
        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link  align-middle px-0">
        <div class="d-flex justify-content-between">
          <div>
          <i class="fas fa-hotel fs-5"></i>
         
         <p class="ms-2 d-none d-sm-inline">Classes</p>
          </div>
         
          <i class="fa fa-caret-down mr-5" aria-hidden="true"></i>
          </div>
          
        </a>
      </li>
      <ul class="collapse list-unstyled pl-5" id="submenu1"  >        
        <li class="p-0">
          <a href="institute-dashboard.php" class="nav-link text-light">Add class</a>
        </li>
        <li class="p-0">
          <a href="#" class="nav-link text-light">Allocate Class</a>
        </li>
        <li class="p-0">
          <a href="#" class="nav-link text-light">View Class</a>
        </li>

      </ul>
      <li class=" nav-item ">
        <b></b>
        <b></b>
        <a href="#submenu2" data-bs-toggle="collapse" class="nav-link  align-middle px-0">
        <div class="d-flex justify-content-between">
          <div>
          <i class="fas fa-address-book fs-5"></i>
         
         <p class="ms-2 d-none d-sm-inline">Subject</p>
          </div>
         
          <i class="fa fa-caret-down mr-5" aria-hidden="true"></i>
          </div>
          
        </a>
      </li>
      <ul class="collapse list-unstyled pl-5" id="submenu2"  >        
        <li class="p-0">
          <a href="#" class="nav-link text-light">Add Subject</a>
        </li>
        <li class="p-0">
          <a href="#" class="nav-link text-light">Allocate Subject</a>
        </li>
        <li class="p-0">
          <a href="#" class="nav-link text-light">View Subject</a>
        </li>

      </ul>
      <li class=" nav-item ">
        <b></b>
        <b></b>
        <a href="#submenu3" data-bs-toggle="collapse" class="nav-link  align-middle px-0">
        <div class="d-flex justify-content-between">
          <div>
          <i class="fas fa-users fs-5"></i>
         
         <p class="ms-2 d-none d-sm-inline">Staff</p>
          </div>
         
          <i class="fa fa-caret-down mr-5" aria-hidden="true"></i>
          </div>
          
        </a>
      </li>
      <ul class="collapse list-unstyled pl-5" id="submenu3"  >        
        <li class="p-0">
          <a href="#" class="nav-link text-light">Register Staff</a>
        </li>
        <li class="p-0">
          <a href="#" class="nav-link text-light">Manage Staff</a>
        </li>
        <li class="p-0">
          <a href="#" class="nav-link text-light">View Staff</a>
        </li>

      </ul>
      <li class=" nav-item ">
        <b></b>
        <b></b>
        <a href="#submenu4" data-bs-toggle="collapse" class="nav-link  align-middle px-0">
        <div class="d-flex justify-content-between">
          <div>
          <i class="fas fa-user-graduate fs-5"></i>
         
         <p class="ms-2 d-none d-sm-inline">Student</p>
          </div>
         
          <i class="fa fa-caret-down mr-5" aria-hidden="true"></i>
          </div>
          
        </a>
      </li>
      <ul class="collapse list-unstyled pl-5" id="submenu4"  >        
        <li class="p-0">
          <a href="#" class="nav-link text-light">Register Student</a>
        </li>
        <li class="p-0">
          <a href="#" class="nav-link text-light">Manage Student</a>
        </li>
        <li class="p-0">
          <a href="#" class="nav-link text-light">View Student</a>
        </li>
      </ul>
      <li class=" nav-item ">
        <b></b>
        <b></b>
        <a href="#submenu5" data-bs-toggle="collapse" class="nav-link  align-middle px-0">
        <div class="d-flex justify-content-between">
          <div>
          <i class="fas fa-clock fs-5"></i>
         
         <p class="ms-2 d-none d-sm-inline">Attendance</p>
          </div>
         
          <i class="fa fa-caret-down mr-5" aria-hidden="true"></i>
          </div>
          
        </a>
      </li>
      <ul class="collapse list-unstyled pl-5" id="submenu5"  >        
        <li class="p-0">
          <a href="#" class="nav-link text-light">Class Attendance</a>
        </li>
        <li class="p-0">
          <a href="#" class="nav-link text-light">Student Attedance</a>
        </li>
      </ul>

    
    <li class=" nav-item ">
        <b></b>
        <b></b>
        <a href="#submenu6" data-bs-toggle="collapse" class="nav-link  align-middle px-0">
        <div class="d-flex justify-content-between">
          <div>
          <i class="fas fa-receipt fs-5"></i>
         
         <p class="ms-2 d-none d-sm-inline">Fees</p>
          </div>
         
          <i class="fa fa-caret-down mr-5" aria-hidden="true"></i>
          </div>
          
        </a>
      </li>
      <ul class="collapse list-unstyled pl-5" id="submenu6"  >        
        <li class="p-0">
          <a href="#" class="nav-link text-light">Add Fees</a>
        </li>
        
        <li class="p-0">
          <a href="#" class="nav-link text-light">Add Student Fees</a>
        </li>
        <li class="p-0">
          <a href="#" class="nav-link text-light">Payement Reports</a>
        </li>
      </ul>

    </ul>

  </div>

</body>

</html>