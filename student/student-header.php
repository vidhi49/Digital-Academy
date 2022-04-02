<?php

session_start();
$email = $_SESSION['email'];
?>
<html>

<head>
  <title> DGSkool </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous">
  </script>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" /> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    crossorigin="anonymous" />

</head>

<body>
  <!-- <nav class="navbar navbar-light bg-dark">
    <a class="navbar-brand">
      <img class='logo ms-1' src='../img/logo1.png' style=" height:100px" />
    </a>
    <form class="form-inline">
      <span style="height:30px;padding:0 20 0 0px;font-size:25;color:white"
        id="email"><?php echo $_SESSION['email']; ?></span>
      <img class='logo ms-1' src='../img/p1.jpg' style=" height:80px;width:80px;border-radius:50px;padding:20" />
      <a href="admin-logout.php" class="btn btn-secondary btn-lg" role="button">Logout</a>
    </form>
  </nav> -->
  <nav class="navbar navbar-expand-sm bg-navy-blue navbar-dark py-1">
    <div class="container-fluid">
      <img class='logo navbar-brand ms-5' src='../img/logo1.png' />
      <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button> -->

      <!-- <div class="collapse navbar-collapse " id="collapsibleNavbar"> -->
      <ul class="navbar-nav justify-content-end fs-6">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            <img class='logo ms-1' src='../img/p1.jpg' style=" height:80px;width:80px;border-radius:50px;padding:20" />
            <?php echo $_SESSION['email']; ?>
          </a>

          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="#">Logout</a></li>
          </ul>
        </li>
      </ul>
      <!-- </div> -->
    </div>
  </nav>
</body>

</html>