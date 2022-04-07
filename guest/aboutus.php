<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Untitled Document</title>
  <link href="https://fonts.googleapis.com/css2?family=Aclonica&family=Nova+Slim" rel="stylesheet">
</head>
<style>
@media only screen and (max-width: 500px) {
  img {
    width: inherit;
  }
}

h1 {

  animation-duration: 3s;
  animation-delay: 2s;
  animation-iteration-count: infinite;

}
</style>

<body>
  <?php require("header.php"); ?>
  <div class="content d-block w-100">
    <div class="row p-5 mt-3" style="background-image: url(https://source.unsplash.com/1400x500/?education,dark); ">
      <h1 class="text-center  animate__animated animate__bounce animate__slower delay-2s">DIGITAL ACADEMY
      </h1>
      <hr>

      <p style="font-family: 'Nova Slim', cursive;" class="fs-5 text-center ">
        Digital school a complete program with the
        vision to blend technology into the school education system</p>
      <br>
      <p class="fs-5">
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
        <p>
          Our Campus Suite team is comprised of designers, developers, project leaders, and support specialists who
          all come together to create better ways for schools to communicate via the web.

          We're in this together. Among our team members are former school PR professionals and former teachers,
          many of whom are parents themselves. You might say we take our work home with us, living and knowing
          firsthand the importance of school-parent engagement.
        </p>
      </div>
      <div class="col-sm-6 p-2">
        <img src="https://source.unsplash.com/470x350/?team" alt="">
      </div>
    </div>
  </div>

  <?php require("footer.php"); ?>


</body>

</html>