<?php
$Id = $_SESSION['Id'];
$inst_id = $_SESSION['Inst_id'];
$que = "select * from class_tbl where Teacher_id='$Id' and Insti_id='$inst_id'";
$r = mysqli_query($con, $que);
$num = mysqli_num_rows($r);


?>

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Welcome </title>

  <!-- Bootstrap CSS CDN -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
    crossorigin="anonymous">
  <!-- jQuery CDN - Slim version (=without AJAX) -->
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script> -->
  <!-- Popper.JS -->

  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
  <script>
  $(document).ready(function() {

    $('#sidebarCollapse').on('click', function() {
      $('.teacher-sidebar').toggleClass('active');
    });

  });
  </script>
  <script>
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })
  </script>
</head>
<style>
  body {
    font-family: 'Poppins', sans-serif;
    background: #fafafa;
  }

  p {
    font-family: 'Poppins', sans-serif;
    font-size: 1.1em;
    font-weight: 300;
    line-height: 1.7em;
    color: #999;
  }

  a,
  a:hover,
  a:focus {
    color: white;
    text-decoration: none;
    transition: all 0.3s;
  }

  .teacher-sidebar {
    /* don't forget to add all the previously mentioned styles here too */
    /* background-color: #041562; */
    color: #fff;
    transition: all 0.3s;
  }

  .teacher-sidebar .teacher-sidebar-header {
    padding: 20px;
    /* background: #6d7fcc; */
  }

  .teacher-sidebar ul.components {
    padding: 20px 0;
    border-bottom: 1px solid #47748b;
  }

  .teacher-sidebar ul p {
    color: #fff;
    padding: 10px;
  }

  .teacher-sidebar ul li a {
    padding: 10px;
    font-size: 1.1em;
    display: block;
  }

  .teacher-sidebar ul li a:hover {
    color: navy;
    background: #fff;
  }

  .teacher-sidebar ul li.active>a,
  a[aria-expanded="true"] {
    color: #fff;
    background: navy;
  }

  ul ul a {
    font-size: 0.9em !important;
    padding-left: 30px !important;
    /* background: #6d7fcc; */
  }

  .wrapper {
    display: flex;
    width: 230px;
    align-items: stretch;
  }

  .teacher-sidebar {
    /* width: 250px; */
    /* max-width: 250px; */
    /* min-height: 100vh; */
    height: 100vh;
  }

  a[data-toggle="collapse"] {
    position: relative;
  }

  .dropdown-toggle::after {
    display: block;
    position: absolute;
    top: 50%;
    right: 20px;
    transform: translateY(-50%);
  }

  /* 
  .teacher-sidebar.active {
    margin-left: -250px;
  } */

  @media (max-width: 768px) {
    /* 
    .teacher-sidebar {
      margin-left: -250px;
    } */

    .wrapper {
      width: calc(100vw - 230px);
    }

    .li-name {
      display: none;
    }

    ul ul a {
      padding-left: 2px !important;
    }

    .teacher-sidebar.active {
      margin-left: 0;
    }
  }
</style>

<body>
  <div class="wrapper" style="background-color: #041562;box-shadow: inset 0 10px 35px -7px black;">
    <!-- Sidebar -->
    <nav id="teacher-sidebar" class="teacher-sidebar">
      <!-- <div class="teacher-sidebar-header">
        <h3>Bootstrap Sidebar</h3>
        <nav class="navbar navbar-expand-sm navbar-light float-right">
        <div class="container-fluid">
            <button type="button" id="sidebarCollapse" class="btn text-secondary">
              <i class="fas fa-align-justify"></i>
               <span>Toggle Sidebar</span> -->
      <!-- </button> -->

      <!-- </div> 
        </nav>
      </div> -->
      <ul class="list-unstyled components mt-5">
        <!-- <p>Dummy Heading</p> -->

        <li class="m-2">
          <a href="teacher-home.php"  data-toggle="tooltip" title="Dashboard">
            <i class="fas fa-home me-2 fs-5"></i><span class="li-name">Dashboard</span></a>
        </li>

        
        <li class="m-2">
          <a href="institute_info.php" data-toggle="tooltip" title="Question Bank">
            <i class="fas fa-university me-2 fs-5"></i><span class="li-name"> Institute Information
              </span></a>
        </li>
        <li class="m-2">
          <a href="view_profile.php" data-toggle="tooltip" title="Question Bank">
            <i class="fas fa-users me-2 fs-5"></i><span class="li-name"> View Profile
              </span></a>
        </li>
        <li class="m-2">
          <a href="change_pwd.php" data-toggle="tooltip" title="Question Bank">
            <i class="fas fa-question me-2 fs-5"></i><span class="li-name"> Change Password
              </span></a>
        </li>



        <?php
          if($num>0)
          {
            echo '<li class="m-2">
            <a href="takeattedance.php" data-toggle="tooltip" title="Question Bank">
              <i class="fas fa-hand-point-up me-2 fs-5"></i><span class="li-name"> Attendance </span></a>
          </li>';
          }
        
        ?>


        

        <li class="m-2">
          <a href="material.php" data-toggle="tooltip" title="Question Bank">
            <i class="fas fa-sticky-note me-2 fs-5"></i><span class="li-name"> Upload Material </span></a>
        </li>
        
        <li class="m-2">
          <a href="viewstudent.php">
            <i class="fas fa-users me-2 fs-5"></i> <span class="li-name">View Student</span></a>
        </li>

        


        <li class="m-2">
          <a href="viewclasses.php">
            <i class="fas fa-users me-2 fs-5"></i> <span class="li-name">View Class</span></a>
        </li>
        <li class="m-2">
          <a href="question-bank.php" data-toggle="tooltip" title="Question Bank">
            <i class="fas fa-question me-2 fs-5"></i><span class="li-name"> Question
              Bank</span></a>
        </li>
        <li class="active m-2">
          <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <i class="far fa-file-alt me-2 fs-5"></i> <span class="li-name">Exam </span></a>
          <ul <?php
              if ($page == 'exam') {
                echo 'class=" list-unstyled"';
              } else {
                echo 'class="collapse "';
              }
              ?> id="homeSubmenu">
            <li>
              <a href="question-bank.php">
                <span>Add Question</span>
              </a>
            </li>
            <li>
              <a href="manageExam.php"><span> Manage Exam</span></a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
  <!-- <div id="content">
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
      <div class="container">
        <button type="button" id="sidebarCollapse" class="btn btn-info">
          <i class="fas fa-align-left"></i>
          <span>Toggle Sidebar</span>
        </button>

      </div>
    </nav>
  </div> -->

</body>


</html>