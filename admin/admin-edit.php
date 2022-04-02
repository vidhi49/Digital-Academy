<?php
include("../connect.php");
include("admin-header.php");
// include("admin-sidebar.php");
$a = 'adminedit';
$email = $_SESSION['email'];
$id = $_SESSION['id'];
$q = "select * from master_admin_tbl where Id='$id'";
$res = mysqli_query($con, $q);
$r = mysqli_fetch_array($res);
?>
<html>

<head>

  <script src="../js/jquery-3.1.1.min.js"></script>

</head>
<script>
  $(document).ready(function() {
    var e_Reg = /^([a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/;
    $("#file").change(function(e) {
      var tmppath = URL.createObjectURL(e.target.files[0]);
      $("#profileimg").fadeIn("slow").attr('src', tmppath);

    });
    $("#update").click(function() {

      
      
      if ($('#filemessage').text() != "") {
        alert($('#filemessage').text());
        $("#file").focus();
        return false;
      }
      if ($('#msgemail').text() != "") {
        alert($('#msgemail').text()+"hello");
        return false;
      }
     
    });
    $('#eid').on('keyup', function() {
      if (e_Reg.test($('#eid').val()) == false) {
        $('#msgemail').html('Please Fill Email in abc@xyz.com').css('color', 'red');
      } else {
        $.ajax({
          type: 'POST',
          url: 'ajaxupdateEmail.php',
          data: "email=" + $('#eid').val(),
          success: function(response) {
            $('#msgemail').html(response).css('color', 'red');
            return false;
          }
        });
      }



    });
  });
  Filevalidation = () => {
    const fi = document.getElementById('file');
    var filePath = fi.value;
    var allowedExtensions =
      /(\.jpg|\.jpeg|\.png|\.gif)$/;
    if (!allowedExtensions.exec(filePath)) {
      // alert('Invalid file type');
      $("#filemessage").html('Photo Must be jpg/jpeg/png/gif').css('color', 'red');
      // fi.value = '';
      return false;
    } else {
      // $("#filemessage").html('');
      if (fi.files.length > 0) {
        for (const i = 0; i <= fi.files.length - 1; i++) {

          const fsize = fi.files.item(i).size;
          const file = Math.round((fsize / 1024));
          if (file > 200) {
            $("#filemessage").html('File Must be less then 200kb').css('color', 'red');
            return false;
          } else {

            $("#filemessage").html('');

            return false;
          }
        }
      }
    }
  }
</script>

<body>
  <div class="d-flex">
    <!-- <div class="col-sm-2"> -->
    <?php include("admin-sidebar.php"); ?>
    <!-- </div> -->
    <!-- <div class="col-sm-10"> -->
    <div class="content m-3 p-3">
      <div class=" m-5 bg-white" style="border-radius:10px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
        <div class="">
          <form method="post" class="p-4 m-2" enctype="multipart/form-data">
            <div>
              <h1 class="fs-2 text-dark ">Edit Profile</h1>
              <hr>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-4 m-2">
                <div class="row">
                  <div class="upload text-center pb-3 pt-2">
                    <div> <img id="profileimg" src='admin_profile/<?php echo $r[3] ?>' style="border:5px solid black;border-radius:10px" height="195" width="195" alt="image"> </div>

                  </div>
                </div>

              </div>
              <div class="col">
                <div class="row">
                  <div class="col m-1">
                    <input class="form-control form-control-lg " type="file" id="file" onchange="Filevalidation()" name="photo">
                    <span id="filemessage"></span>
                  </div>
                </div>
                <div class="row">
                  <div class="col mt-4 m-1">
                    <!-- <span>Email</span> -->
                    <div class="form-group ">
                      <div class="input-group">
                        <input id="eid" name="eid" class="form-control form-control-lg " value="<?php echo $r[1] ?>" placeholder="abc@gmail.com" type="email" required>
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-envelope"></i>
                          </span>
                        </div>
                      </div>
                      <P id='msgemail'></P>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col mt-2">
                    <button class="btn bg-navy-blue text-white btn-lg " id="update" name="update" class="m-5" type="submit">Update Profile</button>
                  </div>
                </div>

              </div>
            </div>
            <div class="pt-1 mb-4">

            </div>
          </form>
        </div>
      </div>
      <!-- </div> -->
    </div>

  </div>

  <?php include("../guest/footer.php"); ?>
</body>

</html>
<?php
if (isset($_REQUEST['update'])) {
  $email = $_REQUEST['eid'];
  echo $email;
}
?>