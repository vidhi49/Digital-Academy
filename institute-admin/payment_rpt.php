<?php
include("../connect.php");
include("../institute-admin/change-header.php");
$a = 'fees';

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

  $(document).ready(function() {
    $(".content").fadeIn(1000);
    $("#filter").click(function() {
      if ($("#class").val() != "") {
        if ($("#criteria").val() == "") {
          $("#criteria").focus();
          Swal.fire({
            title: 'Error!!!',
            text: "Please Select Criteria",
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
    <div class="institute-content  mt-5 ">
      <div style="box-shadow: rgba(0, 0, 0, 0.30) 0px 3px 8px">
        <div class="h2 font-weight-bold text-white p-4"
          style="background-color: #030d38;border-radius:10px 10px 0px 0px">
          Filter Student Payment Details
        </div>
        <form method="post">

          <div class="bg-white">
            <div class="row p-4">
              <div class="col-sm-6">
                <label class="form-control-label">Select Class<span class="text-danger">*</span></label>
                <?php
                $qry = "SELECT DISTINCT Name FROM class_tbl ORDER BY Name ASC";
                $result = $con->query($qry);
                $num = $result->num_rows;
                if ($num > 0) {
                  echo ' <select   name="cclass" id="class" onchange="classDropdown(this.value)" class="form-control ">';
                  echo '<option value="">--Select Class--</option>';
                  while ($rows = $result->fetch_assoc()) {
                    echo '<option ' . (($row['Name'] == $rows['Name']) ? 'selected="selected"' : "") . ' value="' . $rows['Name'] . '" >' . $rows['Name'] . '</option>';
                  }
                  echo '</select>';
                }
                ?>
              </div>
              <div class="col-sm-6">
                <label class="form-label "> Criteria : <span class="text-danger">*</span></label>
                <select class="form-control " id="criteria" name="criteria">
                  <option value="" selected> Choose... </option>
                  <option value="paid"> Paid </option>
                  <option value="pending"> Pending </option>
                  <!-- <option value="Other"> Other </option> -->
                </select>
              </div>
            </div>
            <input type="submit" name="filter" id="filter" value="Filter" class="btn bg-navy-blue text-white m-2">
            <input type="submit" name="showall" id="showall" value="Show All" class="btn bg-navy-blue text-white m-2">
          </div>
        </form>
      </div>
      <!-- <div class="row" id="studtable" style="display: none;" > -->
      <div class="row mt-5" id="studtable">
        <div class="table-responsive p-3 "
          style='box-shadow: rgba(0, 0, 0, 0.30) 0px 3px 8px;border-radius:10px 10px 10px 10px;background-color: white;'>
          <table class="table table-hover">
            <thead class="thead-light">
              <tr class="text-primary">
                <th>#</th>

                <th class="">Payment Id</th>
                <th class="">Name</th>
                <th class="">Class</th>
                <th class="">Section</th>
                <th class="">Payable Fee</th>
                <th class="">Paid</th>
                <th class="">Balance</th>
                <th class="">Date</th>
                <th class="">Fee receipt</th>


              </tr>
            </thead>
            <tbody>

              <?php
              include("../connect.php");
              $inst_id = $_SESSION['inst_id'];
              if (isset($_REQUEST['filter'])) {
                // print_r($_POST);
                $Class_id = $_REQUEST['cclass'];
                $criteria = $_REQUEST['criteria'];
                if ($Class_id != "" && $criteria == "") {

                  $c = " Class='$Class_id' ";
                  $query = "SELECT * FROM payments where  Class='$Class_id' ";
                  // echo $query;
                  $rs = mysqli_query($con, $query);
                  $num = mysqli_num_rows($rs);
                  // echo $num;
                  $sn = 0;
                  if ($num > 0) {
                    while ($rows = $rs->fetch_array()) {

                      $sn = $sn + 1;
                      $a = $rows['Amount'] - $rows['Paid_amount'];
                      // if ($a == 0) {
                      echo "
                            <tr>
                            <td>" . $sn . "</td>
                            <td>" . $rows['Id'] . "</td>
                            <td>" . $rows['Name'] . "</td>
                            <td>" . $rows['Class'] . "</td>
                            <td>" . $rows['Section'] . "</td>
                            <td>"  . $a . "</td>
                            <td>" . $rows['Paid_amount'] . "</td>
                            <td>" . $rows['Amount'] . "</td>
                            <td>" . $rows['Date'] . "</td>
                            <td><a href='receipt.php?Id=" . $rows['Gr_no'] . " ' target='_blank'>Click here</a></td>
                          </tr>";
                      // }
                    }
                  } else {
                    echo
                    "<div class='alert alert-danger' role='alert'>
                                                  No Record Found!
                                              </div>";
                  }
                }
                if ($Class_id != "" && $criteria != "") {
                  $c = " Class='$Class_id' ";
                  if ($criteria == "paid") {
                    $query = "SELECT * FROM payments where  Class='$Class_id' AND Paid_amount = Amount";
                    // echo $query;
                    $rs = mysqli_query($con, $query);
                    $num = mysqli_num_rows($rs);
                    // echo $num;
                    $sn = 0;
                    if ($num > 0) {
                      while ($rows = $rs->fetch_array()) {

                        $sn = $sn + 1;
                        $a = $rows['Amount'] - $rows['Paid_amount'];
                        if ($a == 0) {
                          echo "
                            <tr>
                            <td>" . $sn . "</td>
                            <td>" . $rows['Id'] . "</td>
                            <td>" . $rows['Name'] . "</td>
                            <td>" . $rows['Class'] . "</td>
                            <td>" . $rows['Section'] . "</td>
                            <td>"  . $a . "</td>
                            <td>" . $rows['Paid_amount'] . "</td>
                            <td>" . $rows['Amount'] . "</td>
                            <td>" . $rows['Date'] . "</td>
                            <td><a href='receipt.php?Id=" . $rows['Gr_no'] . " ' target='_blank'>Click here</a></td>
                          </tr>";
                        }
                      }
                    } else {
                      echo
                      "<div class='alert alert-danger' role='alert'>
                                                  No Record Found!
                                              </div>";
                    }
                  }
                  if ($criteria == "pending") {
                    $query = "SELECT * FROM payments where  Class='$Class_id' AND Paid_amount < Amount";
                    $rs = mysqli_query($con, $query);
                    $num = mysqli_num_rows($rs);
                    $sn = 0;
                    if ($num > 0) {
                      while ($rows = $rs->fetch_array()) {
                        $sn = $sn + 1;
                        $a = $rows['Amount'] - $rows['Paid_amount'];


                        echo "
                              <tr>
                              <td>" . $sn . "</td>
                              <td>" . $rows['Id'] . "</td>
                              <td>" . $rows['Name'] . "</td>
                              <td>" . $rows['Class'] . "</td>
                              <td>" . $rows['Section'] . "</td>
                              <td>"  . $a . "</td>
                              <td>" . $rows['Paid_amount'] . "</td>
                              <td>" . $rows['Amount'] . "</td>
                              <td>" . $rows['Date'] . "</td>
                              <td><a href='receipt.php?Id=" . $rows['Gr_no'] . " ' target='_blank'>Click here</a></td>
                            </tr>
                          ";
                      }
                    } else {
                      echo
                      "<div class='alert alert-danger' role='alert'>
                                                  No Record Found!
                                              </div>";
                    }
                  }
                }
              }



              if (isset($_REQUEST['showall'])) {
                // $Class_id = $_REQUEST['cclass'];
                $query1 = "SELECT * FROM payments ";

                $rs = mysqli_query($con, $query1);
                $num = mysqli_num_rows($rs);
                $sn = 0;

                if ($num > 0) {
                  while ($rows = $rs->fetch_array()) {
                    $sn = $sn + 1;
                    $a = $rows['Amount'] - $rows['Paid_amount'];
                    echo "
                        <tr>
                        <td>" . $sn . "</td>
                        <td>" . $rows['Id'] . "</td>
                        <td>" . $rows['Name'] . "</td>
                        <td>" . $rows['Class'] . "</td>
                        <td>" . $rows['Section'] . "</td>
                        <td>"  . $a . "</td>
                        <td>" . $rows['Paid_amount'] . "</td>
                        <td>" . $rows['Amount'] . "</td>
                        <td>" . $rows['Date'] . "</td>
                        <td><a href='receipt.php?Id=" . $rows['Gr_no'] . "' target='_blank'>Click here</a></td>
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
</body>

</html>