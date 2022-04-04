<?php
include('../connect.php');
// include('../institute-admin/institute-header.php');
?>
<html>

<head>
  <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
  .stud-sidebar-body {
    background-color: #041562;
  }

  .nav-link:hover {
    background-color: #525252 !important
  }

  .nav-link .fa {
    transition: all 1s
  }

  .nav-link:hover .fa {
    transform: rotate(360deg)
  }

  .student-sidebar {
    /* position: absolute; */
    /* top: 0; */
    /* left: 0; */
    /* height: 100%; */
    width: 250px;
    background-color: #041562;
    /* padding: 50px 0px 16px 0px; */
    /* padding: 6px 14px; */
    /* transition: all 0.5s ease; */
  }

  .student-sidebar ul li.active {
    color: #fff;
    background-color: #0d6efd;
  }

  @media only screen and (max-width: 500px) {

    .student-sidebar {
      width: 50px;
      align-items: center;
      text-align: center;
      display: block;
    }

    .student-content {
      width: calc(100vw - 50px);
      padding: 5px;
      /* margin: 0px; */
    }

    .student-sidebar .span {
      display: none;
    }
  }
  </style>
  <script>
  /* Code for changing active 
  link on clicking */
  var btns =
    $("#student-sidebar .nav-pills .nav-item ");
  console.log(btns);
  for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click",
      function() {
        var current = document
          .getElementsByClassName("active");

        current[0].className = current[0]
          .className.replace(" active", "");

        this.className += " active";
      });
  }
  </script>
</head>

<body class="stud-sidebar-body">
  <div class="d-flex flex-column student-sidebar vh-100 flex-shrink-0 p-3 text-white" id='student-sidebar'> <a href="/"
      class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none"> <svg class="bi me-2"
        width="40" height="32"> </svg> <span class="fs-4 span">BBBootstrap</span> </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item"> <a href="#" class="nav-link active p-2 m-2" aria-current="page"> <i
            class="fa fa-home"></i><span class="ms-2 span">Home</span> </a> </li>
      <li> <a href="student-dashboard.php" class="nav-link text-white p-2 m-2">
          <i class="fa fa-tachometer fa-rotate-90	"></i>
          <span class="ms-1 span">Dashboard</span>
        </a> </li>
      <li> <a href="#" class="nav-link text-white p-2 m-2"> <i class="fa fa-cog"></i><span
            class="ms-2 span">Settings</span>
        </a>
      </li>
      <li> <a href="studentExam.php" class="nav-link text-white p-2 m-2"> <i class="fa fa-bell"></i><span
            class="ms-2 span">Exam</span>
        </a>
      </li>
    </ul>
    <hr>
    <div class="dropdown"> <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
        id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false"> <img src="https://github.com/mdo.png" alt=""
          width="32" height="32" class="rounded-circle me-2"> <strong> John W </strong> </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href="#">New project</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <li><a class="dropdown-item" href="#">Sign out</a></li>
      </ul>
    </div>
  </div>
</body>

</html>