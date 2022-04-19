<?php
// session_start();
include('../connect.php');
session_start();
$email = $_SESSION['email'];
$id = $_SESSION['Id'];
$insti_id = $_SESSION['Inst_id'];
$q1 = "select * from institute_tbl where Id='$insti_id'";
$result1 = mysqli_query($con, $q1);
$r1 = mysqli_fetch_array($result1);
$q = "select * from staff_tbl where Id='$id' AND Inst_id='$insti_id'";
$result = mysqli_query($con, $q);
$r = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Institute Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous">
  </script>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" /> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="../css/style.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <!-- style='box-shadow: black 0px 3px 80px;' -->
      <!-- <img class='logo ms-1' style="border-radius:50%;margin:10px" height="100" width="100" src='../Institute-admin/staff_profile/<?php echo 'Welcome'; ?>'/> -->

  <!-- <div class="row bg-navy-blue" style=" height:70px;box-shadow:  10px 10px 20px 0px grey;">
    <div class="col-sm-6 pt-3">
      <h3><span class=" fs-3 px-4 justify-items-center text-light"
          id="email"><?php echo 'Welcome,  ' . $r['Name'] . '  !'; ?></span></h3>
    </div>
    <div class="col-sm-6 d-flex justify-content-end align-items-center">
      <div class="d-block">

        <span class="h-25 pe-3  text-light" id="email"><?php echo $r['Email']; ?></span>
      </div>
      <img class='logo ms-1' style="border-radius:10%;margin:10px" height="50" width="50"
        src='../Institute-admin/staff_profile/<?php echo $r['Profile']; ?>' />
      <a href="../teacher/teacher-logout.php" class="btn btn-secondary" role="button">logout</a>
    </div>
  </div> -->
  <nav class="navbar navbar-expand-sm bg-navy-blue navbar-dark py-1" style="box-shadow:  10px 10px 20px 0px black;">
    <div class="container-fluid ">
      <div class="div d-flex   justify-content-left ">
      <img class='logo navbar-brand ms-5' src='../Institute-logo/<?php echo $r1[10]?>' style=" height:200px;width:100px;border-radius:50px;" />
      <div class="text-light fs-1 pt-3">
      <?php echo $r1['Name']?>
      </div>
      </div>
      
     
      <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button> -->

      <!-- <div class="collapse navbar-collapse " id="collapsibleNavbar"> -->
      <ul class="navbar-nav justify-content-end fs-6">
        <li class="nav-item dropdown text-light">
          <!-- <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button"
            data-bs-toggle="dropdown" aria-expanded="false"> -->
            <?php echo $_SESSION['email']; ?>
            <img class='logo ms-1' src='../img/p1.jpg' style=" height:50px;width:50px;border-radius:50px;padding:20" />
            
          <!-- </a> -->

          <!-- <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown"> -->
            <a href="../teacher/teacher-logout.php" class="btn btn-secondary" role="button">logout</a>
          <!-- </ul> -->
        </li>
      </ul>
      <!-- </div> -->
    </div>
  </nav>
</body>

</html>