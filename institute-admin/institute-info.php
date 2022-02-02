<?php require('institute-header.php');?>
<div class="container">
  <div class="row h-100 m-5 bg-light p-5">
    <div class="col-sm-6">
      <form action="/examples/actions/confirmation.php" method="post">
        <div class="form-group">
          <h4 class="mb-5 text-center text-danger"> Please Fill Institute Details
            <hr>
          </h4>

        </div>
        <div class="mb-3">
          <label class="form-label" for="address">Address</label>
          <input type="email" class="form-control" id="inputEmail" placeholder="Email" required>
        </div>
        <div class="mb-3">
          <label class="form-label" for="city">City :</label>
          <select class="form-select">
            <option disabled selected>Choose...</option>
            <option>Surat</option>
            <option>Mumbai</option>
            <option>Puna</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label" for="state">State :</label>
          <select class="form-select">
            <option disabled selected>Choose...</option>
            <option>Gujarat</option>
            <option>Rajasthan</option>
            <option>Maharashtra</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Provide School/College Logo Image :</label>
          <input type='file' id="limg" name="limg" required class="form-control-file" />
        </div>
        <button type="submit" class="btn btn-primary bg-navy-blue mt-4">Sign in</button>
      </form>
    </div>
    <div class="col-sm-6 d-none d-sm-block">
      <img src="../img/school.jpg" class="img-fluid h-100" />
    </div>
  </div>
</div>
<?php require("../guest/footer.php");?>