<?php
include('../connect.php');
include('../teacher/teacher-header.php');
$Id = $_SESSION['Id'];
$inst_id = $_SESSION['Inst_id'];
$p = "select * from staff_tbl where Id='$Id' and Inst_id='$inst_id'";
$r = mysqli_query($con, $p);
$row = mysqli_fetch_array($r);
$page = '';
?>
<html>
<script>
$(document).ready(function() {
  makechart1();

});
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
<script src="../js/jquery-3.1.1.min.js"></script>


<body>
  <div class="d-flex">
    <?php include("teacher-sidebar.php"); ?>
    <div class="teacher-content ">
      <div class="row shadow ml-2" style="border-radius: 20px;background-color:#a6e7ff">

        <div class="col-sm-8 d-flex align-items-center">
          <div class="m-5 " style="line-height: 50px;">
            <p class="text-black" style="font-size: 50px;">Welcome Back!!!</p>
            <h3><?php echo $row['Name'] ?></h3>
            <p class="py-2 text-black" style="line-height: 25px;">
              A Teacher's Purpose is not to create students in his Image, but to develop students who can create their
              Image.
            </p>
          </div>

        </div>
        <div class="col-sm-4 ">
          <img class="card-img-bottom" src="../img/teacher-dashboard.png">
        </div>
      </div>
      <div class="row  mx-1 my-5">
        <div class="col mx-3 shadow" style="border-radius: 20px;background-color:white">
          <div class="row mx-2 mt-2 fs-4 ">
            <div class="col ">
              <p class="text-dark">My Classes</p>
            </div>
            <div class="col text-dark d-flex justify-content-end">
              <a href="studentExam.php" class="text-dark">View All</a>
            </div>
          </div>
          <div class="row my-1 mx-2">
            <div class="col">
              <p class="fs-6">Classes</p>
            </div>
            <div class="col d-flex justify-content-end">
              <p class="fs-6">Subject</p>
            </div>
          </div>

          <?php

          $p = "select Class_id ,count(*) from teacher_wise_subject_tbl where Teacher_id='$Id' and Inst_id='$inst_id' group by Class_id";
          $result = mysqli_query($con, $p);
          while ($r = mysqli_fetch_array($result)) {
            $p1 = "select * from class_tbl where Id='$r[0]'and Insti_id='$inst_id' Limit 3";
            $result1 = mysqli_query($con, $p1);
            $r1 = mysqli_fetch_array($result1);
            echo ' <div class="row my-1 mx-2 " ">
            <div class="col" >
                <p class="fs-5 text-dark">' . $r1[2] . '-' . $r1[7] . '</p>
            </div>
            <div class="col d-flex justify-content-end">
              <p class="fs-5 text-dark">' . $r[1] . '</p>
            </div>
          </div>';
          }
          ?>
        </div>
        <div class="col mx-3 shadow" style="border-radius: 20px;background-color:White">
          <h3 class="p-3">Teacher Team</h3>
          <div class="row my-1 mx-2">
            <div class="col-sm-3">
              <p class="fs-6">Photo</p>
            </div>
            <div class="col ">
              <p class="fs-6">Teacher's Name</p>
            </div>
          </div>
          <?php

          $q = "select * from staff_tbl where Stype='Teaching' and Inst_id='$inst_id' Limit 3";
          $result = mysqli_query($con, $q);
          while ($r = mysqli_fetch_array($result)) {
            echo ' <div class="row my-1 mx-2 " ">
            <div class="col-sm-3" >
                <img src="../Institute-admin/staff_profile/' . $r['Profile'] . '" height=50 width=50 style="border-radius:50%;border-style: solid;
                border-color: black;">
            </div>
            <div class="col ">
              <p class="fs-5 text-dark">' . $r[2] . '</p>
            </div>
          </div>';
          }
          ?>
        </div>

        <?php
        $que = "select * from class_tbl where Teacher_id='$Id' and Insti_id='$inst_id'";
        $r = mysqli_query($con, $que);
        $r1 = mysqli_fetch_array($r);
        $num = mysqli_num_rows($r);
        $que1 = "select Status ,count(*) from attendance_tbl where Inst_id='$inst_id' and Class_id='$r1[0]' and  Date=curdate() Group by Status";
        $r2 = mysqli_query($con, $que1);

        $num1 = mysqli_num_rows($r2);
        if ($num > 0) {
          echo '<div class="col-sm-3 mx-3 ">';
          if ($num1 > 0) {
            while ($r4 = mysqli_fetch_array($r2)) {
              if ($r4[0] == '1') {
                // echo "Present:".$r4[1];
                echo '<div class="row  mb-2 shadow" style="border-radius: 20px;background-color:green">
                        <div class=" d-flex align-items-center text-white">
                            <h3 class="p-3 ">Present:</h3>
                            <h4 class="p-3 justify-content-end"> ' . $r4[1] . '</h4>
                        </div>
                      </div>';
              }
              // else {
              //   // echo "Present:0";
              //   echo '<div class="row mb-2 shadow" style="border-radius: 20px;background-color:#fffdd0">
              //   <div class=" d-flex align-items-center">
              //   <h3 class="p-3 ">Present:</h3>
              //   <h4 class="p-3 justify-content-end"> 0</h4>
              //   </div>
              //   </div>';
              // }

              if ($r4[0] == '0') {
                // echo "Absent:".$r4[1];
                echo '<div class="row mb-2 shadow" style="border-radius: 20px;background-color:red">
                <div class=" d-flex align-items-center text-white">
                <h3 class="p-3 ">Absent:</h3>
                <h4 class="p-3 justify-content-end"> ' . $r4[1] . '</h4>
            </div>
                </div>';
              }
              //   else {
              //     // echo "Absent:0";
              //     echo '<div class="row mb-2 shadow" style="border-radius: 20px;background-color:#fffdd0">
              //     <div class=" d-flex align-items-center">
              //     <h3 class="p-3 ">Absent:</h3>
              //     <h4 class="p-3 justify-content-end"> 0</h4>
              // </div>
              //     </div>';
              //   }

            }
          }
          echo '</div>';
        }

        ?>


      </div>
      <div class="row mx-2">
        <div class="col mx-2 shadow" style="border-radius: 20px;background-color:white">
          <div class="row mx-2 mt-2 fs-4 ">
            <div class="col ">
              <p class="text-dark">Exams</p>
            </div>
            <div class="col text-dark d-flex justify-content-end">
              <a href="studentExam.php" class="text-dark">View All</a>
            </div>
          </div>
          <?php
          // include("admin-sidebar.php");
          $date = date('Y-m-d');
          $q = "select * from exam_tbl where Inst_id='$inst_id' and Exam_Date > curdate()";
          $res = mysqli_query($con, $q) or die("Query Failed");
          $nor = mysqli_num_rows($res);
          if ($nor > 0) {
            while ($r = mysqli_fetch_array($res)) {
              $q1 = "select * from subject_tbl where Id='$r[5]'";
              $result1 = mysqli_query($con, $q1);
              $re1 = mysqli_fetch_array($result1);
              $q2 = "select * from class_tbl where Id='$r[3]'";
              $result2 = mysqli_query($con, $q2);
              $re2 = mysqli_fetch_array($result2);
              echo '
                  <div class="col">
                    <div class="card-body ">
                      <div class="row mb-3">
                        <div class="col d-flex align-items-center" style="max: height 2px;background-color:black;">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-4 d-flex align-items-center">
                          <div class=" d-flex align-items-center">
                            <i class="fa fa-bookmark fs-4 pr-4" aria-hidden="true"></i>
                            <h4> ' . $re1[3] . '</h4>
                          </div>
                        </div>
                        <div class="col-sm-4 d-flex align-items-center">
                          <div class=" d-flex align-items-center">
                            
                            <h4> ' . $re2[2] . '-' . $re2[7] . '</h4>
                          </div>
                        </div>
                        <div class="col d-flex align-items-center justify-content-end">
                          <h4> ' . $r[6] . '</h4>
                        </div>
                      </div>
                    </div>
                    </div>
                  ';
            }
          }
          ?>
        </div>
        <div class="col ml-5 shadow" style="border-radius: 20px;background-color:white">
          <h3 class="my-3">Students</h3>
          <div>
            <canvas id="barChart"></canvas>
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
    url: "teacherchart.php",
    method: "post",
    dataType: "json",
    success: function(data) {
      var classname = [];
      var count = [];
      var color = [];
      for (var i = 0; i < data.length; i++) {
        classname.push(data[i].classname);
        count.push(data[i].count);
        color.push(data[i].color);
      }
      var chart_data = {
        labels: classname,
        datasets: [{
            label: 'Total Students',
            data: count,
            backgroundColor: color,
            borderColor: color,
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
        type: 'bar',
        data: chart_data,

        options: options
      });

    }
  });

}
</script>