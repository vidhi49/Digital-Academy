<?php
// session_start();
include('../connect.php');
$email = $_SESSION['email'];
$id = $_SESSION['Id'];
$insti_id = $_SESSION['Inst_id'];
$q = "select * from staff_tbl where Id='$id'";
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="../css/style.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <div class="">
    <!-- style='box-shadow: black 0px 3px 80px;' -->
    <div class="row bg-white" style=" height:70px;box-shadow:  10px 10px 20px 0px grey;">
      <!-- <div class="col-sm-6 d-flex">
        <img class='logo ms-1' style="border-radius:50%;margin:10px" height="100" width="100" src='../Institute-admin/staff_profile/<?php echo $_SESSION['logo']; ?>'/>
        <span class="h-25 fs-2 text-light" style="padding: 35px;" id="email"><?php echo $_SESSION['Inst_id']; ?></span>
      </div> -->
      <div class="col d-flex justify-content-end align-items-center">
        <div class="d-block">

          <span class="h-25 pe-3  text-dark" id="email"><?php echo $_SESSION['email']; ?></span>
        </div>
        <img class='logo ms-1' style="border-radius:10%;margin:10px" height="50" width="50"
          src='../Institute-admin/staff_profile/<?php echo $r['Profile']; ?>' />
        <a href="../teacher/teacher-logout.php" class="btn btn-secondary" role="button">logout</a>
      </div>
    </div>

  </div>
</body>

</html>