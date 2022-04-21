<?php
include('../connect.php');
include('student-header.php');
$page = "dashboard";
$Id = $_SESSION['Id'];
$inst_id = $_SESSION['Inst_id'];
// $subid = $_GET['sid'];
$p = "select * from student_tbl where Id='$Id' and Inst_id='$inst_id'";
$r = mysqli_query($con, $p);
$row = mysqli_fetch_array($r);

?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
<script src="../js/jquery-3.1.1.min.js"></script>

<html>
<script>
$(document).ready(function() {
  makechart1();

});
</script>

<!-- overflow: hidden !important; -->

<body>
  <div class="d-flex">
    <?php include("student-sidebar.php"); ?>
    <div class="student-content vh-100 " style="overflow: scroll;">
      <div class="row shadow mx-5" style="border-radius: 20px;background-color:#fffdd0">
        <div class="col-sm-8 d-flex align-items-center">
          <div class="m-5 " style="line-height: 50px;">
            <p class="navy-blue" style="font-size: 50px;">Welcome Back !!!</p>
            <h3><?php echo $row['Name'] ?></h3>
            <p class="py-2" style="line-height: 25px;">Education is one of the most powerful aspects of life.
              Education and learning allow us to make sense of the world around us and where we fit within the world.
            </p>
          </div>

        </div>
        <div class="col-sm-4 ">
          <img class="card-img-bottom" src="../img/student-dashboard.png">
        </div>
      </div>
      <h3 class="m-4 p-3 navy-blue">Your Class Details</h3>
      <div class="row mt-4">
        <div class="col-sm-4 ">
          <div class="card-body " style="border-radius: 20px;background-color:#ff9999">
            <div class="d-flex">
              <div class="p-3 bg-light  " style="border-radius: 50px;">
                <?php
                $que = mysqli_query($con, "select count(*) from teacher_wise_subject_tbl where Class_id='$row[15]' and Inst_id='$inst_id' group by Class_id");
                $result2 = mysqli_fetch_array($que);
                echo "<b class='p-3 fs-1'>$result2[0]</b>";
                ?>
              </div>
              <h2 class="p-2"> Subject Teachers</h2>
              <!-- <h6>[<?php echo $row[13] . "-" . $row[14] ?>]</h6> -->
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card-body " style="border-radius: 20px;background-color:#ff9999">
            <div class="d-flex">
              <div class="p-3 bg-light  " style="border-radius: 50px;">
                <?php
                $que = mysqli_query($con, "select count(*) from student_tbl where Class_id='$row[15]' and Inst_id='$inst_id' group by Class_id");
                $result2 = mysqli_fetch_array($que);
                echo "<b class='p-3 fs-1'>$result2[0]</b>";
                ?>
              </div>
              <h2 class="p-2"> Total Student</h2>
              <!-- <h6>[<?php echo $row[13] . "-" . $row[14] ?>]</h6> -->
            </div>
          </div>
        </div>
        <div class="col-sm-4 ">
          <div class="card-body " style="border-radius: 20px;background-color:#ff9999">
            <div class="d-flex">
              <div class="p-3 bg-light  " style="border-radius: 50px;">
                <?php
                $que = mysqli_query($con, "select count(*) from subject_tbl where Class_id='$row[15]' and Inst_id='$inst_id' group by Class_id");
                $result2 = mysqli_fetch_array($que);
                echo "<b class='p-3 fs-1'>$result2[0]</b>";
                ?>
              </div>
              <h2 class="p-2">Total Subjects</h2>
              <!-- <h6>[<?php echo $row[13] . "-" . $row[14] ?>]</h6> -->
            </div>
          </div>
        </div>
      </div>



      <div class="row  mt-5 ">
        <div class="col-sm-8">
          <?php
          // include("admin-sidebar.php");
          $date = date('Y-m-d');
          $q = "select * from exam_tbl where Inst_id='$inst_id' and Class_id='$row[15]' and  Status='Created' ";
          // echo $q;

          $res = mysqli_query($con, $q) or die("Query Failed");
          $nor = mysqli_num_rows($res);
          if ($nor > 0) {
          ?>

          <div class="row">
            <div class="col-sm-6">
              <h2 class="d-flex justify-content-start mb-3">Exams</h2>
            </div>
            <div class="col-sm-6">
              <a href="studentExam.php" class="d-flex justify-content-end mb-3">View All</a>
            </div>
          </div>

          <?php

            while ($r = mysqli_fetch_array($res)) {

              $q1 = "select * from subject_tbl where Id='$r[5]'";
              $result1 = mysqli_query($con, $q1);
              $re1 = mysqli_fetch_array($result1);
              echo '
                  <div class="card-body shadow" style="border-radius: 0px;background-color:#d0f0c0">
                    <div class="row">
                      <div class="col-sm-6 d-flex align-items-center">
                        <div class=" d-flex align-items-center">
                          <i class="fa fa-bookmark fs-4 pr-4" aria-hidden="true"></i>
                          <h4> ' . $re1[3] . '</h4>
                        </div>
                      </div>
                      <div class="col-sm-6 d-flex align-items-center justify-content-end">
                        <h4> ' . $r[6] . '</h4>
                      </div>
                    </div>
                  </div>
                        ';
            }
          } else {
          }
          ?>
        </div>
        <div class="col-sm-4 p-4 shadow mt-5" style="border-radius: 20px;background-color:#f0ffff">
          <h3>Students of <?php echo $row[13] . '-' . $row[14] ?></h3>
          <div>
            <canvas id="barChart"></canvas>
          </div>
        </div>
      </div>
      <div class="mt-5 w-50" style="padding-top: 10px;">
        <div class="p-4 shadow" style="border-radius: 20px;background-color:#f0ffff">
          <div class="row fs-4">
            <div class="col-sm-6 ">
              <p class="">Material Uploaded</p>
            </div>
            <div class="col-sm-6 d-flex justify-content-end">
              <a href="subjectMaterial.php">View All</a>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-flush table-hover responsive ">
              <tbody>
                <?php
                $q = "select * from student_tbl where Id='$Id' and Inst_id='$inst_id'";
                // echo $q;
                $rs = mysqli_query($con, $q);
                $r = mysqli_fetch_array($rs);



                $s = "select Subject_Id,count(*) from upload_tbl where Inst_id='$inst_id' and Class_id='$r[15]' group by Subject_Id";
                // echo $s;
                $res = mysqli_query($con, $s);

                while ($re = mysqli_fetch_array($res)) {

                  $sub = "select * from subject_tbl where Id='$re[0]' and Inst_id='$inst_id'";
                  // echo $sub;
                  $res1 = mysqli_query($con, $sub);
                  $rq = mysqli_fetch_array($res1);

                  // echo $re[1], $re[0];
                  echo "<tr>
                  <td>$rq[3]</td>
                  <td class='d-flex justify-content-end'>$re[1]</td></tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>
<script>
function makechart1() {
  $.ajax({

    url: "studentcharts.php",
    method: "post",
    dataType: "json",
    success: function(data) {
      var total = [0, 0];
      total[0] = data[0];
      total[1] = data[1];


      var chart_data = {
        labels: ['Girls', 'Boys'],
        datasets: [{
            label: 'Month',
            data: total,
            backgroundColor: [
              'rgb(0,0,255)', //pink
              'rgb(255,0,0)', //orange


            ],
            borderColor: [
              'rgb(0,0,255)', //pink
              'rgb(255,0,0)', //orange



            ],
            borderWidth: 1,
          }

        ],


      };

      var options = {
        responsive: true,
        cutout: 100,
        scales: {
          x: {
            title: {
              color: 'black',
              display: true,
              text: 'Students',
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
        type: 'doughnut',
        data: chart_data,

        options: options
      });
      //   var barChartCanvas = $("#barChart1").get(0).getContext("2d");
      //  var myChart = new Chart(barChartCanvas, {
      //    type: 'bar',
      //    data: chart_data,
      //    options: options,
      //  });

    }
  });

}
</script>