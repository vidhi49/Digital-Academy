<html>
<?php
include("../connect.php");
// $a='';
// session_start();
// include("change-header.php");
// $inst_id = $_SESSION['inst_id'];
// $inst_name = $_SESSION['name'];
?>

<head>
  <style>
  /* * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poopins", sans-serif;
  } */

  .institute-sidebar {
    /* position: absolute; */
    /* top: 0; */
    /* left: 0; */
    /* height: 100%; */
    width: 230px;
    background-color: #041562;
    padding: 50px 0px 16px 0px;
    /* padding: 6px 14px; */
    /* transition: all 0.5s ease; */
  }

  /* 
  .institute-sidebar.active {
    width: 75px;
  } */




  /* .institute-sidebar #btn {
    /* position: absolute; */
  /* color: #fff;
    left: 90%;
    top: 6px;
    font-size: 20px;
    height: 50px;
    width: 20px;
    text-align: center;
    line-height: 50px;
    transform: translate(-50%); */
  /* } */

  /* .institute-sidebar ul {
      margin-top: 20px;
  list-style: none;
  padding-left: 10px;
   } */

  .institute-sidebar ul li {
    position: relative;
    height: 60px;
    width: 100%;
    /* padding: 0; */
    /* margin: 5 5 0 0; */
    list-style: none;
    line-height: 50px;
    /* border-radius: 12px; */
  }

  .institute-sidebar .links_name {
    /* opacity: 0; */
    pointer-events: none;
    /* transition: all 0.5s ease; */
    display: none;
  }

  .institute-sidebar ul li a {
    color: #fff;
    /* display: flex; */
    /* align-items: center; */
    text-decoration: none;
    /* transition: all 0.4s ease; */
    /* border-radius: 20px; */
    /* border-top-left-radius: 20px; */
    /* border-bottom-left-radius: 20px; */
    /* white-space: nowrap; */
  }

  .institute-sidebar ul li a:hover {
    /* background: #fff; */
    color: #fff;
    font-size: 20px;
    transition: all 0.5s ease;
    /* margin-right: 8px; */
  }

  .institute-sidebar ul li a i {
    height: 50px;
    min-width: 50px;
    /* border-radius: 50px; */
    text-align: center;
  }

  /* li.active a i {
    background: #041562;
    border: 2px solid #fff;
    color: #fff;
    /* border-radius: 50px; */
  /* } */

  .institute-sidebar ul li.active {
    background-color: #eee;
    border-top-left-radius: 60px;
    border-bottom-left-radius: 60px;
  }

  .institute-sidebar ul li.active a {
    color: #11101d;
  }

  .institute-sidebar ul li.active a:hover {
    color: #11101d;
  }

  .institute-sidebar ul li.active a i {
    height: 50px;
    width: 50px;
    /* background: #041562; */
    border-radius: 50%;
    border-bottom-left-radius: 50%;
    border-top-left-radius: 50%;
    /* color: #eee; */
    /* margin: 5px 5px 5px 5px; */
  }

  .institute-sidebar ul li.active b:nth-child(1) {
    position: absolute;
    width: 100%;
    height: 20px;
    background: #eee;
    /* border-bottom-right-radius: 60px; */
    top: -20px;
    left: 0;
  }

  .institute-sidebar ul li.active b:nth-child(1)::after {
    position: absolute;
    content: '';
    width: 100%;
    height: 20px;
    background: #041562;
    border-bottom-right-radius: 60px;
    /* top: -20px; */
    left: 0;
  }

  .institute-sidebar ul li.active b:nth-child(2) {
    position: absolute;
    width: 100%;
    height: 20px;
    background: #eee;
    bottom: -20px;
    left: 0;
  }

  .institute-sidebar ul li.active b:nth-child(2)::after {
    position: absolute;
    content: '';
    width: 100%;
    height: 20px;
    background: #041562;
    border-top-right-radius: 60px;
    left: 0;
    /* bottom: -30px; */
  }

  .institute-sidebar.active~.content {
    /* width: calc(100% -75px); */
    /* left: 30px; */
    transition: all 0.3s ease;
  }

  @media only screen and (max-width: 500px) {

    .insttitute-sidebar {
      width: 50px;
      align-items: center;
      text-align: center;
      display: block;
    }

    .institute-content {
      width: calc(100vw - 50px);
      padding: 15px;
      margin: 0px;

    }

    .insttitute-sidebar .links_name {
      display: none;
    }
  }
  </style>
</head>

<body>
  <div class="institute-sidebar ps-2 " style="box-shadow: inset 0 10px 15px -6px black;">
    <div class="logo_conent">
      <div class="logo">
        <!-- <div class="logo_name">
            Academy
          </div> -->
      </div>
    </div>
    <ul class="nav nav-pills flex-column mb-sm-auto align-items-center align-items-sm-start">
      <li <?php
          if (($a == 'editprofile')) {
            echo "class=' active nav-item '";
          } ?>>
        <b></b>
        <b></b>
        <a href="editprofile.php" class="nav-link">
          <i class='fa fa-edit'></i>
          <span class="links_name d-sm-inline">Edit Profile</span>
        </a>
        <!-- <span class="tooltip">Edit</span> -->
      </li>

      <li class="list nav-item ">
        <b></b>
        <b></b>
        <a href="#" class="nav-link">

          <i class='fa fa-check'></i>
          <span class="links_name d-sm-inline">Dashbord</span>
        </a>
        <!-- <span class="tooltip">Dashbord</span> -->
      </li>
      <li <?php
          if (($a == 'changepassword')) {
            echo "class=' active nav-item '";
          } ?>>
        <b></b>
        <b></b>
        <a href="change-password.php" class="nav-link">
          <i class='fa fa-key'> </i>
          <span class="links_name d-sm-inline">Change Password</span>
        </a>
        <!-- <span class="tooltip">Register</span> -->
      </li>
      <li <?php
          if (($a == 'staffregister')) {
            echo "class=' active nav-item '";
          } ?>>
        <b></b>
        <b></b>
        <a href="staff-registration.php" class="nav-link">
          <i class='fa fa-registered'> </i>
          <span class="links_name d-sm-inline">Register staff</span>
        </a>
        <!-- <span class="tooltip">Register</span> -->
      </li>
      <li <?php
          if (($a == 'studentregister')) {
            echo "class=' active nav-item '";
          } ?>>
        <b></b>
        <b></b>
        <a href="student-registration.php" class="nav-link">
          <i class='fa fa-registered'></i>
          <span class="links_name d-sm-inline">Register student</span>
        </a>
        <!-- <span class="tooltip">Register</span> -->
      </li>
      <li <?php
          if (($a == 'class')) {
            echo "class=' active nav-item '";
          } ?>>
        <b></b>
        <b></b>
        <a href="create-class.php " class="nav-link">
          <i class='fa fa-plus'></i>
          <span class="links_name d-sm-inline">Create Class</span>
        </a>
        <!-- <span class="tooltip">Create</span> -->
      </li>
      <li <?php if (($a == 'subject')) {
            echo "class='list active nav-item '";
          } ?>>
        <b></b>
        <b></b>
        <a href="create-subject.php" class="nav-link">
          <i class='fa fa-plus'></i>
          <span class="links_name d-sm-inline">Create Subject</span>
        </a>
        <!-- <span class="tooltip">Create</span> -->
      </li>
      <li <?php if (($a == 'managestudent')) {
            echo "Class='list active nav-item '";
          } ?>>
        <b></b>
        <b></b>
        <a href="manage-student.php" class="nav-link">
          <i class='fa fa-tasks'></i>
          <span class="links_name d-sm-inline">Manage student</span>
        </a>
        <!-- <span class="tooltip">Manage</span> -->
      </li>
      <li <?php if (($a == 'managestaff')) {
            echo "Class='list active nav-item ' ";
          } ?>>
        <b></b>
        <b></b>
        <a href="manage-staff.php" class="nav-link">
          <i class='fa fa-tasks'></i>
          <span class="links_name d-sm-inline">Manage staff</span>
        </a>
        <!-- <span class="tooltip">Manage</span> -->
      </li>

      <li <?php if (($a == 'viewstudent')) {
            echo "class='list active nav-item '";
          } ?>>
        <b></b>
        <b></b>
        <a href="studentfilter.php" class="nav-link">
          <i class='fa fa-file'></i>
          <span class="links_name d-sm-inline">View Student</span>
        </a>
        <!-- <span class="tooltip">View</span> -->
      </li>
      <li <?php if (($a == 'viewstaff')) {
            echo "class='list active nav-item '";
          } ?>>
        <b></b>
        <b></b>
        <a href="stafffilter.php" class="nav-link">
          <i class='fa fa-file'></i>
          <span class="links_name d-sm-inline">View staff</span>
        </a>
        <!-- <span class="tooltip">View</span> -->
      </li>

      <li <?php if (($a == 'viewclassattedance')) {
            echo "class='list active nav-item '";
          } ?>>
        <b></b>
        <b></b>
        <a href="viewclassattedance.php" class="nav-link">
          <i class='fa fa-clock'></i>
          <span class="links_name d-sm-inline">Class Attedence</span>
        </a>
        <!-- <span class="tooltip">Attedance</span> -->
      </li>
      <li <?php if (($a == 'viewstudentattedance')) {
            echo "class='list active nav-item '";
          } ?>>
        <b></b>
        <b></b>
        <a href="viewstudentattedance.php" class="nav-link">
          <i class='fa fa-clock'></i>
          <span class="links_name d-sm-inline">Stud Attedance</span>
        </a>
        <!-- <span class="tooltip">Attedance</span> -->
      </li>
    </ul>

  </div>


</body>

</html>