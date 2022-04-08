<!DOCTYPE html>
<html lang="en">

<head>
  <title>Welcome Guest</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Aclonica&family=Nova+Slim" rel="stylesheet">

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
  transform: scale(1.0);
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
  color: darkgrey;
  font-weight: bold;
  /* font-size: large; */
}

.btn-get-started {
  color: #213b52;
  border-radius: 50px;
  padding: 8px 35px 10px 35px;
  border: 2px solid #fdc134;
  transition: all ease-in-out 0.3s;
  display: inline-block;
  background: #fdc134;
}

.btn-get-started:hover {
  background: transparent;
  color: #fff;
}

.home-img {
  margin: 0px !important;
  /* padding: 0px; */
}

.feature-title {
  position: relative;
}

.feature-title::before {
  content: "";
  position: absolute;
  display: block;
  width: 120px;
  height: 1px;
  background: #ddd;
  bottom: 1px;
  left: calc(50% - 60px);
}

.feature-title::after {
  content: "";
  position: absolute;
  display: block;
  width: 40px;
  height: 3px;
  background: #fdc134;
  bottom: 0;
  left: calc(50% - 20px);
}
</style>

<body>
  <header class="bg-navy-blue">
    <div class="container">
      <nav class="navbar navbar-expand-sm navbar-dark">
        <div class="container-fluid">
          <img class='logo navbar-brand ' src='../img/logo1.png' />
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="justify-content-end  collapse navbar-collapse  " id="collapsibleNavbar">
            <ul class="navbar-nav fs-6">
              <li class="nav-item">
                <a class="nav-link m-2" href="#home">Home</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link m-2 " href="aboutus.php">Registration-Request</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link m-2" href="login.php">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link m-2 " href="#aboutus">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link m-2" href="home.php">Contact Us</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>

  <div id="home" class="bg-navy-blue">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-sm-6">
          <p style="color:#bec4cb;"
            class="mt-5 fs-1 fw-bold animate__animated animate__bounce animate__slower delay-2s">Your new digital
            experience with DGSkool</p>
          <p style="color:#bec4cb;" class="fs-5">We are team of talented developers making websites with more Security
            and As per Requirements.
          </p>
          <button href="#aboutus" class="btn-get-started scrollto mt-3">Get Started</button>
        </div>
        <div class="col-sm-6 text-center">
          <img src="../img/10.png" class="img img-fluid w-100 m-5 home-img " />
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div id="aboutus">
      <div class="row p-5 mt-3">
        <h1 class="text-center "> DIGITAL ACADEMY
        </h1>

        <p style="font-family: 'Nova Slim', cursive;" class="fs-5 text-center p-4 ">
          Digital school a complete program with the
          vision to blend technology into the school education system</p>
        <br>
        <p class="fs-5 p-3">
          At academic grounds, we help solve the everyday communications challenges that all schools face.
          We believe schools can change educational outcomes if they can improve how they share information. We help
          schools use their website and other web communications to do just that, and bring the entire school
          community closer.
        </p>
      </div>
      <div class="row p-5">
        <div class="col-sm-6">
          <h1 class='navy-blue'>Our team is your team.
            <hr>
          </h1>
          <p class="fs-6">
            Our Campus Suite team is comprised of designers, developers, project leaders, and support specialists who
            all come together to create better ways for schools to communicate via the web.

            We're in this together. Among our team members are former school PR professionals and former teachers,
            many of whom are parents themselves. You might say we take our work home with us, living and knowing
            firsthand the importance of school-parent engagement.
          </p>
        </div>
        <div class="col-sm-6">
          <img src="https://source.unsplash.com/650x350/?team" alt="">
        </div>
      </div>
    </div>
    <div id="features" class="feature">
      <h2 class="text-center navy-blue fw-bold fs-4 feature-title p-3"> FEATURES
        <!-- <hr class="w-100 h-25 text-primary fw-bolder" /> -->
      </h2>
      <div class="row">
        <div class="col-sm-6">
          <img src="../img/hh.png" class="img-fluid w-75" />
        </div>
        <div class="col-sm-6"></div>
      </div>
      <div class="row">
        <div class="col-sm-6">

        </div>
        <div class="col-sm-6">
          <img src="../img/jj.png" />
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <img src="../img/kk.png" />
        </div>
        <div class="col-sm-6"></div>
      </div>
      <div class="row">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6">
          <img src="../img/ll.png" />

        </div>
      </div>
    </div>
  </div>
</body>