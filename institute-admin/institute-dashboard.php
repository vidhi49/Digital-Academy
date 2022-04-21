<?php include("../connect.php");
// session_start();
// include("../admin/admin-header.php");
include("../institute-admin/change-header.php");
// include("../institute-admin/institute-header.php");
$a = "institutedashboard";
$inst_id = $_SESSION['inst_id'];
?>
<html>

<head>
  <!-- <link type="text/css" rel="stylesheet" href="../css/calendercss.css"> -->
  <!-- <link rel="stylesheet" href="../css/dist/calendar-gc.min.css"> -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
  <script src="../js/jquery-3.1.1.min.js"></script>

  <script>
  $(document).ready(function() {
    makechart2();
    makechart1();

  });
  </script>

</head>

<style>
@media only screen and (max-width: 500px) {
  .card {
    padding: 0px !important;
  }
}
</style>

<body>
  <div class="d-flex">
    <?php
    include("institute-sidebar.php");
    ?>
    <div class="institute-content">
      <div class="mb-5">
        <h1>Admin Dashboard</h1>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="card shadow bg-white " style="border-radius: 20px;">
            <div class="card-body p-4">
              <div class="row">
                <div class="col-6">
                  <h2 class="text-black font-w700">
                    <?php
                    $q = "select * from student_tbl where Inst_id='$inst_id'";
                    $res = mysqli_query($con, $q);
                    $num = mysqli_num_rows($res);
                    echo $num;
                    ?>
                  </h2>
                  <p class="mb-0 text-black font-w600">Total Students</p>
                </div>
                <div class="col-6">
                  <svg class="primary-icon float-right" width="60" height="60" viewBox="0 0 60 60" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M57.4998 47.5001C57.4998 48.1631 57.2364 48.799 56.7676 49.2678C56.2987 49.7367 55.6629 50.0001 54.9998 50.0001H24.9998C24.3368 50.0001 23.7009 49.7367 23.2321 49.2678C22.7632 48.799 22.4998 48.1631 22.4998 47.5001C22.4998 43.5218 24.0802 39.7065 26.8932 36.8935C29.7063 34.0804 33.5216 32.5001 37.4998 32.5001H42.4998C46.4781 32.5001 50.2934 34.0804 53.1064 36.8935C55.9195 39.7065 57.4998 43.5218 57.4998 47.5001ZM39.9998 10.0001C38.022 10.0001 36.0886 10.5866 34.4441 11.6854C32.7996 12.7842 31.5179 14.346 30.761 16.1732C30.0041 18.0005 29.8061 20.0112 30.192 21.951C30.5778 23.8908 31.5302 25.6726 32.9288 27.0711C34.3273 28.4697 36.1091 29.4221 38.0489 29.8079C39.9887 30.1938 41.9994 29.9957 43.8267 29.2389C45.6539 28.482 47.2157 27.2003 48.3145 25.5558C49.4133 23.9113 49.9998 21.9779 49.9998 20.0001C49.9998 17.3479 48.9463 14.8044 47.0709 12.929C45.1955 11.0536 42.652 10.0001 39.9998 10.0001ZM17.4998 10.0001C15.522 10.0001 13.5886 10.5866 11.9441 11.6854C10.2996 12.7842 9.0179 14.346 8.26102 16.1732C7.50415 18.0005 7.30611 20.0112 7.69197 21.951C8.07782 23.8908 9.03022 25.6726 10.4287 27.0711C11.8273 28.4697 13.6091 29.4221 15.5489 29.8079C17.4887 30.1938 19.4994 29.9957 21.3267 29.2389C23.1539 28.482 24.7157 27.2003 25.8145 25.5558C26.9133 23.9113 27.4998 21.9779 27.4998 20.0001C27.4998 17.3479 26.4463 14.8044 24.5709 12.929C22.6955 11.0536 20.152 10.0001 17.4998 10.0001ZM17.4998 47.5001C17.4961 44.8741 18.0135 42.2735 19.0219 39.8489C20.0304 37.4242 21.5099 35.2238 23.3748 33.3751C21.8487 32.7989 20.2311 32.5025 18.5998 32.5001H16.3998C12.7153 32.5067 9.18366 33.9733 6.57833 36.5786C3.97301 39.1839 2.50643 42.7156 2.49982 46.4001V47.5001C2.49982 48.1631 2.76321 48.799 3.23205 49.2678C3.70089 49.7367 4.33678 50.0001 4.99982 50.0001H17.9498C17.6588 49.1984 17.5066 48.3529 17.4998 47.5001Z"
                      fill="#1E33F2" />
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card shadow bg-white" style="border-radius: 20px;">
            <div class="card-body p-4">
              <div class="row">
                <div class="col-6">
                  <h2 class="text-black font-w700">
                    <?php
                    $q = "select * from staff_tbl where Inst_id='$inst_id'";
                    $res = mysqli_query($con, $q);
                    $num = mysqli_num_rows($res);
                    echo $num;
                    ?>
                  </h2>
                  <p class="mb-0 text-black font-w600">Total Teachers</p>
                </div>
                <div class="col-6 ">
                  <svg class="primary-icon float-right" width="60" height="60" viewBox="0 0 60 60" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M59.0284 17.8807L30.7862 3.81817C30.2918 3.57103 29.7082 3.57103 29.2138 3.81817L0.971602 17.8807C0.375938 18.1794 0 18.787 0 19.4531C0 20.1192 0.375938 20.7268 0.971602 21.0255L29.2138 35.088C29.4609 35.2116 29.7305 35.2734 30 35.2734C30.2695 35.2734 30.5391 35.2116 30.7862 35.088L59.0284 21.0255C59.6241 20.7268 60 20.1192 60 19.4531C60 18.787 59.6241 18.1794 59.0284 17.8807Z"
                      fill="#1E33F2" />
                    <path
                      d="M56.4844 46.1441V26.2285L52.9688 27.9863V46.1441C50.9271 46.8722 49.4531 48.805 49.4531 51.0937V54.6093C49.4531 55.5809 50.2393 56.3671 51.2109 56.3671H58.2422C59.2138 56.3671 60 55.5809 60 54.6093V51.0937C60 48.805 58.526 46.8722 56.4844 46.1441Z"
                      fill="#1E33F2" />
                    <path
                      d="M32.3586 38.2329C31.6308 38.5967 30.8154 38.789 30 38.789C29.1846 38.789 28.3692 38.5967 27.6414 38.2329L10.5469 29.7441V33.5156C10.5469 40.4147 19.1578 45.8203 30 45.8203C40.8422 45.8203 49.4531 40.4147 49.4531 33.5156V29.7441L32.3586 38.2329Z"
                      fill="#1E33F2" />
                  </svg>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
      <div class="row  mt-5 mb-5"
        style="border-radius: 20px;background-color:white;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
        <?php
        // include("admin-sidebar.php");
        $date = date('Y-m-d');
        $q = "select * from exam_tbl where Inst_id='$inst_id' and Exam_Date < curdate()-7";
        $res = mysqli_query($con, $q) or die("Query Failed");
        $nor = mysqli_num_rows($res);
        if ($nor > 0) {
        ?>

        <div class="table-responsive-md table-sm w-100 p-5">
          <div class="row text-center">
            <h2>Upcoming Exam</h2>
          </div>
          <hr><br>
          <table class="table table-flush table-hover responsive" id="dataTableHover">
            <thead class="thead-light">
              <tr>
                <th scope="th-sm">Exam Name</th>
                <th scope="th-sm">Class</th>
                <th scope="th-sm">Section</th>
                <th scope="th-sm">Subject</th>
                <th scope="th-sm">Exam Date</th>
              </tr>
              </tr>
            </thead>
            <tbody>
              <?php

              while ($r = mysqli_fetch_array($res)) {
                echo "<tr>";

                echo "<td>$r[2]</td>"; //name
                $q = "select * from class_tbl where Id='$r[3]'";
                $result = mysqli_query($con, $q);
                $re = mysqli_fetch_array($result);
                echo "<td>$re[2]</td>"; //email
                $q1 = "select * from subject_tbl where Id='$r[5]'";
                $result1 = mysqli_query($con, $q1);
                $re1 = mysqli_fetch_array($result1);
                echo "<td>$r[4]</td>"; //add
                echo "<td>$re1[3]</td>"; //add


                echo "<td>$r[6]</td>"; //cont

              }
              echo "</tr>";
            } else {
              echo "<center><h1>No Institute is Found</h1></center>";
            }
              ?>
            </tbody>
          </table>
          <center><a href="payment_rpt.php" class="text-dark fs-5">View All</a></center>
        </div>

      </div>
      <div class="row mt-5 ">
        <div class="col-sm-6">
          <div style="border-radius: 20px;background-color:white;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
            <center>
              <h4 class="pt-4">Total Staff</h4>
            </center>
            <div>
              <canvas id="barChart"></canvas>
            </div>
          </div>

        </div>
        <div class="col-sm-6">
          <div style="border-radius: 20px;background-color:white;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
            <h3 class="text-center pt-4">Student Attendance</h3>
            <div>
              <canvas id="barChart1"></canvas>
            </div>

          </div>
        </div>
      </div>
      <div class="row mt-5 mb-5"
        style="border-radius: 20px;background-color:white;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
        <?php

        // include("admin-sidebar.php");
        $q = "select * from payments where insti_id='$inst_id' and Paid_amount < Amount";
        $res = mysqli_query($con, $q) or die("Query Failed");
        $nor = mysqli_num_rows($res);
        if ($nor > 0) {
        ?>

        <div class="table-responsive-md table-sm w-100 p-5">
          <div class="text-center">
            <h2> Total Institute</h2>
          </div>

          <hr><br>
          <table class="table table-flush table-hover " id="dataTableHover">
            <thead class="thead-light">
              <tr>
                <th scope="th-sm">Photo</th>
                <th scope="th-sm">Name</th>
                <th scope="th-sm">Class</th>
                <th scope="th-sm">Section</th>
                <th scope="th-sm">Pending Amount</th>
                <th scope="th-sm">Actual Fee</th>
              </tr>
              </tr>
            </thead>
            <tbody>
              <?php

              while ($r = mysqli_fetch_array($res)) {
                echo "<tr>";
                $query = "select * from student_tbl where Id='$r[3]'";
                $result = mysqli_query($con, $query);
                $res1 = mysqli_fetch_array($result);
                echo "<td><img class='popup' src='student_profile/$res1[17]' style='border-radius:50%' height='50' width='50'></td>"; //logo
                echo "<td>$r[5]</td>"; //name
                echo "<td>$r[6]</td>"; //email
                echo "<td>$r[7]</td>"; //add
                echo "<td class='text-danger'>$r[9]</td>"; //cont
                echo "<td>$r[8]</td>"; //date

              }
              echo "</tr>";
            } else {
              echo "<center><h1>No Institute is Found</h1></center>";
            }
              ?>
            </tbody>
          </table>
          <center><a href="payment_rpt.php" class="text-dark fs-5">View All</a></center>
        </div>

      </div>

    </div>
  </div>
</body>
<script>
function makechart1() {

  $.ajax({
    url: "instcharts.php",
    data: "teaching=teaching",
    method: "post",
    dataType: "json",
    success: function(data) {
      var total = [0, 0];
      total[0] = data[0];
      total[1] = data[1];

      var chart_data = {
        labels: ['Teaching Staff', 'Non-Teaching'],
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
        cutout: 180,
        scales: {
          x: {
            title: {
              color: 'black',
              display: true,
              text: 'Staff',
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

function makechart2() {

  $.ajax({
    url: "instcharts2.php",
    data: "att=att",
    method: "post",
    dataType: "json",
    success: function(data) {
      var total = [0, 0];
      total[0] = data[0];
      total[1] = data[1];
      var chart_data = {
        labels: ['Present', 'Absent'],
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

          }

        ],


      };

      var options = {
        responsive: true,
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
      var barChartCanvas1 = $("#barChart1").get(0);
      var myChart = new Chart(barChartCanvas1, {
        type: 'pie',
        data: chart_data,
        options: options,
      });

    }
  });

}
</script>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="../css/dist/calendar-gc.min.js"></script>
<script>
  $(function(e) {
    var calendar = $("#calendar").calendarGC({
      dayBegin: 0,
      prevIcon: '&#x3c;',
      nextIcon: '&#x3e;',
      onPrevMonth: function(e) {
        console.log("prev");
        console.log(e)
      },
      onNextMonth: function(e) {
        console.log("next");
        console.log(e)
      },
      events: [{
          date: new Date("2022-02-07"),
          eventName: "Holiday",
          className: "badge bg-danger",
          onclick(e, data) {
            console.log(data);
          },
          dateColor: "red"
        },
        {
          date: new Date("2022-02-07"),
          eventName: "Holiday with wife",
          className: "badge bg-danger",
          onclick(e, data) {
            console.log(data);
          },
          dateColor: "red"
        },
        {
          date: new Date("2022-02-08"),
          eventName: "Working day",
          className: "badge bg-success",
          onclick(e, data) {
            console.log(data);
          },
          dateColor: "green"
        }
      ],
      onclickDate: function(e, data) {
        console.log(e, data);
      }
    });
  })
</script>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script');
    ga.type = 'text/javascript';
    ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(ga, s);
  })();
</script>
<script>
  try {
    fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", {
      method: 'HEAD',
      mode: 'no-cors'
    })).then(function(response) {
      return true;
    }).catch(function(e) {
      var carbonScript = document.createElement("script");
      carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
      carbonScript.id = "_carbonads_js";
      document.getElementById("carbon-block").appendChild(carbonScript);
    });
  } catch (error) {
    console.log(error);
  }
</script> -->

</html>