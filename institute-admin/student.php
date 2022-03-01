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

        #profileimg {
            position: relative;
            top: -90px;
            margin-bottom: -90px;
            border: white solid 10px;
        }
    </style>
    <div id="stud-table">
        <div class="table-responsive p-3">
            <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Student Photo</th>
                        <th>Student Name</th>
                        <th>Class</th>
                        <th>Section</th>
                        <th>Action</th>

                    </tr>
                </thead>

                <tbody>

                    <?php
                    include("../connect.php");
                    $query = "SELECT * FROM student_tbl";
                    $rs = $con->query($query);
                    $num = $rs->num_rows;
                    $sn = 0;
                    if ($num > 0) {
                        while ($rows = $rs->fetch_assoc()) {
                            $sn = $sn + 1;
                            echo "
                              <tr>
                                <td>" . $sn . "</td>
                               
                                <td><img class='popup' src='student_profile/" . $rows['Profile'] . "' style='border-radius:50%' height='100' width='100'></td>
                                <td>" . $rows['Name'] . "</td>
                                <td>" . $rows['Class'] . "</td>
                                <td>" . $rows['Section'] . "</td>
                                <td><a  class='btn btn-warning' id='edit'  data-id='" . $rows['Id'] . "' data-bs-toggle='modal' data-bs-target='#editstudent'><i class='fas fa-fw fa-edit'></i>Edit</a>
                                <a  class='btn btn-danger' id='delete' data-id='" . $rows['Id'] . "' ><i class='fas fa-fw fa-trash'></i>Drop</a>
                                <a  class='btn btn-info' id='view' data-bs-toggle='modal' data-bs-target='#studentview' data-id='" . $rows['Id'] . "'><i class='fas fa-fw fa-eye'></i> View Details</a></td>
                                
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
    <div class="modal fade bd-example-modal-lg" id="img" tabindex="0" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <img class="w-100" id="popup-img" src="" alt="image">
            </div>
        </div>
    </div>
    </div>
    <div class="modal fade" id="studentview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-zoom modal-lg">
            <div class="modal-content">

                <div class="card">
                    <div class="card-body py-0 ">
                        <div class="row">
                            <div class="col bg-c-lite-green m-3 text-center d-flex align-items-center p-5 ">
                                <div class="text-white m-auto">
                                    <div> <img id="popup-img1" height="150" style="border-radius: 50%;" width="150" src="" alt="image"> </div>
                                    <div class="p-2">
                                        <p class="name fs-2"></p>
                                        <p class="class fs-5"></p>
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
                                            <h6>Father Name:</h6>
                                            <p class="fname text-muted"></p>
                                        </div>
                                        <div class="col-sm-6">
                                            <h6>Mother Name:</h6>
                                            <p class="mname text-muted"></p>

                                        </div>
                                    </div>
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
                                            <h6>GRNO:</h6>
                                            <p class="grno text-muted"></p>
                                        </div>
                                        <div class="col-sm-6">
                                            <h6>Class:</h6>
                                            <p class="class text-muted"></p>

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
    <div class="modal fade" id="editstudent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-zoom modal-lg">
            <div class="modal-content">

                <div class="card">
                    <div class="card-body py-0 ">
                        <div class="text-center">
                            <div> <img id="profileimg" height="180" style="border-radius: 50%;" width="180" src="" alt="image"> </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-4 ">
                                <label class="form-control-label ml-2 p-1">Name:<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="First Name/Surname" required>
                            </div>
                            <div class="col-sm-4 ">
                                <label class="form-control-label ml-2 p-1">Father Name:<span class="text-danger">*</span></label>
                                <input type="text" class="form-control " id="fname" name="fname" placeholder="First Name/Surname" required>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-control-label ml-2 p-1">Mother Name:<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="mname" name="mname" placeholder="First Name/Surname" required>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="modal-footer">
                    <input type="submit" class="btn btn-warning text-white" value="Edit" name="editstudent"></input>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
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
    </script>