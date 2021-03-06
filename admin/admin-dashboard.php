<?php
include('../connect.php');
include('admin-header.php');
$a = 'admindashboard';
?>

<head>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>


</head>
<style>

</style>

<body>

  <div class="d-flex">
    <?php include("admin-sidebar.php"); ?>
    <div class="content">
      <div class="p-5">
        <div class="row mt-5">
          <h1>Welcome Admin!!!</h1>
        </div>
        <div class="row mt-3">
          <div class="col-sm-6 ">
            <div class="card"
              style="border-radius: 20px;background-color:white;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
              <div class="card-body">
                <!-- <h2 class="d-flex justify-content-end" style="position:absolute;right: 20;">Today's Date:<?php echo date('F-d') ?></h2> -->
                <div class="d-flex " style="position:absolute;right: 20;">
                  <h2 class="mb-0 font-weight-normal"><i class="fa fa-sun"></i>31<sup>C</sup></h2>
                  <div class="ms-0">
                    <h4 class="location font-weight-normal">Bangalore</h4>
                    <h6 class="font-weight-normal">India</h6>
                  </div>
                </div>
                <img src="../img/master-admin.jpg" alt="img" class="card-img-bottom">
              </div>
            </div>

          </div>

          <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-6 mt-5 ">
                <div class="h-100 p-3" style=" border-radius: 20px;background-color:#ffb752;color:white">
                  <div class="row ">

                    <?php
                                        $q = mysqli_query($con, "select * from institute_tbl ");
                                        $num = mysqli_num_rows($q);
                                        ?>
                    <h3 class="pt-3"><?php echo $num ?></h3>
                    <p class="mb-2 fs-3">Total Institute</p>


                    <!-- <div class="col-lg-4 d-flex align-items-center">
                                            <a class="text-center  align-items-center" style="background-color: white;height:70px;width:80px;font-size:50;border-radius:50%">
                                                <i class="fas fa-university mt-2 " style="color:#011f4b"></i></a>
                                        </div> -->
                  </div>
                </div>
              </div>
              <div class=" col-sm-6 mt-5">
                <div class="h-100 p-3" style="border-radius: 20px;background-color:#c6e2ff;">
                  <div class="row">

                    <?php
                                        $q = mysqli_query($con, "select * from inquiry_tbl where status='pending' ");
                                        $num = mysqli_num_rows($q);
                                        ?>
                    <h3 class="pt-3"><?php echo $num ?></h3>
                    <p class="mb-2 fs-3">Pending Request</p>

                    <!-- <div class="col-lg-4 d-flex align-items-center">
                                            <a class="text-center  align-items-center" style="background-color: white;height:70px;width:80px;font-size:50;border-radius:50%">
                                                <i class="fas fa-university mt-2 " style="color:#011f4b"></i>
                                            </a>
                                            </a>
                                        </div> -->
                  </div>
                </div>
              </div>
            </div>
            <div class="row ">
              <div class="col-sm-6 mt-5">
                <div class="h-100 p-3 " style="border-radius: 20px;background-color:	#ffffae;">
                  <div class="row">

                    <!-- <div class="div"> -->
                    <?php
                                        $q = mysqli_query($con, "select * from inquiry_tbl where status='approved' ");
                                        $num = mysqli_num_rows($q);
                                        ?>
                    <h3 class="pt-3"><?php echo $num ?></h3>
                    <p class="mb-2 fs-3">Approved Request</p>
                    <!-- </div> -->

                    <!-- <div class="col-lg-4 d-flex align-items-center">
                                            <a class="text-center  align-items-center" style="background-color:white;height:70px;width:80px;font-size:50;border-radius:50%">
                                                <i class="fas fa-check mt-2 " style="color:#011f4b"></i></a>
                                        </div> -->
                  </div>
                </div>

              </div>
              <div class="col-sm-6 mt-5">
                <div class="text-light h-100 p-3" style="border-radius: 20px;background-color:#011f4b;">
                  <div class="row">

                    <?php
                                        $q = mysqli_query($con, "select * from inquiry_tbl where status='rejected' ");
                                        $num = mysqli_num_rows($q);
                                        ?>
                    <h3 class="pt-3"><?php echo $num ?></h3>
                    <p class="mb-2 fs-3">Rejected Request</p>

                    <!-- <div class="col-lg-4 d-flex align-items-center">
                                            <a class="text-center  align-items-center" style="background-color: white;height:70px;width:80px;font-size:50;border-radius:50%">
                                                <i class="fas fa-university mt-2 " style="color:#011f4b"></i>
                                            </a>

                                            </a>
                                        </div> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-4 ">
          <div class="col-sm-8 mt-5"
            style="border-radius: 20px;background-color:white;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
            <center>
              <h4 class="pt-4">Request of Months</h4>
            </center>
            <div>
              <canvas id="barChart"></canvas>
            </div>
          </div>
          <div class="col-sm-4 mt-5"
            style="border-radius: 20px;background-color:white;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
            <h3 class="m-3 text-center">Total Admin</h3>
            <hr>
            <div>
              <table class="table table-flush table-hover responsive ">
                <thead class="thead-light">
                  <th>No.</th>
                  <th>Photo</th>
                  <th>Email</th>
                </thead>
                <tbody>
                  <?php
                                    $que = "select * from master_admin_tbl Limit 4 ";
                                    $result = mysqli_query($con, $que);
                                    $cnt = 0;
                                    while ($r = mysqli_fetch_array($result)) {
                                        $cnt = $cnt + 1;
                                        echo "<tr>
                                       <td>$cnt</td>
                                       <td>
                                        <img class='popup' src='admin_profile/$r[3]' alt='image'  height='50' width='50'>
                                        </td>
                                        <td>$r[1]</td>
                                       </tr>";
                                    }

                                    ?>

                </tbody>
              </table>
            </div>

            <hr>

            <center><a href="manageadmin.php" class="text-dark">View More</a></center>
            <br>
          </div>
        </div>
        <div class="row mt-5 mb-5">
          <div class="" style="border-radius: 20px;background-color:white;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
            <?php

                        // include("admin-sidebar.php");
                        $q = "select * from institute_tbl Limit 4";
                        $res = mysqli_query($con, $q) or die("Query Failed");
                        $nor = mysqli_num_rows($res);
                        if ($nor > 0) {
                        ?>

            <div class="table-responsive-md table-sm w-100 p-5">
              <div class="row text-center">
                <h2> Total Institute</h2>
              </div>

              <hr><br>
              <table class="table table-flush table-hover responsive" id="dataTableHover">
                <thead class="thead-light">
                  <tr>

                    <th scope="th-sm">ID</th>
                    <th scope="th-sm">Logo</th>
                    <th scope="th-sm">Instition Name</th>
                    <th scope="th-sm">Email</th>
                    <th scope="th-sm">Address</th>
                    <th scope="th-sm">Contact</th>

                    <th scope="th-sm">Date of Approval</th>
                  </tr>
                  </tr>
                </thead>
                <tbody>
                  <?php

                                    while ($r = mysqli_fetch_array($res)) {
                                        echo "<tr>";
                                        echo "<th scope='row'>$r[0]</th>";
                                        echo "<td><img class='popup' src='../Institute-logo/$r[10]' style='border-radius:50%' height='50' width='50'></td>"; //logo
                                        echo "<td>$r[2]</td>"; //name
                                        echo "<td>$r[3]</td>"; //email
                                        echo "<td>$r[4],$r[5],$r[6]</td>"; //add
                                        echo "<td>$r[8]</td>"; //cont
                                        echo "<td>$r[11]</td>"; //date

                                    }
                                    echo "</tr>";
                                } else {
                                    echo "<center><h1>No Institute is Found</h1></center>";
                                }
                                    ?>
                </tbody>
              </table>
              <center><a href="total-institute.php" class="text-dark fs-5">View All</a></center>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>


</body>
<?php
// //chart
// // $p = "select * from inquiry_tbl";
// $p = "select (MONTH(Date)), COUNT(1) FROM inquiry_tbl GROUP BY MONTH(Date) HAVING COUNT(1)>0";
// // SELECT MAX(DATENAME(MM,DATEOFJOIN)) AS JOININGMONTH, COUNT(1) AS "TOTALEMP. JOIN"
// // FROM NEWJOINEE GROUP BY MONTH(DATEOFJOIN);
// $res = mysqli_query($con, $p);
// $num = mysqli_num_rows($res);
// $a = array();
// $c = array();
// if ($num > 0) {
//     while ($r = mysqli_fetch_array($res)) {
//         array_push($a, $r[0]);
//         // array_push($c, $r[1]);
//         $c[$r[0]] = $r[1];
//     }
// }
// // print_r($a);
// // print_r($c);
// $b = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
// foreach ($a as $va) {
//     $b[$va - 1] = $c[$va];
//     // echo $c[$va];
// }
// print_r($b);
// echo "<span id='req'  class='fs-1'>" . implode(",", $b) . "</span>";


?>

</html>
<script>
$(document).ready(function() {
  makechart();
})

function makechart() {
  $.ajax({
    url: "chartdata.php",
    method: "post",
    dataType: "json",
    success: function(data) {
      var total = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
      for (var i = 0; i < 12; i++) {
        total[i] = data[i];
      }
      var chart_data = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: 'Month',
            data: total,
            backgroundColor: [
              'rgb(255, 99, 132)', //pink
              'rgb(255, 159, 64)', //orange
              'rgb(255, 205, 86)', //yellow
              'rgb(75, 192, 192)', //info
              'rgb(54, 162, 235)', //blue
              'rgb(153, 102, 255)', //vio
              'rgb(201, 203, 207)', //grey
              'rgb(255, 99, 132)', //pink
              'rgb(255, 159, 64)', //orange
              'rgb(255, 205, 86)', //yellow
              'rgb(75, 192, 192)', //info

            ],
            borderColor: [
              'rgb(255, 99, 132)', //pink
              'rgb(255, 159, 64)', //orange
              'rgb(255, 205, 86)', //yellow
              'rgb(75, 192, 192)', //info
              'rgb(54, 162, 235)', //blue
              'rgb(153, 102, 255)', //vio
              'rgb(201, 203, 207)', //grey
              'rgb(255, 99, 132)', //pink
              'rgb(255, 159, 64)', //orange
              'rgb(255, 205, 86)', //yellow
              'rgb(75, 192, 192)', //info


            ],
            borderWidth: 1,
          }

        ],


      };

      var options = {
        responsive: true,
        scales: {
          x: {
            title: {
              color: 'red',
              display: true,
              text: 'Month',
              fontSize: 25
            }
          },
          yAxes: [{
            ticks: {
              min: true
            }
          }]
        },

      };
      var barChartCanvas = $("#barChart").get(0).getContext("2d");
      var myChart = new Chart(barChartCanvas, {
        type: 'bar',
        data: chart_data,
        options: options
      });
    }
  });
  alert(total[1]);

}
</script>