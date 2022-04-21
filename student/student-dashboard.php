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

<body>
  <div class="d-flex">
    <?php include("student-sidebar.php"); ?>
    <div class="student-content mt-2 p-3">
      <div class="">
        <div class="row shadow mx-5" style="border-radius: 20px;background-color:#fffdd0">
          <div class="col-sm-8 d-flex align-items-center">
            <div class="m-5 " style="line-height: 50px;">
              <p class="" style="font-size: 50px;">Welcome Back!!!</p>
              <h3><?php echo $row['Name'] ?></h3>
              <p class="py-2" style="line-height: 25px;">Education is one of the most powerful aspects of life.
                Education and learning allow us to make sense of the world around us and where we fit within the world.</p>
            </div>

          </div>
          <div class="col-sm-4 ">
            <img class="card-img-bottom" src="../img/student-dashboard.png">
          </div>
        </div>
        <div class="row mx-4 mt-4">
          <div>
            <h3 class="my-2 p-3">Your Class Details</h3>
          </div>
          <div class="col mb-2">
            <div class="card-body shadow" style="border-radius: 20px;background-color:#ff9999">
              <div class="row">
                <div class="col-sm-3 d-flex align-items-center">
                  <div class="p-3 bg-light" style="border-radius: 50px;">
                    <?php
                    $que = mysqli_query($con, "select count(*) from teacher_wise_subject_tbl where Class_id='$row[15]' and Inst_id='$inst_id' group by Class_id");
                    $result2 = mysqli_fetch_array($que);
                    echo "<b class='p-3 fs-1'>$result2[0]</b>";
                    ?>
                  </div>
                </div>
                <div class="col px-4 d-flex align-items-center">
                  <h2> Subject Teachers</h2>
                  <!-- <h6>[<?php echo $row[13] . "-" . $row[14] ?>]</h6> -->
                </div>
              </div>
            </div>
          </div>
          <div class="col mb-2">
            <div class="card-body shadow" style="border-radius: 20px;background-color:#ff9999">
              <div class="row">
                <div class="col-sm-3 d-flex align-items-center">
                  <div class="p-3 bg-light" style="border-radius: 50px;">
                    <?php
                    $que = mysqli_query($con, "select count(*) from student_tbl where Class_id='$row[15]' and Inst_id='$inst_id' group by Class_id");
                    $result2 = mysqli_fetch_array($que);
                    echo "<b class='p-3 fs-1'>$result2[0]</b>";
                    ?>
                  </div>
                </div>
                <div class="col px-4 d-flex align-items-center">
                  <h2> Total Student</h2>
                  <!-- <h6>[<?php echo $row[13] . "-" . $row[14] ?>]</h6> -->
                </div>
              </div>
            </div>
          </div>
          <div class="col mb-2">
            <div class="card-body shadow" style="border-radius: 20px;background-color:#ff9999">
              <div class="row">
                <div class="col-sm-3 d-flex align-items-center">
                  <div class="p-3 bg-light" style="border-radius: 50px;">
                    <?php
                    $que = mysqli_query($con, "select count(*) from subject_tbl where Class_id='$row[15]' and Inst_id='$inst_id' group by Class_id");
                    $result2 = mysqli_fetch_array($que);
                    echo "<b class='p-3 fs-1'>$result2[0]</b>";
                    ?>
                  </div>
                </div>
                <div class="col px-4 d-flex align-items-center">
                  <h2> Subjects</h2>
                  <!-- <h6>[<?php echo $row[13] . "-" . $row[14] ?>]</h6> -->
                </div>
              </div>
            </div>
          </div>
        </div>



      </div>
      <div class="row  mt-5 mx-2">
        <?php
        // include("admin-sidebar.php");
        $date = date('Y-m-d');
        $q = "select * from exam_tbl where Inst_id='$inst_id' and Class_id='$row[15]' and Exam_Date > curdate()+7";
        $res = mysqli_query($con, $q) or die("Query Failed");
        $nor = mysqli_num_rows($res);
        if ($nor > 0) {
        ?>

          <div class="col">
            <div class="row mx-2 fs-4">
              <div class="col ">
                <p class="">Exams</p>
              </div>
              <div class="col d-flex justify-content-end">
                <a href="studentExam.php">View All</a>
              </div>
            </div>
          <?php

          while ($r = mysqli_fetch_array($res)) {


            $q1 = "select * from subject_tbl where Id='$r[5]'";
            $result1 = mysqli_query($con, $q1);
            $re1 = mysqli_fetch_array($result1);
            echo '
                        
                              <div class="col mt-3">
                                <div class="card-body shadow" style="border-radius: 0px;background-color:#d0f0c0">
                                  <div class="row">
                                    <div class="col-sm-4 d-flex align-items-center">
                                      <div class=" d-flex align-items-center">
                                        <i class="fa fa-bookmark fs-4 pr-4" aria-hidden="true"></i>
                                        <h4> ' . $re1[3] . '</h4>
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
        } else {
          echo "<center><h1>No Institute is Found</h1></center>";
        }
          ?>

          </div>
          <div class="col-sm-4 p-4 mx-2 shadow" style="border-radius: 20px;background-color:#f0ffff">
            <h3>Students of <?php echo $row[13] . '-' . $row[14] ?></h3>
            <div>
              <canvas id="barChart"></canvas>
            </div>
          </div>

      </div>
      <div class="row " style="padding-top: 10px;">

        <div class="col p-4 mx-2 shadow" style="border-radius: 20px;background-color:#f0ffff">
          <table class="table table-flush table-hover responsive ">
            <div class="row mx-2 fs-4">
              <div class="col ">
                <p class="">Student List</p>
              </div>
              <div class="col d-flex justify-content-end">
                <a href="student.php">View All</a>
              </div>
            </div>
            <tbody>
              <?php
              $que = "select * from student_tbl where  Class_id='$row[15]' Limit 5 ";
              $result = mysqli_query($con, $que);
              $cnt = 0;
              while ($r = mysqli_fetch_array($result)) {
                $cnt = $cnt + 1;
                echo "<tr>
                                       <td>$cnt</td>
                                       <td>
                                        <img class='popup' src='student_profile/$r[6]' alt='image'  height='50' width='50'>
                                        </td>
                                        <td>$r[4]</td>
                                       </tr>";
              }

              ?>

            </tbody>
          </table>
        </div>
        <div class="col p-4 mx-2 shadow" style="border-radius: 20px;background-color:#f0ffff">

          <table class="table table-flush table-hover responsive ">
            <div class="row mx-2 fs-4">
              <div class="col ">
                <p class="">Material Uploaded</p>
              </div>
              <div class="col d-flex justify-content-end">
                <a href="subjectMaterial.php">View All</a>
              </div>
            </div>
            <tbody>
              <?php
              $q = "select * from student_tbl where  Id='$Id' and Inst_id='$inst_id'";
              $res = mysqli_query($con, $q);
              // echo $q;
              $nor = mysqli_num_rows($res);
              while ($r = mysqli_fetch_array($res)) {
                $q6 = "select * from class_tbl where Insti_id='$inst_id' and Id='$r[15]'";
                // echo $q6;
                $resc = mysqli_query($con, $q6);
                $rs3 = mysqli_fetch_array($resc);

                $q2 = "select * from class_tbl where Insti_id='$inst_id' and Name='$rs3[2]' and Section='A'";
                // echo $q2;
                $res2 = mysqli_query($con, $q2);
                $rs2 = mysqli_fetch_array($res2);


                $c = "select * from subject_tbl where Class_id='$rs2[0]' and Inst_id='$inst_id'";
                // echo $c;
                $res1 = mysqli_query($con, $c);
                while ($rs = mysqli_fetch_array($res1)) {
              ?>

                  <div class="row">
                    <div class="col">
                      <?php echo $rs[3]; ?>
                    </div>
                    <!-- <div class="col d-flex justify-content-end"> -->
                      <!-- <li class="fa fa-bookmark fs-1 ms-5 text-dark"></li>-->
                    <div class="col d-flex justify-content-end p-3 bg-light" style="border-radius: 50px;">
                    <!-- <?php
                    
                    // $que = mysqli_query($con, "select count(*) from studentMaterialList_tbl where Class_id='$row[15]' and Inst_id='$inst_id' and  Subject_Id='$subid'group by Subject_id");
                    // $result2 = mysqli_fetch_array($que);
                    // echo "<b class='p-3 fs-1'>$result2[0]</b>";
                    ?> -->
                  </div>
                    </div>
                  </div>
        </div>
      </div>
    </div>
    </a>

<?php
                }
              }
              // echo $q; 
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