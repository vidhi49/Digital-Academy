<?php require('admin-header.php');?>
<html>

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
    crossorigin="anonymous" />
</head>

<body>
  <div class="container-fluid">
    <div class="row flex-nowrap">
      <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-sidebar">
        <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 min-vh-100">
           <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-decoration-none text-dark">
            <p class="fs-5 d-none d-sm-inline" aria-disabled="true">Menu</p>
          </a> 
          <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            <li class="nav-item m-1">
              <a href="add-admin.php" class="nav-link align-middle px-0 text-dark">
                <i class="fas fa-user-plus fs-5"></i>
                <p class="ms-2 d-none d-sm-inline">Add Admin</p>
              </a>
            </li>
            <li class="nav-item m-1">
              <a href="admin-home.php" class="nav-link align-middle px-0 text-dark">
                <i class="fas fa-clipboard-list fs-5"></i>
                <p class="ms-2 d-none d-sm-inline">All Inquiry</p>
              </a>
            </li>
            <li class="nav-item m-1">
              <a href="pending-request.php" class="nav-link align-middle px-0 text-dark">
                <i class="fas fa-spinner fs-5"></i>
                <p class="ms-2 d-none d-sm-inline">Pending Request</p>
              </a>
            </li>
            <li class="nav-item m-1">
              <a href="approval-request.php" class="nav-link  align-middle px-0 text-dark">
                <i class="fas fa-check fs-5"></i>
                <p class="ms-2 d-none d-sm-inline ">Approved Request</p>
              </a>
            </li>
            <li class="nav-item m-1">
              <a href="rejected-request.php" class="nav-link align-middle px-0 text-dark">
                <i class="far fa-window-close fs-5"></i>
                <p class="ms-2 d-none d-sm-inline">Rejected</p>
              </a>
            </li>
            <li class="nav-item m-1">
              <a href="total-institute.php" class="nav-link align-middle px-0 text-dark">
                <i class="fas fa-university fs-5"></i>
                <p class="ms-2 d-none d-sm-inline">Institute</p>
              </a>
            </li>
          </ul>
          <hr>
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
          </div> -->
        </div>
      </div>
    </div>
  </div>

</body>

</html>