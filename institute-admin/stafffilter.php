<?php
include("../connect.php");
// session_start();
$a = 'staff';
include("change-header.php");
$inst_id = $_SESSION['inst_id'];
$inst_name = $_SESSION['name'];
$indian_states = array(
  'AP' => 'Andhra Pradesh', 'AR' => 'Arunachal Pradesh', 'AS' => 'Assam', 'BR' => 'Bihar', 'CT' => 'Chhattisgarh',
  'GA' => 'Goa', 'GJ' => 'Gujarat', 'HR' => 'Haryana', 'HP' => 'Himachal Pradesh', 'JK' => 'Jammu & Kashmir',
  'JH' => 'Jharkhand', 'KA' => 'Karnataka', 'KL' => 'Kerala', 'MP' => 'Madhya Pradesh', 'MH' => 'Maharashtra',
  'MN' => 'Manipur', 'ML' => 'Meghalaya', 'MZ' => 'Mizoram', 'NL' => 'Nagaland', 'OR' => 'Odisha', 'PB' => 'Punjab',
  'RJ' => 'Rajasthan', 'SK' => 'Sikkim', 'TN' => 'Tamil Nadu', 'TR' => 'Tripura', 'UK' => 'Uttarakhand',
  'UP' => 'Uttar Pradesh', 'WB' => 'West Bengal',
);
?>
<html>

<head>
  <script>
  function classDropdown(str) {
    if (str == "") {
      document.getElementById("section").innerHTML = "";
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
          document.getElementById("section").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET", "ajaxSection.php?name=" + str, true);
      xmlhttp.send();
    }
  }
  // $(document).ready(function() {
  //     $("#filter").click(function() {
  //         $("#studtable").focus();
  //         $("#studtable").show();

  //     });
  // });

  $(document).ready(function() {
    $(".content").fadeIn(1000);
    $("#filter").click(function() {
      if ($("#from_dob").val() != "") {
        if ($("#to_dob").val() == "") {
          $("#to_dob").focus();
          Swal.fire({
            title: 'Error!!!',
            text: "Please Select DOB[To]",
            type: 'warning',
            confirmButtonColor: 'red',
            confirmButtonText: 'yes'
          });

          return false;

        }

      }

      if ($("#to_dob").val() != "") {
        if ($("#from_dob").val() == "") {
          $("#from_dob").focus();
          Swal.fire({
            title: 'Error!!!',
            text: "Please Select DOB[From]",
            type: 'warning',
            confirmButtonColor: 'red',
            confirmButtonText: 'yes'
          });

          return false;

        }

      }
      if ($("#from_edate").val() != "") {
        if ($("#to_edate").val() == "") {
          $("#to_edate").focus();
          Swal.fire({
            title: 'Error!!!',
            text: "Please Select Enrolment Date[To]",
            type: 'warning',
            confirmButtonColor: 'red',
            confirmButtonText: 'yes'
          });

          return false;

        }

      }
      if ($("#to_edate").val() != "") {
        if ($("#from_edate").val() == "") {
          $("#from_edate").focus();
          Swal.fire({
            title: 'Error!!!',
            text: "Please Select Enrolment Date[From]",
            type: 'warning',
            confirmButtonColor: 'red',
            confirmButtonText: 'yes'
          });

          return false;

        }

      }
      if ($("#to_doj").val() != "") {
        if ($("#from_doj").val() == "") {
          $("#from_doj").focus();
          Swal.fire({
            title: 'Error!!!',
            text: "DOJ[From]",
            type: 'warning',
            confirmButtonColor: 'red',
            confirmButtonText: 'yes'
          });

          return false;

        }

      }
      if ($("#from_doj").val() != "") {
        if ($("#to_doj").val() == "") {
          $("#to_doj").focus();
          Swal.fire({
            title: 'Error!!!',
            text: "Please Select DOJ[To]",
            type: 'warning',
            confirmButtonColor: 'red',
            confirmButtonText: 'yes'
          });

          return false;

        }

      }

    });

  });
  </script>
</head>

<body>

  <div class="d-flex">
    <?php
    include("institute-sidebar.php");
    ?>
    <div class=" institute-content">
      <!-- <div class="d-flex justify-content-center float-center align-items-center"> -->
      <form method="post">
        <div class="row">
          <div class="col">
            <div style="box-shadow: rgba(0, 0, 0, 0.30) 0px 3px 8px;">
              <div class="py-4 pl-3 border-bottom " style="border-radius:10px 10px 0px 0px;background-color: #030d38;">
                <div class="h2 font-weight-bold text-white">Filter Staff Details</div>
              </div>
              <div class="py-4 pl-3" style="border-radius:0px 0px 10px 10px;background-color: white;">
                <div class="row mr-2 ">
                  <div class="col-sm-4">
                    <label class="form-control-label ml-2 p-1">Name:<span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-lg m-1" id="name" name="name"
                      placeholder="First Name/Surname">
                  </div>
                  <div class="col-sm-4">
                    <label class="form-label ml-2 p-1"> Gender : <span class="text-danger">*</span></label>
                    <select class="form-control form-control-lg m-1" id="gender" name="gender">
                      <option value="" selected> Choose... </option>
                      <option value="Male"> Male </option>
                      <option value="Female"> Female </option>
                      <option value="Other"> Other </option>
                    </select>
                  </div>
                  <div class="col-sm-4">
                    <label class="form-label ml-2 p-1">Blood Group:<span class="text-danger">*</span></label>
                    <select class="form-control form-control-lg m-1" id="bloodgroup" name="bloodgroup">
                      <option value="" selected>--Select--</option>
                      <option> A+ </option>
                      <option> A- </option>
                      <option> AB+ </option>
                      <option> AB+ </option>
                      <option> B- </option>
                      <option> B+ </option>
                      <option> O+ </option>
                      <option> O- </option>
                    </select>
                  </div>
                </div>
                <div class="row mr-2">
                  <div class="col-sm-3">
                    <label class="form-label ml-2 p-1">DOB[From]:<span class="text-danger">*</span></label>
                    <input class="form-control form-control-lg m-1" type="date" id="from_dob" name="from_dob">
                  </div>
                  <div class="col-sm-3">
                    <label class="form-label ml-2 p-1">DOB[To]:<span class="text-danger">*</span></label>
                    <input class="form-control form-control-lg m-1" type="date" id="to_dob" name="to_dob">
                  </div>
                  <div class="col-sm-3">
                    <label class="form-label ml-2 p-1">DOJ[From]:<span class="text-danger">*</span></label>
                    <input class="form-control form-control-lg m-1" type="date" id="from_doj" name="from_doj">
                  </div>
                  <div class="col-sm-3">
                    <label class="form-label ml-2 p-1">DOJ[To]:<span class="text-danger">*</span></label>
                    <input class="form-control form-control-lg m-1" type="date" id="to_doj" name="to_doj">
                  </div>

                </div>
                <div class="row mr-2">
                  <div class="col-sm-6">
                    <label class="form-label ml-2 p-1">Enrolment Date[From]:<span class="text-danger">*</span></label>
                    <input class="form-control form-control-lg m-1" type="date" id="from_edate" name="from_edate">
                  </div>
                  <div class="col-sm-6">
                    <label class="form-label ml-2 p-1">Enrolment[To]:<span class="text-danger">*</span></label>
                    <input class="form-control form-control-lg m-1" type="date" id="to_edate" name="to_edate">
                  </div>
                </div>
                <div class="row mr-2">


                  <div class="col-sm-3">
                    <label class="form-label ml-2 p-1" for="city"> Country : <span class="text-danger">*</span></label>
                    <select name="country" class="form-control form-control-lg m-1">
                      <option value="">--Select Country--</option>

                      <option value="India"> India </option>

                    </select>
                  </div>
                  <div class="col-sm-3">
                    <label class="form-label ml-2 p-1">State:<span class="text-danger">*</span></label>

                    <select name="state" id="state" class="form-control form-control-lg m-1">
                      <option value=''>--Select State--</option>
                      <?php
                      foreach ($indian_states as $x => $val) {
                        echo '<option value="' . $val . '"   > ' . $val . ' </option>';
                      } ?>
                    </select>
                  </div>
                  <div class="col-sm-3">
                    <label class="form-label p-1 ml-2">Staff Type:</label><span class="text-danger">*</span>
                    <select class="form-control form-control-lg m-1" id="stype" name="stype">
                      <option value="" selected> --Select-- </option>
                      <option>Teaching</option>
                      <option>Non-Teaching</option>
                    </select>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-outline">
                      <label class="form-label ml-2 p-1">Designation</label><span class="text-danger">*</span>
                      <select class="form-control form-control-lg m-1" name="designation">
                        <option value="" selected> --Select-- </option>
                        <option> Faculty </option>
                        <option> Clerk </option>
                        <option> Accountant </option>
                        <option> Principle </option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row py-3">
                  <div class="col">
                    <input type="submit" name="filter" id="filter" value="Filter" class="btn bg-navy-blue text-white">
                    <input type="submit" name="showall" id="showall" value="Show All"
                      class="btn bg-navy-blue text-white">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- </div> -->
      <!-- <div class="row" id="studtable" style="display: none;" > -->
      <br><br>
      <div class="row" id="studtable" style="box-shadow: rgba(0, 0, 0, 0.30) 0px 3px 8px;">
        <div class="col " style='border-radius:10px 10px 10px 10px;background-color: white;'>
          <div class="table-responsive p-3">
            <table class="table table-hover">
              <thead class="thead-light">
                <tr class="text-primary">
                  <th>#</th>
                  <th>Photo</th>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Gender</th>
                  <th>DOB</th>
                  <th>DOJ</th>
                  <th>Type</th>
                  <th>Designation</th>
                  <th>Pno</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Bloodgroup</th>
                  <th>Enrollment date</th>

                </tr>
              </thead>
              <tbody>

                <?php
                include("../connect.php");
                if (isset($_REQUEST['filter'])) {
                  // print_r($_POST);
                  $name = $_REQUEST['name'];
                  $gender = $_POST['gender'];
                  $bloodgroup = $_REQUEST['bloodgroup'];
                  $from_dob = $_REQUEST['from_dob'];
                  $to_dob = $_REQUEST['to_dob'];
                  $from_doj = $_REQUEST['from_doj'];
                  $to_doj = $_REQUEST['to_doj'];
                  $country = $_REQUEST['country'];
                  $state = $_REQUEST['state'];
                  $stype = $_REQUEST['stype'];
                  $designation = $_REQUEST['designation'];
                  $from_edate = $_REQUEST['from_edate'];
                  $to_edate = $_REQUEST['to_edate'];
                  if ($name != '' || $gender != '' || $bloodgroup != '' || $from_dob != '' || $to_dob != '' || $from_doj != '' || $to_doj != '' || $country != '' || $state != '' || $designation != '' || $stype != '' || $from_edate != '' || $to_edate != '') {
                    if ($name != "") {
                      $n = " Class='$name' AND ";
                    } else {
                      $n = "";
                    }
                    if ($gender != "") {
                      $g = " Gender='$gender' AND ";
                    } else {
                      $g = "";
                    }
                    if ($bloodgroup != "") {
                      $bg = " Bloodgroup='$bloodgroup' AND ";
                    } else {
                      $bg = "";
                    }
                    if ($country != "") {
                      $c = " Country='$country' AND ";
                    } else {
                      $c = "";
                    }
                    if ($state != "") {
                      $s = " State='$state' AND ";
                    } else {
                      $s = "";
                    }
                    if ($stype != "") {
                      $type = " Stype='$stype' AND ";
                    } else {
                      $type = "";
                    }
                    if ($designation != "") {
                      $desgi = " Desgination='$designation' AND ";
                    } else {
                      $desgi = "";
                    }
                    if ($from_dob != "") {
                      $dob = " Dob BETWEEN '$from_dob' AND '$to_dob' AND ";
                    } else {
                      $dob = "";
                    }
                    if ($from_doj != "") {
                      $doj = " Doj BETWEEN '$from_doj' AND '$to_doj' AND ";
                    } else {
                      $doj = "";
                    }
                    if ($from_edate != "") {
                      $edate = " Enroll_date BETWEEN '$from_edate' AND '$to_edate' AND ";
                    } else {
                      $edate = "";
                    }
                    $query = "SELECT * FROM staff_tbl where " . $dob . $edate . $n . $type . $desgi . $doj . $g . $s . $bg . $c . "Inst_id='$inst_id' ";
                    // echo $query;
                    // $query = "SELECT * FROM staff_tbl where  Name='$name' OR Gender='$gender' OR Bloodgroup='$bloodgroup' OR Country='$country' OR State='$state' 
                    // OR Stype='$stype' OR  Desgination='$designation' OR (Dob BETWEEN '$from_dob' AND '$to_dob') OR (Enroll_date BETWEEN '$from_edate' AND '$to_edate')  OR (Enroll_date BETWEEN '$from_doj' AND '$to_doj') AND Inst_id='$inst_id' ";
                    $rs = $con->query($query);
                    $num = $rs->num_rows;
                    $sn = 0;
                    if ($num > 0) {
                      while ($rows = $rs->fetch_assoc()) {
                        $sn = $sn + 1;
                        echo "
                                  <tr>
                                    <td>" . $sn . "</td>

                                    <td><img class='popup' src='staff_profile/" . $rows['Profile'] . "' style='border-radius:50%' height='100' width='100'></td>
                                    <td>" . $rows['Id'] . "</td>
                                    <td>" . $rows['Name'] . "</td>
                                    <td>" . $rows['Gender'] . "</td>
                                    <td>" . $rows['Dob'] . "</td>
                                    <td>" . $rows['Doj'] . "</td>
                                    <td>" . $rows['Stype'] . "</td>
                                    <td>" . $rows['Desgination'] . "</td>
                                    <td>" . $rows['Cno'] . "</td>
                                    <td>" . $rows['Email'] . "</td>
                                    <td>" . $rows['Address'] . "," . $rows['State'] . "," . $rows['Country'] . "</td>
                                    <td>" . $rows['Bloodgroup'] . "</td>
                                    <td>" . $rows['Enroll_date'] . "</td>
                                  </tr>";
                      }
                    } else {
                      echo
                      "<div class='alert alert-danger' role='alert'>
                                                No Record Found!
                                            </div>";
                    }
                  } else {
                    echo "Please Select Criteria";
                  }
                }
                if (isset($_REQUEST['showall'])) {

                  $query = "SELECT * FROM staff_tbl where Inst_id='$inst_id'";
                  $rs = $con->query($query);
                  $num = $rs->num_rows;
                  $sn = 0;
                  if ($num > 0) {
                    while ($rows = $rs->fetch_assoc()) {
                      $sn = $sn + 1;
                      echo "
                                  <tr>
                                    <td>" . $sn . "</td>
                                    <td><img class='popup' src='staff_profile/" . $rows['Profile'] . "' style='border-radius:50%' height='100' width='100'></td>
                                    <td>" . $rows['Id'] . "</td>
                                    <td>" . $rows['Name'] . "</td>
                                    <td>" . $rows['Gender'] . "</td>
                                    <td>" . $rows['Dob'] . "</td>
                                    <td>" . $rows['Doj'] . "</td>
                                    <td>" . $rows['Stype'] . "</td>
                                    <td>" . $rows['Desgination'] . "</td>
                                    <td>" . $rows['Cno'] . "</td>
                                    <td>" . $rows['Email'] . "</td>
                                    <td>" . $rows['Address'] . "," . $rows['State'] . "," . $rows['Country'] . "</td>
                                    <td>" . $rows['Bloodgroup'] . "</td>
                                    <td>" . $rows['Enroll_date'] . "</td>
                                  </tr>";
                    }
                  } else {
                    echo
                    "<div class='alert alert-danger' role='alert'>
                                        No Record Found!
                                        </div>";
                  }
                }

                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade bd-example-modal-lg" id="img" tabindex="0" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-zoom modal-dialog-centered">

      <img class="w-100" id="popup-img" style="border-radius: 50%;" alt="image">

    </div>
  </div>
  <script>
  $('.popup').click(function() {
    var src = $(this).attr('src');
    $('#img').modal('show');

    $('#popup-img').attr('src', src);
  });
  </script>
</body>

</html>