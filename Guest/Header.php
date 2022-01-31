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
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark py-1">
    <div class="container-fluid">
      <img class='logo navbar-brand ms-5' src='../img/logo1.png' />
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="justify-content-end collapse navbar-collapse " id="collapsibleNavbar">
        <ul class="navbar-nav fs-6">
          <li class="nav-item m-2">
            <a class="nav-link  " href="#">Home</a>
          </li>
          <li class="nav-item m-2">
            <a class="nav-link " href="SignUp.php">Register</a>
          </li>
          <li class="nav-item m-2">
            <a class="nav-link " href="Login.php">Login</a>
          </li>
          <li class="nav-item m-2">
            <a class="nav-link " href="Aboutus.php">About Us</a>
          </li>
          <li class="nav-item m-2">
            <a class="nav-link " href="Contactus.php">Contact Us</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div>
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner ">
        <div class="carousel-item active" data-bs-interval="10000">
          <img src="../img/sl1.jpg" class="d-block img-carousel" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>First slide label</h5>
            <p>Some representative placeholder content for the first slide.</p>
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="2000">
          <img src="../img/sl2.jpg" class="d-block img-carousel" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Second slide label</h5>
            <p>Some representative placeholder content for the second slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="../img/sl3.jpg" class="d-block img-carousel" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Third slide label</h5>
            <p>Some representative placeholder content for the third slide.</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</body>

</html>