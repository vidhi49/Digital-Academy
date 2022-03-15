<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/style.css">
</head>
<?php require('header.php') ?>

<body>
  <div>
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner ">
        <div class="carousel-item active" data-bs-interval="10000">
          <img src="../img/sl1.jpg" class="d-block img-carousel " alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h4>Digital Academy </h4>
            <p class="fs-5">Expand educational oppertunities with DGSkool.</p>
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="2000">
          <img src="../img/sl2.jpg" class="d-block img-carousel" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <!-- <h5>Second slde label</h5> -->
            <p class="fs-5">The fundamental purpose of school is learing not teaching.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="../img/sl3.jpg" class="d-block img-carousel " alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h4>Digital Academy</h4>
            <p class="fs-5">Instructions ends in the school room but education ends only with life.</p>
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
  <div class="container p-5 ">
    <div class="row m-5">
      <div class="col-sm-4 text-center"><i class="fa fa-address-book fa-3x" aria-hidden="true"></i>
        <p class="mt-3"> Admission Management</p>
      </div>
      <div class=" col-sm-4 text-center"><i class="fa fa-users fa-3x" aria-hidden="true"></i>
        <p class="mt-3">Staff Management</p>
      </div>
      <div class="col-sm-4 text-center"><i class="fa fa-calendar-o fa-3x" aria-hidden="true"></i>
        <p class="mt-3"> Time-table Management</p>
      </div>
    </div>
    <div class=" row m-5">
      <div class="col-sm-4 text-center"><i class="fa fa-newspaper-o fa-3x" aria-hidden="true"></i>
        </i>
        <p class="mt-3"> Online Examination</p>
      </div>
      <div class="col-sm-4 text-center">
        <p class="mt-3"></p>
      </div>
      <div class="col-sm-4 text-center">
        <p class="mt-3"></p>
      </div>
    </div>
  </div>
</body>

</html>
<?php require('footer.php'); ?>