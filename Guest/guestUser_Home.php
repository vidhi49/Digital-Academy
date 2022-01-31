<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1 width=device-width">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    .imgCasual
    {
        min-width:80%;
        max-height:800px;
    }
    </style>
<body>

<!-- Carousel -->
<div id="slideImage" class="container carousel slide" data-bs-ride="carousel">

  <div class="carousel-indicators">
    <button type="button" data-bs-target="#slideImage" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#slideImage" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#slideImage" data-bs-slide-to="2"></button>
  </div>
  <!-- The slideshow/carousel -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="s3.jpg" alt="Los Angeles" class='d-block imgCasual' style="width:100%">
      <div class="carousel-caption text-dark">
        <h3>Digital Skool Campus</h3>
        <p>Live in Digital World..</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="s1.jpg" alt="Chicago" class='d-block imgCasual' style="width:100%">
      <div class="carousel-caption">
        <h3>Chicago</h3>
        <p>Thank you, Chicago!</p>
      </div> 
    </div>
    <div class="carousel-item">
      <img src="s2.jpg" alt="New York" class='d-block imgCasual' style="width:100%">
      <div class="carousel-caption">
        <h3>New York</h3>
        <p>We love the Big Apple!</p>
      </div>  
    </div>
  </div>
  
  <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#slideImage" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#slideImage" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

<div class="container-fluid mt-3">
  <h3>Carousel Example</h3>
  <p>The following example shows how to create a basic carousel with indicators and controls.</p>
</div>

</body>
</html>
