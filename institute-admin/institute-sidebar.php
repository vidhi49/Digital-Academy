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
  /* * { */
  /* margin: 0; */
  /* padding: 0; */
  /* box-sizing: border-box; */
  /* font-family: "Poopins", sans-serif; */
  /* } */

  .institute-sidebar {
    /* position: absolute; */
    /* top: 0; */
    /* left: 0; */
    /* height: 100%; */
    width: 250px;
    background-color: #041562;
    /* padding: 6px 0px 16px 0px; */
    /* padding: 6px 14px; */
    /* transition: all 0.5s ease; */
  }

  /* 
  .institute-sidebar.active {
    width: 75px;
  } */

  .institute-sidebar .logo_conent .logo {
    color: #fff;
    display: flex;
    height: 50px;
    width: 100%;
    align-items: center;
    /* opacity: 0; */
    pointer-events: none;
    transition: all 0.5s ease;
  }

  .institute-sidebar.active .logo_conent .logo {
    opacity: 0;
    pointer-events: none;
  }

  .logo_conent .logo i {
    font-size: 28px;
  }

  .logo_conent .logo .logo_name {
    font-size: 25px;
    font-weight: 400;
  }

  .institute-sidebar ul li.active {
    background-color: #fff;
    border-top-left-radius: 20px;
    border-bottom-left-radius: 20px;
  }

  .institute-sidebar ul li.active a {
    color: #11101d;
  }

  .institute-sidebar ul li.active a:hover {
    color: #11101d;
  }

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
      /* margin-top: 20px; */
  /* list-style: none; */
  /* padding-left: 10px; */
  /* } */

  .institute-sidebar ul li {
    /* position: relative; */
    height: 60px;
    width: 100%;
    /* padding: 0; */
    /* margin: 5 5 0 0; */
    list-style: none;
    line-height: 50px;
    border-radius: 12px;
  }

  .institute-sidebar .links_name {
    /* opacity: 0; */
    pointer-events: none;
    /* transition: all 0.5s ease; */
    display: none;
  }

  .institute-sidebar ul li a {
    color: #fff;
    display: flex;
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
    border-radius: 12px;
    line-height: 50px;
    text-align: center;
  }

  li.active a i {
    background: #041562;
    border: 2px solid #fff;
    color: #fff;
    border-radius: 20px;
  }


  .institute-sidebar.active~.content {
    /* width: calc(100% -75px); */
    /* left: 30px; */
    transition: all 0.3s ease;
  }

  @media only screen and (max-width: 500px) {

    .insttitute-sidebar {
      width: 20px;
    }

    .institute-content {
      width: calc(100vw - 100px);
    }

    .insttitute-sidebar .links_name {
      display: none;
    }
  }
  </style>
</head>

<body>
  <div class="institute-sidebar">
    <div class="logo_conent">
      <div class="logo">
        <!-- <div class="logo_name">
            Academy
          </div> -->
      </div>
    </div>
    <ul class="nav nav-pills flex-column mb-sm-auto align-items-center align-items-sm-start">
      <li class="list nav-item ">
        <a href="#" class="nav-link">
          <i class='fa fa-edit'></i>
          <span class="links_name d-sm-inline">Edit Profile</span>
        </a>
        <!-- <span class="tooltip">Edit</span> -->
      </li>

      <li class="list nav-item ">
        <a href="#" class="nav-link">
          <i class='fa fa-check'></i>
          <span class="links_name d-sm-inline">Dashbord</span>
        </a>
        <!-- <span class="tooltip">Dashbord</span> -->
      </li>
      <li class="list nav-item ">

        <a href="#" class="nav-link">
          <i class='fa fa-check'> </i>
          <span class="links_name d-sm-inline">Register staff</span>
        </a>
        <!-- <span class="tooltip">Register</span> -->
      </li>
      <li class="list nav-item ">

        <a href="#" class="nav-link">
          <i class='fa fa-check'></i>
          <span class="links_name d-sm-inline">Register student</span>
        </a>
        <!-- <span class="tooltip">Register</span> -->
      </li>
      <li <?php
          if (($a == 'class')) {
            echo "Class='list active nav-item '";
          } ?>>

        <a href="create-class.php " class="nav-link">
          <i class='fa fa-check'></i>
          <span class="links_name d-sm-inline">Create Class</span>
        </a>
        <!-- <span class="tooltip">Create</span> -->
      </li>
      <li <?php if (($a == 'subject')) {
            echo "Class='list active nav-item '";
          } ?>>

        <a href="create-subject.php" class="nav-link">
          <i class='fa fa-check'></i>
          <span class="links_name d-sm-inline">Create Subject</span>
        </a>
        <!-- <span class="tooltip">Create</span> -->
      </li>
      <li <?php if (($a == 'managestudent')) {
            echo "Class='list active nav-item '";
          } ?>>

        <a href="manage-student.php" class="nav-link">
          <i class='fa fa-check'></i>
          <span class="links_name d-sm-inline">Manage student</span>
        </a>
        <!-- <span class="tooltip">Manage</span> -->
      </li>
      <li <?php if (($a == 'managestaff')) {
            echo "Class='list active nav-item ' ";
          } ?>>

        <a href="manage-staff.php" class="nav-link">
          <i class='fa fa-check'></i>
          <span class="links_name d-sm-inline">Manage staff</span>
        </a>
        <!-- <span class="tooltip">Manage</span> -->
      </li>

      <li <?php if (($a == 'viewstudent')) {
            echo "Class='list active nav-item '";
          } ?>>

        <a href="studentfilter.php" class="nav-link">
          <i class='fa fa-check'></i>
          <span class="links_name d-sm-inline">View Student</span>
        </a>
        <!-- <span class="tooltip">View</span> -->
      </li>
      <li <?php if (($a == 'viewstaff')) {
            echo "Class='list active nav-item '";
          } ?>>

        <a href="stafffilter.php" class="nav-link">
          <i class='fa fa-check'></i>
          <span class="links_name d-sm-inline">View staff</span>
        </a>
        <!-- <span class="tooltip">View</span> -->
      </li>

      <li class="list nav-item ">
        <a href="#" class="nav-link">
          <i class='fa fa-check'></i>
          <span class="links_name d-sm-inline">Attedence</span>
        </a>
        <!-- <span class="tooltip">Attedance</span> -->
      </li>
    </ul>

  </div>


</body>

</html>