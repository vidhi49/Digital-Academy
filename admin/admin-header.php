<?php
 
	session_start();
	$email=$_SESSION['email'];
?>

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="../css/style.css">
</head>
<nav class="navbar navbar-light bg-dark">
  <a class="navbar-brand">
    <img class='logo ms-1' src='../img/logo1.png' style=" height:100px" />
  </a>
  <form class="form-inline">
    <span style="height:30px;padding:0 20 0 0px;font-size:25;color:white"
      id="email"><?php echo $_SESSION['email'];?></span>
    <img class='logo ms-1' src='../img/p1.jpg' style=" height:80px;width:80px;border-radius:50px;padding:20" />
    <a href="admin-logout.php" class="btn btn-secondary btn-lg" role="button">Logout</a>
  </form>
</nav>