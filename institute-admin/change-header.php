<?php
	session_start();
	$email=$_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Institute Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <div class="container-fluid bg-navy-blue">
    <div class="row">
      <div class="col-sm-6"><img class='logo ms-1' src='../Institute-logo/<?php echo $_SESSION['logo'];?>' style=" height:100px" /></div>
      <div class="col-sm-6 d-flex justify-content-end align-items-center">
        <div class= "d-block">
        <span class="h-25 pe-3 fs-2 text-light"
          id="email"><?php echo $_SESSION['name'];?></span>
        <span class="h-25 pe-3  text-light"
          id="email"><?php echo $_SESSION['email'];?></span>
        </div>
        <a href="institute-logout.php" class="btn btn-secondary" role="button">log</a>
      </div>
    </div>
  </div>
</body>

</html>