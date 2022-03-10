<?php
include("../connect.php");
session_start();
$inst_id = $_SESSION['inst_id'];
?>

<head>
    <style>
        .modal.fade .modal-dialog.modal-dialog-zoom {
            -webkit-transform: translate(0, 0)scale(.5);
            transform: translate(0, 0)scale(.5);
        }

        .modal.show .modal-dialog.modal-dialog-zoom {
            -webkit-transform: translate(0, 0)scale(1);
            transform: translate(0, 0)scale(1);
        }


        .bg-c-lite-green {
            background: -webkit-gradient(linear from(#191970), to(#87CEFA));
            background: linear-gradient(to top, #87CEFA, #191970)
        }

        @media only screen and (min-width: 1400px) {
            p {
                font-size: 14px
            }
        }

        .close {
            position: absolute;
            top: 4px;
            right: 1px;
        }

        #circle {
            background: white;
            border-radius: 50%;
            border: 2px solid #191970;
            width: 100px;
            height: 100px;
            display: inline-block;
            text-align: center;
            padding: 10px;
            font-size: 45px;
            font-weight: 30%;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Aclonica&family=Nova+Slim" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <link href="../css/css/ruang-admin.min.css" rel="stylesheet"> -->
</head>
<div id="stud-table">
    <div class="table-responsive p-3">
        <!-- <table class="table table-flush table-hover" id="dataTableHover"> -->
        <table class="table table-flush table-hover" >
            <thead class="thead-light">
                <tr>
                    <th scope="th-md" style="width:0%;">#</th>
                    <th scope="th-md" style="width:0%;">Photo</th>
                    <th scope="th-md" style="width:0%;">Name</th>
                    <th scope="th-md" style="width:0%;">ID</th>
                    <th scope="th-md" style="width:0%;">Gender</th>
                    <th scope="th-md" style="width:0%;">Designation</th>
                    <th scope="th-md" style="width:0%;">Email</th>
                    <th scope="th-md" style="width:22%;">Dob</th>
                    <th scope="th-md" style="width:22%;">Doj</th>
                    <th scope="th-md" style="width:30%;">Action</th>

                </tr>
            </thead>

            <tbody>

                <?php
                include("../connect.php");
                $query = "SELECT * FROM staff_tbl where Inst_id='$inst_id'";
                $rs = $con->query($query);
                $num = $rs->num_rows;
                $sn = 0;
                if ($num > 0) {
                    while ($rows = $rs->fetch_assoc()) {
                        $sn = $sn + 1;
                        echo "
                              <tr>
                                <td>" . $sn . "</td>";
                        if ($rows['Profile'] == "default.jpg") {
                            echo "<td><div class='popup1' id='circle'>";
                            echo substr($rows['Name'], 0, 1);
                            echo '</div></td>';
                            
                        } else {
                            echo "<td><img class='popup' src='staff_profile/" . $rows['Profile'] . "' width=100px height=100px style='border-radius:50%;border: 2px solid #191970;'></td>";
                        }
                        // <td><img class='popup' src='staff_profile/" . $rows['Profile'] . "' style='border-radius:50%' height='100' width='100'></td>
                        echo "<td>" . $rows['Name'] . "</td>
                        <td>" . $rows['Id'] . "</td>
                                <td>" . $rows['Gender'] . "</td>
                                <td>" . $rows['Desgination'] . "</td>
                                <td>" . $rows['Email'] . "</td>
                                <td>" . $rows['Dob'] . "</td>
                                <td>" . $rows['Doj'] . "</td>
                                <td class='' >
                                <a  class='btn btn-warning' href='editstaff.php?Id=" . $rows['Id'] . "' id='edit'  ><i class='fa  fa-edit'></i></a>
                                <a  class='btn btn-danger' id='delete' href='#' data-id='" . $rows['Id'] . "' ><i class='fa fa-trash fs-6'></i></a>
                                <a  class='btn btn-success' id='view' href='#' data-bs-toggle='modal' data-bs-target='#studentview' data-id='" . $rows['Id'] . "'><i class='fa fa-eye'></i> </a></td>
                                
                              </tr>";
                    }
                } else {
                    echo
                    "<div class='alert alert-danger' role='alert'>
                            No Record Found!
                            </div>";
                }

                ?>
            </tbody>
        </table>
    </div>
</div>


<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/ruang-admin.min.js"></script>
<!-- Page level plugins -->
<script src="../vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable(); // ID From dataTable 
        $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
</script>
<div class="modal fade bd-example-modal-lg" id="img" tabindex="0" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-zoom modal-dialog-centered">
    
            <img class="w-100" id="popup-img" style="border-radius: 50%;" src=""   alt="image">

    </div>
</div>
<div class="modal fade bd-example-modal-lg" id="img1" tabindex="0" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-zoom modal-dialog-centered">
        
            <img class="w-100" id="popup-img" style="border-radius: 50%;" src="staff_profile/default.jpg" alt="image">
        
    </div>
</div>
</div>
<div class="modal fade" id="studentview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom modal-xl">
        <div class="modal-content">

            <div class="card">
                <div class="card-body py-0 ">
                    <div class="row">
                        <div class="col bg-c-lite-green m-3 text-center d-flex align-items-center p-5 ">
                            <div class="text-white m-auto">
                                <div> <img id="popup-img1" height="150" style="border-radius: 50%;" width="150" src="" alt="image"> </div>
                                <div class="p-2">
                                    <p class="name fs-2"></p>
                                    <span class="fs-5">ID:</span><span class="Id fs-5"></span>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-7 text-black">
                            <div class="card-body">
                                <h3>Personal Details</h3>
                                <button type="button" class="btn btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
                                <hr>
                                
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h6>Gender:</h6>
                                        <p class="gender text-muted"></p>

                                    </div>
                                    <div class="col-sm-6">
                                        <h6>Phone Number:</h6>
                                        <p class="cno text-muted"></p>

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h6> DOB:</h6>
                                        <p class="dob text-muted"></p>

                                    </div>
                                    <div class="col-sm-6">
                                        <h6>BloodGroup:</h6>
                                        <p class="bloodgroup text-muted"></p>

                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-sm-6">
                                        <h6>Address:</h6>
                                        <p class="address text-muted"></p>

                                    </div>
                                    <div class="col-sm-6">
                                        <h6>Email:</h6>
                                        <p class="email text-muted"></p>

                                    </div>
                                </div>
                                <br>
                                <h3>Academic Details</h3>

                                <hr>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h6>DOJ:</h6>
                                        <p class="doj text-muted"></p>
                                    </div>
                                    <div class="col-sm-6">
                                        <h6>Designation:</h6>
                                        <p class="desig text-muted"></p>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h6>Enrollemnt Date:</h6>
                                        <p class="edate text-muted"></p>
                                    </div>
                                    <div class="col-sm-6">
                                        <h6>Academic Year:</h6>
                                        <p class="ayr text-muted"></p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>



        </div>
    </div>
</div>


<script>
    $('.popup').click(function() {
        var src = $(this).attr('src');
        $('#img').modal('show');

        $('#popup-img').attr('src', src);
    });
    $('.popup1').click(function() {
        var src = $(this).attr('src');
        $('#img1').modal('show');

        
    });
</script>