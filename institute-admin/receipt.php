<?php
include("../connect.php");
include("../institute-admin/change-header.php");
$inst_id = $_SESSION['inst_id'];
$a = 'payment_rpt';


?>

<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<div class="page-content container">
    <div class="page-header text-blue-d2 p-5 text-center">
        <h1>
            Fee Receipt
        </h1>

    </div>

    <div class="container px-0">
        <div class="row ">
            <div class="col-12 col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center">
                            <i class=" text-success-m2 mr-1"></i>
                            <span class="text-default-d3"><h3>
                                <?php
                                    $query = "Select * from institute_tbl where Id=$inst_id;";
                                    $rs= mysqli_query($con,$query);
                                    $num=mysqli_num_rows($rs);
                                    $sn = 0;
                                    if ($num > 0) {
                                      while ($rows = $rs->fetch_array()) {
                                        $sn = $sn + 1;
                                        echo"
                                        <td><b>" . $rows['Name'] . "</b></td><br>
                                        <td>".$rows['Address']."</td>";
                                      }
                                    }
                                ?>
</h3>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- .row -->

                <hr class="row brc-default-l1 mx-n1 mb-4" />

                <div class="row">
                    <div class="col-sm-6">
                        <div>
                            <span class=" ">Gr No.:</span>
                            <span class="text-600 text-110 text-blue align-middle">
                                    <?php
                                        
                                        $inst_id = $_SESSION['inst_id'];
                                        $id = $_REQUEST['Id'];
                                        $q = "select * from payments where Gr_no='$id'";
                                        // echo $q;
                                        $res = mysqli_query($con, $q);
                                        $r = mysqli_fetch_array($res);
                                         $rs= mysqli_query($con,$q);
                                         $num=mysqli_num_rows($rs);
                                         $sn = 0;
                                         if ($num > 0) {
                                           while ($rows = $rs->fetch_array()) {
                                             $sn = $sn + 1;
                                             echo"
                                             <td><b>" . $rows['Gr_no'] . "</b></td><br>";
                                             
                                           }
                                         }
                                    ?>

                            </span>
                        </div>
                        <div class="text-grey-m2">
                            <div class="my-1">
                            <?php
                                        
                                        $inst_id = $_SESSION['inst_id'];
                                        $id = $_REQUEST['Id'];
                                        $query = "select * from student_tbl where  Inst_id='$inst_id' AND Grno='$id'";
                                        // echo $q;
                                        $res = mysqli_query($con, $q);
                                        $r = mysqli_fetch_array($res);
                                        // $query = "select * from student_tbl where  Inst_id='$inst_id'";
                                        // $query = "SELECT * FROM student_tbl where Inst_id='$inst_id' AND Id='$studid'";
                                         $rs= mysqli_query($con,$query);
                                         $num=mysqli_num_rows($rs);
                                         $sn = 0;
                                         if ($num > 0) {
                                           while ($rows = $rs->fetch_array()) {
                                             $sn = $sn + 1;
                                             echo"
                                             <td><b>"  . $rows['Name'] . "</b></td><br>
                                             <td><b>" . $rows['Address'] . "</b></td><br>
                                             <td><b>" . $rows['State'] . "," . $rows['Country'] . "</b></td><br>
                                             <td><b>" . $rows['Mobileno'] . "</b></td><br>";
                                             
                                           }
                                         }
                                    ?>

                            </div>
                            
                             </div>
                    </div>
                    <!-- /.col -->

                    <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                        <hr class="d-sm-none" />
                        <div class="text-grey-m2">
                            <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                Invoice
                            </div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">ID:</span> #111-222</div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Issue Date: <?php echo date("Y-m-d"); ?></span>  </div>

                            <!-- <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status:</span> <span class="badge badge-warning badge-pill px-25">Unpaid</span></div> -->
                        </div>
                    </div>
                    <!-- /.col -->
                </div>

                <div class="mt-4">
                    <div class="row text-600 text-black bgc-default-tp1 py-25">
                        <!-- <div class="d-none d-sm-block col-1">#</div> -->
                        
                        <!-- <div class="col-8 text-left "><h4>Particulars</h4>
                            <span>Payable Fee</span><br>
                            <span>Paid Fee</span><br>
                            <span>Total Fee</span>
                        </div>
                        <div class="col-4 text-right"><h4>Amount</h4></div>
                    </div> -->

                  <br>

                    <div class="row border-b-2 brc-default-l2">
                    <hr class="row brc-default-l1 mx-n1 mb-4" />
                    <div class="row  ">
                        <!-- <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                            
                        </div> -->

                        <div class="col  text-grey text-90 order-first order-sm-last">
                            <div class="row my-2">
                                <div class="col text-left">
                                    Payable fee
                                </div>
                                <div class="col text-right">
                                    <span class="">
                                    <?php
                                        $grno=$_REQUEST['Id'];
                                        $payments = "SELECT * from payments where Gr_no='$grno'";
                                        // echo $payments;
                                        //$rs = $con->query($payments);
                                        $rs = mysqli_query($con, $payments);
                                        
                                        $num = $rs->num_rows;
                                        $sn = 0;
                                        if ($num > 0) {
                                            while ($payments = $rs->fetch_assoc()) {
                                                $sn = $sn + 1;
                                                $a = $payments['Amount'] - $payments['Paid_amount'];
                                                echo"<td>" . $a . "</td>";
                                            }
                                        }
                                        ?>

                                    </span>
                                </div>
                            </div>

                            <div class="row my-2">
                                <div class="col text-left">
                                    Paid Fees
                                </div>
                                <div class="col text-right">
                                    <span class="">
                                    <?php
                                        $grno=$_REQUEST['Id'];
                                        $payments = "SELECT * from payments where Gr_no='$grno'";

                                        //$rs = $con->query($payments);
                                        $rs = mysqli_query($con, $payments);

                                        $num = $rs->num_rows;
                                        $sn = 0;
                                        if ($num > 0) {
                                            while ($payments = $rs->fetch_assoc()) {
                                                $sn = $sn + 1;
                                                echo"<td>" . $payments['Paid_amount'] . "</td>";
                                            }
                                        }
                                        ?>
                                    </span>
                                </div>
                            </div>
                                         
                            <div class="row my-2">
                                <div class="col text-left">
                                    Total Amount
                                </div>
                                <div class="col text-right">
                                    <span class="">
                                    <?php
                                        $grno=$_REQUEST['Id'];
                                        $payments = "SELECT * from payments where Gr_no='$grno'";

                                        //$rs = $con->query($payments);
                                        $rs = mysqli_query($con, $payments);

                                        $num = $rs->num_rows;
                                        $sn = 0;
                                        if ($num > 0) {
                                            while ($payments = $rs->fetch_assoc()) {
                                                $sn = $sn + 1;
                                                echo"<td>" . $payments['Amount'] . "</td>";
                                            }
                                        }
                                        ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <hr />

                    <div class="text-center">
                        <span class="">All above mentioned payments are non-refundable</span>
                        <!-- <a href="#" class="btn btn-info btn-bold px-4 float-right mt-3 mt-lg-0">Pay Now</a> -->
                    </div>
                    <div class="page-tools">
            <div class="action-buttons">
                
                <a class="btn bg-white btn-light mx-1px text-95" href="pending_fees_rpt.php?Id=<?php echo $grno?>" >
                    <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                    Print
                </a>
                
            </div>
        </div> 
                </div>
            </div>
        </div>
    </div>
</div>

</body>