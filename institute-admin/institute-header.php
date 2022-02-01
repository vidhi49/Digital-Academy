<?php
	session_start();
	$email=$_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <nav class="navbar navbar-light bg-dark ps-5 ">
    <a class="navbar-brand">
      <img class='logo ms-1' src='../img/logo1.png' style=" height:100px" />
    </a>
    <form class="form-inline">
      <span class="h-25 pe-3 fs-2 text-light" id="email"><?php echo $_SESSION['email'];?></span>
      <img class='logo ms-1 p-3 w-50' src='../img/p1.jpg' />
      <a href="logout.php" class="btn btn-secondary btn-lg m-3" role="button">Logout</a>
    </form>
  </nav>
</body>

</html>