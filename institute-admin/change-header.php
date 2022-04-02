<?php
include("../connect.php");
session_start();
$email = $_SESSION['email'];
$inst_id=$_SESSION['inst_id'];
$q="select * from institute_tbl where Id='$inst_id'";
$res=mysqli_query($con,$q);
$r=mysqli_fetch_array($res);
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" crossorigin="anonymous" />
  <link rel="stylesheet" href="../css/style.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <div class="container-fluid " >
  <!-- style='box-shadow: black 0px 3px 80px;' -->
    <div class="row bg-navy-blue"  style="box-shadow:  0 10px 15px -6px black;">
      <div class="col-sm-6 d-flex">
        <img class='logo ms-1' style="border-radius:50%;margin:10px" height="100" width="100" src='../Institute-logo/<?php echo $r['Logo']; ?>'/>
        <span class="h-25 fs-2 text-light" style="padding: 35px;" id="email"><?php echo  $r['Name']; ?></span>
      </div>
      <div class="col-sm-6 d-flex justify-content-end align-items-center">
        <div class="d-block">
          
          <span class="h-25 pe-3  text-light" id="email"><?php echo  $r['Email']; ?></span>
        </div>
        <a href="../institute-admin/institute-logout.php" class="btn btn-secondary" role="button">logout</a>
      </div>
    </div>

  </div>
</body>

</html>