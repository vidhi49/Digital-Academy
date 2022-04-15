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
        <div class="content px-3">
            <div class="row mt-5 mx-5">
                <div class="col">
                    <h1>Welcome Admin!!!</h1>
                </div>
            </div>
            <div class="row mx-3">
                <div class="col-lg-6 mt-5">
                    <div class="card" style="border-radius: 20px;background-color:white;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                        <div class="card-body">
                            <!-- <h2 class="d-flex justify-content-end" style="position:absolute;right: 20;">Today's Date:<?php echo date('F-d') ?></h2> -->
                            <div class="d-flex " style="position:absolute;right: 20;">
                                <div>
                                    <h2 class="mb-0 font-weight-normal"><i class="fa fa-sun mr-2"></i>31<sup>C</sup></h2>
                                </div>
                                <div class="ml-2">
                                    <h4 class="location font-weight-normal">Bangalore</h4>
                                    <h6 class="font-weight-normal">India</h6>
                                </div>
                            </div>
                            <img src="../img/master-admin.jpg" alt="img" class="card-img-bottom">
                        </div>
                    </div>


                </div>
                <div class="col-lg-6">
                    <div class="row ">
                        <div class="col-lg-6 mt-5">
                            <div class=" " style="border-radius: 20px;background-color:#ffb752;height:150px;color:white">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col ">
                                            <div class="div">
                                            <?php
                                            $q=mysqli_query($con,"select * from institute_tbl ");
                                            $num=mysqli_num_rows($q);
                                            ?>
                                            <h3 class="pt-3"><?php echo $num?></h3>
                                                <p class="mb-2 fs-3">Total Institute</p>
                                            </div>

                                        </div>
                                        <!-- <div class="col-lg-4 d-flex align-items-center">
                                            <a class="text-center  align-items-center" style="background-color: white;height:70px;width:80px;font-size:50;border-radius:50%">
                                                <i class="fas fa-university mt-2 " style="color:#011f4b"></i></a>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-lg-6 mt-5">
                            <div class=" " style="border-radius: 20px;background-color:#c6e2ff;height:150px">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col ">
                                            <div class="div">
                                            <?php
                                            $q=mysqli_query($con,"select * from inquiry_tbl where status='pending' ");
                                            $num=mysqli_num_rows($q);
                                            ?>
                                            <h3 class="pt-3"><?php echo $num?></h3>
                                                <p class="mb-2 fs-3">Pending Request</p>
                                            </div>

                                        </div>
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
                    <div class="row ">
                        <div class="col-lg-6 mt-5">
                            <div class=" " style="border-radius: 20px;background-color:	#ffffae;height:150px">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col ">
                                            <!-- <div class="div"> -->
                                            <?php
                                            $q=mysqli_query($con,"select * from inquiry_tbl where status='approved' ");
                                            $num=mysqli_num_rows($q);
                                            ?>
                                            <h3 class="pt-3"><?php echo $num?></h3>
                                                <p class="mb-2 fs-3">Approved Request</p>
                                            <!-- </div> -->

                                        </div>
                                        <!-- <div class="col-lg-4 d-flex align-items-center">
                                            <a class="text-center  align-items-center" style="background-color:white;height:70px;width:80px;font-size:50;border-radius:50%">
                                                <i class="fas fa-check mt-2 " style="color:#011f4b"></i></a>
                                        </div> -->
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6 mt-5">
                            <div class="text-light " style="border-radius: 20px;background-color:#011f4b;height:150px">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col ">
                                            <div class="div">
                                            <?php
                                            $q=mysqli_query($con,"select * from inquiry_tbl where status='rejected' ");
                                            $num=mysqli_num_rows($q);
                                            ?>
                                            <h3 class="pt-3"><?php echo $num?></h3>
                                                <p class="mb-2 fs-3">Rejected Request</p>
                                            </div>

                                        </div>
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
            </div>
            <div class="row mx-4 ">
                <div class="col-md-8 mt-5 mr-5 " style="border-radius: 20px;background-color:white;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                    <center>
                        <h4 class="pt-4">Request of Months</h4>
                    </center>
                    <div>
                        <canvas id="barChart"></canvas>
                    </div>


                </div>
                <div class="col mt-5" style="border-radius: 20px;background-color:white;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                    <h3 class="m-3 text-center">Total Admin</h3>
                    <hr>
                    <div>
                        <table class="table table-flush table-hover responsive " >
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
            <div class="row m-4 mt-5 mb-5">
                <div class="col" style="border-radius: 20px;background-color:white;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                    <?php

                    // include("admin-sidebar.php");
                    $q = "select * from institute_tbl Limit 4";
                    $res = mysqli_query($con, $q) or die("Query Failed");
                    $nor = mysqli_num_rows($res);
                    if ($nor > 0) {
                    ?>

                        <div class="table-responsive-md table-sm w-100 p-5">
                            <div class="row">
                                <div class="col text-center">
                                    <h2> Total Institute</h2>
                                </div>
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
//chart
$p = "select * from inquiry_tbl";
$res = mysqli_query($con, $p);
$num = mysqli_num_rows($res);
$all = array();
$approved = array();
$rej = array();
if ($num > 0) {
    for($i=01;$i<=12;$i++){
        while ($r = mysqli_fetch_row($res)) {
            $unixTimestamp = strtotime($r[7]);
            $d = date('j', $unixTimestamp);
            // echo $d;
            if($i!=$d)
            {
                // echo $d;
            }
        }
    }
    
} else


?>

</html>
<script>
    const labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec']
    const data = {
        labels: labels,
        datasets: [{
                label: 'Total Request',
                data: [6, 5, 1, 5, 1, 5, 9, 5, 6, 5, 9, 4],
                backgroundColor: [
                    'rgb(255, 99, 132)',//pink
                    'rgb(255, 159, 64)',//orange
                    'rgb(255, 205, 86)',//yellow
                    'rgb(75, 192, 192)',//info
                    'rgb(54, 162, 235)',//blue
                    'rgb(153, 102, 255)',//vio
                    'rgb(201, 203, 207)',//grey
                    'rgb(255, 99, 132)',//pink
                    'rgb(255, 159, 64)',//orange
                    'rgb(255, 205, 86)',//yellow
                    'rgb(75, 192, 192)',//info
                    // 'rgb(54, 162, 235)',//blue
                    // 'rgb(153, 102, 255)',//vio
                    // 'rgb(201, 203, 207)',//grey
                    // 'rgb(255, 99, 132)',
                    // 'rgb(255, 99, 132)',
                    // 'rgb(255, 99, 132)',
                    // 'rgb(255, 99, 132)',
                    // 'rgb(255, 99, 132)',
                    // 'rgb(255, 99, 132)',
                    // 'rgb(255, 99, 132)',
                    // 'rgb(255, 99, 132)',
                    // 'rgb(255, 99, 132)',
                    // 'rgb(255, 99, 132)',
                    // 'rgb(255, 99, 132)',
                    // 'rgb(255, 99, 132)'

                ],
                borderColor: [
                    'rgb(255, 99, 132)',//pink
                    'rgb(255, 159, 64)',//orange
                    'rgb(255, 205, 86)',//yellow
                    'rgb(75, 192, 192)',//info
                    'rgb(54, 162, 235)',//blue
                    'rgb(153, 102, 255)',//vio
                    'rgb(201, 203, 207)',//grey
                    'rgb(255, 99, 132)',//pink
                    'rgb(255, 159, 64)',//orange
                    'rgb(255, 205, 86)',//yellow
                    'rgb(75, 192, 192)',//info
                    // 'rgb(255, 99, 132)',
                    // 'rgb(255, 99, 132)',
                    // 'rgb(255, 99, 132)',
                    // 'rgb(255, 99, 132)',
                    // 'rgb(255, 99, 132)',
                    // 'rgb(255, 99, 132)',
                    // 'rgb(255, 99, 132)',
                    // 'rgb(255, 99, 132)',
                    // 'rgb(255, 99, 132)',
                    // 'rgb(255, 99, 132)',
                    // 'rgb(255, 99, 132)',
                    // 'rgb(255, 99, 132)'

                ],
                borderWidth: 1,
            },
            // {
            //     label: 'Approved Request',
            //     data: [5, 0, 8, 1, 0, 5, 6, 0, 3, 5, 2, 5],
            //     backgroundColor: [
            //         'rgb(153, 102, 255)',
            //         'rgb(153, 102, 255)',
            //         'rgb(153, 102, 255)',
            //         'rgb(153, 102, 255)',
            //         'rgb(153, 102, 255)',
            //         'rgb(153, 102, 255)',
            //         'rgb(153, 102, 255)',
            //         'rgb(153, 102, 255)',
            //         'rgb(153, 102, 255)',
            //         'rgb(153, 102, 255)',
            //         'rgb(153, 102, 255)',
            //         'rgb(153, 102, 255)'
            //     ],
            //     borderColor: [
            //         'rgb(153, 102, 255)',
            //         'rgb(153, 102, 255)',
            //         'rgb(153, 102, 255)',
            //         'rgb(153, 102, 255)',
            //         'rgb(153, 102, 255)',
            //         'rgb(153, 102, 255)',
            //         'rgb(153, 102, 255)',
            //         'rgb(153, 102, 255)',
            //         'rgb(153, 102, 255)',
            //         'rgb(153, 102, 255)',
            //         'rgb(153, 102, 255)',
            //         'rgb(153, 102, 255)'

            //     ],
            //     borderWidth: 1,
            // },
            // {
            //     label: 'Rejected Request',
            //     data: [6, 3, 1, 5, 0, 5, 0, 5, 8, 5, 9, 4],
            //     backgroundColor: [
            //         'rgb(255, 205, 86)',
            //         'rgb(255, 205, 86)',
            //         'rgb(255, 205, 86)',
            //         'rgb(255, 205, 86)',
            //         'rgb(255, 205, 86)',
            //         'rgb(255, 205, 86)',
            //         'rgb(255, 205, 86)',
            //         'rgb(255, 205, 86)',
            //         'rgb(255, 205, 86)',
            //         'rgb(255, 205, 86)',
            //         'rgb(255, 205, 86)',
            //         'rgb(255, 205, 86)'
            //     ],
            //     borderColor: [
            //         'rgb(255, 205, 86)',
            //         'rgb(255, 205, 86)',
            //         'rgb(255, 205, 86)',
            //         'rgb(255, 205, 86)',
            //         'rgb(255, 205, 86)',
            //         'rgb(255, 205, 86)',
            //         'rgb(255, 205, 86)',
            //         'rgb(255, 205, 86)',
            //         'rgb(255, 205, 86)',
            //         'rgb(255, 205, 86)',
            //         'rgb(255, 205, 86)',
            //         'rgb(255, 205, 86)'

            //     ],
            //     borderWidth: 1,
            // }
        ]
    };
    // const config = {
    //     type: 'bar',
    //     data: data,
    //     options: {
    //         scales: {
    //             y: {
    //                 beginAtZero: true
    //             }
    //         }
    //     },
    // };
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
                    beginAtZero: true
                }
            }]
        },

    };
    // var myChart = new Chart(
    //     document.getElementById('barChart'),
    //     config
    // );
    if ($("#barChart").length) {
        var barChartCanvas = $("#barChart").get(0).getContext("2d");
        // This will get the first returned node in the jQuery collection.
        var myChart = new Chart(barChartCanvas, {
            type: 'bar',
            data: data,
            options: options
        });
    }
</script>