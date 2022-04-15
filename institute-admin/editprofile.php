<?php include("../connect.php");
// session_start();
// include("../admin/admin-header.php");
include("../institute-admin/change-header.php");
// include("../institute-admin/institute-header.php");
$a = "editprofile";
$insti_id = $_SESSION['inst_id'];
$q = "select * from institute_tbl where Id='$insti_id'";
$res = mysqli_query($con, $q);
$r = mysqli_fetch_array($res);
$indian_states = array(
  'AP' => 'Andhra Pradesh', 'AR' => 'Arunachal Pradesh', 'AS' => 'Assam', 'BR' => 'Bihar', 'CT' => 'Chhattisgarh',
  'GA' => 'Goa', 'GJ' => 'Gujarat', 'HR' => 'Haryana', 'HP' => 'Himachal Pradesh', 'JK' => 'Jammu & Kashmir',
  'JH' => 'Jharkhand', 'KA' => 'Karnataka', 'KL' => 'Kerala', 'MP' => 'Madhya Pradesh', 'MH' => 'Maharashtra',
  'MN' => 'Manipur', 'ML' => 'Meghalaya', 'MZ' => 'Mizoram', 'NL' => 'Nagaland', 'OR' => 'Odisha', 'PB' => 'Punjab',
  'RJ' => 'Rajasthan', 'SK' => 'Sikkim', 'TN' => 'Tamil Nadu', 'TR' => 'Tripura', 'UK' => 'Uttarakhand',
  'UP' => 'Uttar Pradesh', 'WB' => 'West Bengal',
);
?>

<head>

  <script src="../js/jquery-3.1.1.min.js"></script>
  <!-- <script src="../js/editprofile.js"></script> -->
  <script>
  $(document).ready(function() {
    var e_Reg = /^([a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/;
    var c_Reg = /^[0-9]+$/;
    $("#file").change(function(e) {
      var tmppath = URL.createObjectURL(e.target.files[0]);
      $("#profileimg").fadeIn("slow").attr('src', tmppath);

    });
    $("#change").click(function() {
      //var conlen = $('#cno').val();

      // alert('hello');
      if ($('#nmsg').text() != "") {
        alert($('#nmsg').text());
        $("#institutename").focus();
        return false;
      }
      if ($('#emailmessage').text() != "") {
        alert($('#emailmessage').text());
        $("#e").focus();
        return false;
      }
      if ($('#cnomessage').text() != "") {
        alert($('#cnomessage').text());
        $("#cno").focus();
        return false;
      }


    });
    $('#e, #cno,#institutename').on('keyup', function() {
      //var clen = $('#cno').val();
      var email = $('#e').val();
      if ($('#institutename').val() != '') {
        $.ajax({
          type: 'POST',
          url: 'ajaxinstitutename.php',
          data: "instname=" + $('#institutename').val(),
          success: function(response) {
            $('#nmsg').html(response).css('color', 'red');
          }
        });


      }

      if (e_Reg.test(email) == false) {
        $('#emailmessage').html('Email Must be in abc@xyz Format').css('color', 'red');
      } else {
        $.ajax({
          type: 'POST',
          url: 'ajaxinstituteemail.php',
          data: "email=" + email,
          success: function(response) {
            $('#emailmessage').html(response).css('color', 'red');
          }
        });

      }

      if (c_Reg.test($('#cno').val()) == false) {
        $('#cnomessage').html('Contact Must be of digit only').css('color', 'red');
      } else if ($('#cno').val().length != 10) {
        $('#cnomessage').html(' PLEase enter 10 digit').css('color', 'red');

      } else {
        $('#cnomessage').html('');
      }


    });
  });
  Filevalidation = () => {
    const fi = document.getElementById('file');
    var filePath = fi.value;
    var allowedExtensions =
      /(\.jpg|\.jpeg|\.png|\.gif)$/i;
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

  function selectstate(str) {
    if (str == "") {
      document.getElementById("s").innerHTML = "";
      return;
    } else {
      if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
      } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("s").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET", "ajaxState.php?name=" + str, true);
      xmlhttp.send();
    }
  }
  </script>
</head>
<html>

<body>
  <div class="d-flex">
    <?php
    include("institute-sidebar.php");
    ?>
    <div class="institute-content text-muted d-flex justify-content-center align-items-center">
      <div class="bg-white w-auto" style="border-radius:10px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
        <h1 class="fs-2 text-dark m-4">Edit School Profile
          <hr>
        </h1>
        <form method="post" enctype="multipart/form-data" class="p-5 m-3">
          <div class="form-group">
            <div class="row">
              <div class="col-sm-4">
                <div class="upload text-center pb-4 pt-3">
                  <img id="profileimg" src='../Institute-logo/<?php echo $r['Logo']; ?>'
                    style="border:5px solid black;border-radius:10px" height="195" width="195" alt="image">
                </div>

                <input class="form-control form-control-lg m-1" name="logo" type="file" id="file"
                  onchange="Filevalidation()">
                <span id="filemessage"></span>

              </div>
              <div class="col-sm-8">
                <div class="row">
                  <label class="form-control-label ml-2 p-1">Name:<span class="text-danger">*</span></label>
                  <input type="text" class="form-control form-control-lg m-1" id="institutename" name="institutename"
                    value="<?php echo  $r['Name'] ?>" placeholder="First Name/Surname" required>
                  <span id="nmsg"></span>

                </div>
                <div class="row">
                  <label class="form-control-label ml-2 p-1">Email:<span class="text-danger">*</span></label>
                  <input type="text" class="form-control form-control-lg m-1" id="e" value="<?php echo  $r['Email'] ?>"
                    name="email" placeholder="abc@xyz.com" required>
                  <span id="emailmessage"></span>
                </div>
                <div class="row">
                  <label class="form-label ml-2 p-1">Phone No.:<span class="text-danger">*</span></label>
                  <input class="form-control form-control-lg m-1" type="tel" value="<?php echo  $r['Cno'] ?>"
                    maxlength="10" id="cno" name="cno" placeholder="Enter your phone number" required>
                  <span id="cnomessage"></span>
                </div>
              </div>

            </div>
            <div class="row">
              <div class="form-outline">
                <label class="form-label ml-2 p-1">Address:<span class="text-danger">*</span></label>
                <textarea cols='20' id="address" required rows="2" class="form-control form-control-lg m-1"
                  name="address"><?php echo  $r['Address']; ?></textarea>
              </div>
            </div>
            <div class="row ">
              <div class="col-sm-6">
                <label class="form-label ml-2 p-1"> Country : <span class="text-danger">*</span></label>
                <select required name="country" onchange="selectstate(this.value)"
                  class="form-control form-control-lg m-1">
                  <option value="">--Select Class--</option>

                  <option value="India" <?php if ($r['Country'] == 'India') echo ' selected'; ?>> India </option>

                </select>
              </div>
              <div class="col-sm-6">
                <label class="form-label ml-2 p-1">State:<span class="text-danger">*</span></label>
                <select required name="s" id="s" class="form-control form-control-lg m-1">
                  <option value=''>--Select Section--</option>
                  <?php
                  foreach ($indian_states as $x => $val) {
                    echo '<option ' . (($r['State'] == $val) ? 'selected="selected"' : "") . '   > ' . $val . ' </option>';
                  } ?>
                </select>
              </div>
            </div>
            <button class="btn bg-navy-blue text-white btn-lg mt-3 " id="change" name="change" type="submit">Change
              Profile</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>
<?php
if (isset($_POST['change'])) {

  $name = $_POST['institutename'];
  $cno = $_POST['cno'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $country = $_POST['country'];
  $state = $_POST['s'];
  $Logo = $r['Logo'];

  if ($_FILES['logo']['name'] != "") {
    $imgname = $_FILES['logo']['name'];
    $tmpname = $_FILES['logo']['tmp_name'];
    $imageExtension = explode('.', $imgname);
    $imageExtension = strtolower(end($imageExtension));
    $newimgname = $r['Name'];
    $newimgname .= "." . $imageExtension;
    echo $newimgname;
    unlink("../Institute-logo/" . $Logo);

    $q = "update institute_tbl set Name='$name', Cno='$cno', Email='$email',Address='$address' , 
        Country='$country', State='$state', Logo='$newimgname' where Id='$insti_id'";
    $res = mysqli_query($con, $q);

    $q1 = "update inquiry_tbl set Name='$name', Cno='$cno', Email='$email',Address='$address' 
        where Id='$r[1]'";
    $res1 = mysqli_query($con, $q1);
    $q2 = "update institute_admin_tbl set Inst_name='$name',Email='$email' where Inst_id='$insti_id'";
    $res2 = mysqli_query($con, $q2);

    if ($res) {
      if ($res1) {
        if ($res2) {

          move_uploaded_file($tmpname, "../Institute-logo/" . $newimgname);
          echo "<script>Swal.fire({

                    title: 'Updated',
                    text: 'Your Profile is Updated',
                    type: 'warning',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    preConfirm: function() {

                        window.location = (\"editprofile.php\")

                      },
                      allowOutsideClick: false

                  })</script>";
        }
      }
    } else {
      die("<center><h1>Query Failedfgf" . mysqli_error($con) . "</h1></center>");
    }
  } else {
    $q = "update institute_tbl set Name='$name', Cno='$cno', Email='$email',Address='$address' , 
        Country='$country', State='$state' where Id='$insti_id'";
    $res = mysqli_query($con, $q);

    $q1 = "update inquiry_tbl set Name='$name', Cno='$cno', Email='$email',Address='$address' 
        where Id='$r[1]'";
    $res1 = mysqli_query($con, $q1);
    $q2 = "update institute_admin_tbl set Inst_name='$name',Email='$email' where Inst_id='$insti_id'";
    $res2 = mysqli_query($con, $q2);

    if ($res) {
      if ($res1) {
        if ($res2) {


          echo "<script>Swal.fire({

                    title: 'Updated',
                    text: 'Your Profile is Updated',
                    type: 'warning',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    preConfirm: function() {

                        window.location = (\"editprofile.php\")

                      },
                      allowOutsideClick: false

                  })</script>";
        }
      }
    } else {
      die("<center><h1>Query Failed" . mysqli_error($con) . "</h1></center>");
    }
  }
}
?>