<?php require('header.php');?>

<body>
  <div class="container p-3">
    <div class="row align-items-center w-100">
      <div class="col-sm-6">
        <div class="row p-5">
          <img src="../img/envelope.png" class="img-fluid" />
        </div>
        <div class="row text-dark p-3">
          <h6 class="p-3"> Can also connect with</h6>
          <div class="col-sm-1"><i class="fab fa-instagram fa-2x"></i></div>
          <div class="col-sm-1"><i class="fab fa-facebook fa-2x"></i></div>
          <div class="col-sm-1"><i class="fab fa-twitter fa-2x"></i></div>
        </div>
      </div>
      <div class="col-sm-6 ">
        <h2 class="text-center text-dark"> Get in touch </h2>
        <form class="h-75">
          <div class="row p-3">
            <label class="visually-hidden" for="autoSizingInputGroup">Name</label>
            <div class="input-group">
              <div class="input-group-text">
                <i class="fa fa-user" aria-hidden="true"></i>
              </div>
              <input type="text" class="form-control" id="autoSizingInputGroup" placeholder="Username">
            </div>
          </div>
          <div class="row p-3">
            <label class="visually-hidden" for="autoSizingInputGroup">Email</label>
            <div class="input-group">
              <div class="input-group-text">@
              </div>
              <input type="text" class="form-control" id="autoSizingInputGroup" placeholder="Email Address">
            </div>
          </div>
          <div class="row p-3">
            <label class="visually-hidden" for="autoSizingInputGroup">Email</label>
            <div class="input-group">
              <div class="input-group-text">
                <i class="fa fa-envelope" aria-hidden="true"></i>
              </div>
              <textarea type="text" class="form-control" id="autoSizingInputGroup" rows="5"> </textarea>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
<?php require('footer.php');?>