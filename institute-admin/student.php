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
            background: linear-gradient(to top,#87CEFA,#191970)
        }

        @media only screen and (min-width: 1400px) {
            p {
                font-size: 14px
            }
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
                                <td><a  class='btn btn-warning' id='' data-id='' href='javascript:void(0)'><i class='fas fa-fw fa-edit'></i>Edit</a>
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
    <div class="modal fade bd-example-modal-lg" tabindex="0" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                        <div class="col bg-c-lite-green p-5 m-3">
                            <div class=" text-center text-white">
                                
                                <div class="m-b-25"> <img id="popup-img1" height="100" width="100" src="" alt="image"> </div>
                                <h6 class="f-w-600"></h6>
                                <p class="f-w-600">Email</p>
                                <p id="id" name="id">6-A</p> 
                                
                            </div>
                        </div>
                        <div class="col-sm-8">
                        <div class="card-body">
                                <h4 class=" f-w-600"><span class="hello"></span></h4><hr>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="f-w-600">Father Name:</p>
                                        <h6 class="f-w-400">rntng@gmail.com</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class=" f-w-600">Mother Name:</p>
                                        <h6 class=" f-w-400">98979989898</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="f-w-600">Gender:</p>
                                        <h6 class="f-w-400">rntng@gmail.com</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class=" f-w-600">Phone Number:</p>
                                        <h6 class=" f-w-400">98979989898</h6>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="f-w-600">DOB:</p>
                                        <h6 class="f-w-400">rntng@gmail.com</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="f-w-600">BloodGroup:</p>
                                        <h6 class="f-w-400">rntng@gmail.com</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-sm-6">
                                        <p class=" f-w-600">Address:</p>
                                        <h6 class=" f-w-400">98979989898</h6>
                                    </div>
                                </div>
                                <br>
                                <h4 class="f-w-600">Academic Details</h4><hr>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class=" f-w-600">GrNo:</p>
                                        <h6 class="f-w-400">Sam Disuja</h6>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class=" f-w-600">EnrollMent Date:</p>
                                        <h6 class="f-w-400">Sam Disuja</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="f-w-600">Academic YEar</p>
                                        <h6 class=" f-w-400">Dinoter husainm</h6>
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
            $('.modal').modal('show');
            $('#popup-img').attr('src', src);
        });
    </script>