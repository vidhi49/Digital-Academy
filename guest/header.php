<!DOCTYPE html>
<html lang="en">

<head>
  <!-- <title>Welcome Guest</title> -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>
<style>
.nav-item::after {
  content: '';
  display: block;
  width: 0px;
  height: 2px;
  background: #fec400;
  transition: 0.2s;
}

.nav-link:hover {
  transform: scale(1.3);
}


.nav-item:hover::after {
  width: 100%;
}

.navbar-dark .navbar-nav .active>.nav-link,
.navbar-dark .navbar-nav .nav-link.active,
.navbar-dark .navbar-nav .nav-link.show,
.navbar-dark .navbar-nav .show>.nav-link,
.navbar-dark .navbar-nav .nav-link:focus,
.navbar-dark .navbar-nav .nav-link:hover {
  color: #fec400;
  font-weight: bold;
  /* font-size: large; */
}
</style>

<body>
  <nav class="navbar navbar-expand-sm bg-navy-blue navbar-dark py-1">
    <div class="container-fluid">
      <img class='logo navbar-brand ms-5 ' src='../img/logo1.png' />
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="justify-content-end collapse navbar-collapse " id="collapsibleNavbar">
        <ul class="navbar-nav fs-6">
          <li class="nav-item m-2">
            <a class="nav-link  " href="home.php">Home</a>
          </li>
          <li class="nav-item m-2">
            <a class="nav-link " href="inquiry.php">Inquiry</a>
          </li>
          <li class="nav-item m-2">
            <a class="nav-link " href="login.php">Login</a>
          </li>
          <li class="nav-item m-2">
            <a class="nav-link " href="aboutus.php">About Us</a>
          </li>
          <li class="nav-item m-2">
            <a class="nav-link " href="contactus.php">Contact Us</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

</body>

</html>