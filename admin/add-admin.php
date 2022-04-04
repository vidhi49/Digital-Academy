<?php
include("../connect.php");
include("admin-header.php");
// include("admin-sidebar.php");
$a = 'addadmin';
?>
<html>

<head>

  <script src="../js/jquery-3.1.1.min.js"></script>
  <script src="../js/admin.js"></script>
</head>
<script>
  function myFunction() {
    var x = document.getElementById("pwd");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }

  }

  function myFunction1() {
    var x = document.getElementById("cpwd");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }

  }

  $(document).ready(function() {
    $("#file").change(function(e) {
      var tmppath = URL.createObjectURL(e.target.files[0]);
      $("#profileimg").fadeIn("slow").attr('src', tmppath);

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
              <h1 class="fs-2 text-dark ">Add Admin</h1>
              <hr>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-4 m-2">
                <div class="row">
                  <div class="upload text-center pb-3 pt-2">
                    <div> <img id="profileimg" src='../img/p1.jpg' style="border:5px solid black;border-radius:10px" height="250" width="250" alt="image"> </div>

                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <input class="form-control form-control-lg m-4" type="file" id="file" onchange="Filevalidation()" name="photo">
                    <span id="filemessage"></span>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="row">
                  <div class="col m-1">
                    <span>Email</span>
                    <div class="form-group ">
                      <div class="input-group">
                        <input id="eid" name="eid" class="form-control form-control-lg " placeholder="abc@gmail.com" type="email" required>
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-envelope"></i>
                          </span>
                        </div>
                      </div>
                      <span id="emsg"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col m-1">
                    <span>Password</span>
                    <div class="form-group ">
                      <div class="input-group">
                        <input id="pwd" name="pwd" class="form-control form-control-lg " placeholder="New Password" type="password" required>
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-eye" onclick="myFunction()"></i>
                          </span>
                        </div>
                      </div>
                      <span id="mpwd"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col m-1">
                    <span>Confirm Password</span>
                    <div class="form-group ">
                      <div class="input-group">
                        <input id="cpwd" name="cpwd" class="form-control form-control-lg " placeholder="Confirm New Password" type="password" required>
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-eye" onclick="myFunction1()"></i>
                          </span>
                        </div>
                      </div>
                      <span id="mcpwd"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col m-1">
                    <span>Permission of Adding Admin</span>
                    <div class="form-group fs-5">
                      <input type="radio" id="yes"  name="permission" class="m-2"  style="height: 20px;width: 20px;" value="1">YES                     
                      <input type="radio" id="no" name="permission" class="m-2" style="height: 20px;width: 20px;" value="0" checked >NO
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="pt-1 mb-4">
              <button class="btn bg-navy-blue text-white btn-lg " id="add" name="add" class="m-5" type="submit">Add New Admin</button>
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
if (isset($_POST['add'])) {
  $email = $_POST['eid'];
  $pwd = $_POST['pwd'];
  $permission=$_POST['permission'];
  $hash = password_hash($pwd, PASSWORD_DEFAULT);
  $q = "select * from master_admin_tbl where Email='$email'";
  $res = mysqli_query($con, $q);
  $nor = mysqli_num_rows($res);
  //echo "$nor";
  if ($nor == 0) {
    $q1 = "insert into master_admin_tbl values(null,'$email','$hash','','$permission')";
    $r=mysqli_query($con, $q1);
    if($r){
      $q2="select * from master_admin_tbl where Email='$email'";
      $r1=mysqli_query($con,$q2);
      $row=mysqli_fetch_array($r1);
      if (!empty($_FILES['photo']['name'])) {
        $imgname = $_FILES['photo']['name'];
        $tmpname = $_FILES['photo']['tmp_name'];
        $imageExtension = explode('.', $imgname);
        $imageExtension = strtolower(end($imageExtension));
        $newimgname = $row[0];
        $newimgname .= "." . $imageExtension;
        
        
      } else {
        $newimgname = "default.jpg";
      }
      move_uploaded_file($tmpname, "admin_profile/" . $newimgname);
      $que = "update master_admin_tbl set Profile='$newimgname' where Id='$row[0]'";
      $r=mysqli_query($con, $que);
      echo "<script>Swal.fire({
          
        title: 'Updated',
        text: 'New Admin is Added',
        type: 'warning',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK',
        preConfirm: function() {

            window.location = (\"admin-dashboard.php\")
  
          },
          allowOutsideClick: false
        
      })</script>";
    }
    
    else {
      die("<center><h1>Query Failed" . mysqli_error($con) . "</h1></center>");
    }
  } else {
    echo "<script> alert('User Already Existed');</script>";
  }
}

?>
