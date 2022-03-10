<?php include("../connect.php");
// include("change-header.php");
// session_start();
?>
<html>

<head>
    <meta charset="utf-8">
    <title>Staff Emrolment</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/staff.js"></script>
    <script src="../css/style.css"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Aclonica&family=Nova+Slim" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    
    <script>
        function selectstate(str) {
            if (str == "") {
                document.getElementById("s").innerHTML = "";
                return;
            } else {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("s").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "ajaxState.php?name=" + str, true);
                xmlhttp.send();
            }
        }
        validationProfile = () => {
            const fi = document.getElementById('profile');
            var filePath = fi.value;
            var allowedExtensions =
                /(\.jpg|\.jpeg|\.png|\.gif)$/i;
            if (!allowedExtensions.exec(filePath)) {
                // alert('Invalid file type');
                $("#profilemessage").html('Photo Must be jpg/jpeg/png/gif').css('color', 'red');
                // fi.value = '';
                return false;
            } else {
                // $("#filemessage").html('');
                if (fi.files.length > 0) {
                    for (const i = 0; i <= fi.files.length - 1; i++) {

                        const fsize = fi.files.item(i).size;
                        const file = Math.round((fsize / 1024));
                        if (file > 200) {
                            $("#profilemessage").html('File Must be less then 200kb').css('color', 'red');
                            return false;
                        } else {

                            $("#profilemessage").html('');

                            return false;
                        }
                    }
                }
            }
        }
        validationExCerti = () => {
            const fi = document.getElementById('ecerti');
            var filePath = fi.value;
            var allowedExtensions =
                /(\.jpg|\.jpeg|\.png|\.gif)$/i;
            if (!allowedExtensions.exec(filePath)) {
                // alert('Invalid file type');
                $("#excertimessage").html('Photo Must be jpg/jpeg/png/gif').css('color', 'red');
                // fi.value = '';
                return false;
            } else {
                // $("#filemessage").html('');
                if (fi.files.length > 0) {
                    for (const i = 0; i <= fi.files.length - 1; i++) {

                        const fsize = fi.files.item(i).size;
                        const file = Math.round((fsize / 1024));
                        if (file > 200) {
                            $("#excertimessage").html('File Must be less then 200kb').css('color', 'red');
                            return false;
                        } else {

                            $("#excertimessage").html('');

                            return false;
                        }
                    }
                }
            }
        }
        validationQualification = () => {
            const fi = document.getElementById('qcerti');
            var filePath = fi.value;
            var allowedExtensions =
                /(\.jpg|\.jpeg|\.png|\.gif)$/i;
            if (!allowedExtensions.exec(filePath)) {
                // alert('Invalid file type');
                $("#qmessage").html('Photo Must be jpg/jpeg/png/gif').css('color', 'red');
                // fi.value = '';
                return false;
            } else {
                // $("#filemessage").html('');
                if (fi.files.length > 0) {
                    for (const i = 0; i <= fi.files.length - 1; i++) {

                        const fsize = fi.files.item(i).size;
                        const file = Math.round((fsize / 1024));
                        if (file > 200) {
                            $("#qmessage").html('File Must be less then 200kb').css('color', 'red');
                            return false;
                        } else {

                            $("#qmessage").html('');

                            return false;
                        }
                    }
                }
            }
        }
        validationId = () => {
            const fi = document.getElementById('id_proof');
            var filePath = fi.value;
            var allowedExtensions =
                /(\.jpg|\.jpeg|\.png|\.gif)$/i;
            if (!allowedExtensions.exec(filePath)) {
                // alert('Invalid file type');
                $("#idmessage").html('Photo Must be jpg/jpeg/png/gif').css('color', 'red');
                // fi.value = '';
                return false;
            } else {
                // $("#filemessage").html('');
                if (fi.files.length > 0) {
                    for (const i = 0; i <= fi.files.length - 1; i++) {

                        const fsize = fi.files.item(i).size;
                        const file = Math.round((fsize / 1024));
                        if (file > 200) {
                            $("#idmessage").html('File Must be less then 200kb').css('color', 'red');
                            return false;
                        } else {

                            $("#idmessage").html('');

                            return false;
                        }
                    }
                }
            }
        }
    </script>
</head>

<body>
    <div class="d-flex">
        <!-- <?php include("institute-sidebar.php");?> -->
        <div class="container p-5 text-muted h6">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h1 mb-0 text-muted">Staff Enrolment</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="institute-home.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Staff Enrolment</li>
            </ol>
        </div>
        <form method="post" enctype="multipart/form-data">
            <div class="card mb-4 " style='box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;'>
                <div class="card-header py-4 d-flex flex-row align-items-center justify-content-between">
                    <h4 class="m-0 font-weight-bold text-primary">Personal Details</h4>

                </div>
                <div class="card-body py-3">

                    <div class="form-group">
                        <div class="row ">
                            <div class="col-sm-4 col-lg-6">
                                <label class="form-control-label ml-2 p-1">Name:(Full Name)</label><span class="text-danger">*</span><br>

                                <input type="text" class="form-control form-control-lg m-1" id="name" name="name" placeholder="FirstName/MiddleName/Surname" required>
                            </div>
                            <div class="col">
                                <label class="form-label  ml-2 p-1">Email:</label><span class="text-danger">*</span>
                                <input type="email" class="form-control form-control-lg m-1" id='e' name="email" placeholder="Enter Your Email" required>
                                <span id="emsg"></span>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col">
                                <label class="form-label ml-2 p-1" for="city"> Gender : </label><span class="text-danger">*</span>
                                <select class="form-control form-control-lg m-1" name="gender" required>
                                    <option value="" disabled selected> Choose... </option>
                                    <option value="Male"> Male </option>
                                    <option value="Female"> Female </option>
                                    <option value="Other"> Other </option>
                                </select>
                            </div>
                            <div class=" col ">
                                <label class="form-label ml-2 p-1">DOB[Date of birth]:</label><span class="text-danger">*</span>
                                <input class="form-control form-control-lg m-1" type="date" id="dob" name="dob" required>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-lg-6">
                                <label class="form-label ml-2 p-1">Phone No.:</label><span class="text-danger">*</span>
                                <input class="form-control form-control-lg m-1" type="tel" maxlength="10" id="cno" name="cno" placeholder="Enter your phone number" required>
                                <span id="cmessage"></span>
                            </div>
                            <div class="col">
                                <label class="form-label ml-2 p-1">Blood Group:</label><span class="text-danger">*</span>
                                <select class="form-control form-control-lg m-1" name="bloodgroup" required>
                                    <option value="" disabled selected> Choose... </option>
                                    <option> A+ </option>
                                    <option> A- </option>
                                    <option> AB+ </option>
                                    <option> AB+ </option>
                                    <option> B- </option>
                                    <option> B+ </option>
                                    <option> O+ </option>
                                    <option> O- </option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col form-outline">
                                <label class="form-label ml-2 p-1">Address:</label><span class="text-danger">*</span>
                                <textarea cols='20' id="address" required rows="2" class="form-control form-control-lg m-1" name="address"></textarea>

                            </div>

                        </div>
                        <div class="row ">
                            <div class="col">
                                <label class="form-label ml-2 p-1" for="city"> Country : <span class="text-danger">*</span></label>
                                <select required name="country" onchange="selectstate(this.value)" class="form-control form-control-lg m-1">
                                    <option value="">--Select Class--</option>

                                    <option value="India"> India </option>

                                </select>
                            </div>
                            <div class=" col ">
                                <label class="form-label ml-2 p-1">State:<span class="text-danger">*</span></label>

                                <select required name="s" id="s" class="form-control form-control-lg m-1">
                                    <option value=''>--Select Section--</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card mb-4" style='box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;'>
                <div class="card-header py-4 d-flex flex-row align-items-center justify-content-between">
                    <h4 class="m-0 font-weight-bold text-primary">Upload Docuement</h4>

                </div>
                <div class="card-body py-5">
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="form-label ml-2">ID Proof :</label><span class="text-danger">*</span>
                            <input type='file' id="id_proof" name="id_proof" onchange="validationId()" required class="form-control form-control-lg m-2" />
                            <span id="idmessage"></span>
                        </div>

                        <div class="col-sm-6">
                            <label class="form-label ml-2">Qualification certificate :</label><span class="text-danger">*</span>
                            <input type='file' id="qcerti" name="qcerti" onchange="validationQualification()" required class="form-control form-control-lg m-2" />
                            <span id="qmessage"></span>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="form-label ml-2">Experience certificate :</label>
                            <input type='file' id="ecerti" name="ecerti" onchange="validationExCerti()" class="form-control form-control-lg m-2" />
                            <span id="excertimessage"></span>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label  ml-2">Profile :</label>
                            <input type='file' id="profile" name="profile" onchange="validationProfile()" class="form-control form-control-lg m-2" />
                            <span id="profilemessage"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4" style='box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;'>
                <div class="card-header py-4 d-flex flex-row align-items-center justify-content-between">
                    <h4 class="m-0 font-weight-bold text-primary">Acedemic Details:</h4>

                </div>
                <div class="card-body ">
                    <div class="row">
                        <div class="col">

                            <label class="form-label p-1 ml-2">Academic Year:</label><span class="text-danger">*</span>
                            <input class="form-control form-control-lg m-1" type="text" id="aca_year" value="<?php echo date("Y") - 1 . "-" . date("Y"); ?>" name="aca_year" readonly required>

                        </div>
                        <div class="col">

                            <label class="form-label p-1 ml-2">DOJ[Date of Joining]:</label><span class="text-danger">*</span>
                            <input class="form-control form-control-lg m-1" type="date" id="doj" name="doj" required>

                        </div>
                        <div class="col">
                            <label class="form-label p-1 ml-2">Staff Type:</label><span class="text-danger">*</span>
                            <select class="form-control form-control-lg m-1" id="stype" name="stype" required>
                                <option value="" disabled selected> Choose... </option>
                                <option>Teaching</option>
                                <option>Non-Teaching</option>
                            </select>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label ml-2 p-1">Designation</label><span class="text-danger">*</span>
                                <select class="form-control form-control-lg m-1" name="designation" required>
                                    <option value="" disabled selected> Choose... </option>
                                    <option> Faculty </option>
                                    <option> Clerk </option>
                                    <option> Accountant </option>
                                    <option> Principle </option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="row py-3">

                        <div class="col">
                            <input type="submit" name="submit" id="submit" class="btn btn-primary">
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </form>
    
    </div>
   
    
    
</body>

</html>
<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $cno = $_POST['cno'];
    $bloodgroup = $_POST['bloodgroup'];
    $address = $_POST['address'];
    $idproove = $_FILES['id_proof']['name'];
    $idproove_loc = $_FILES['id_proof']['tmp_name'];
    $qcerti = $_FILES['qcerti']['name'];
    $qcerti_loc = $_FILES['qcerti']['tmp_name'];
    $ecerti = $_FILES['ecerti']['name'];
    $profile = $_FILES['profile']['name'];
    $aca_year = $_POST['aca_year'];
    $stype = $_POST['stype'];
    $country = $_POST['country'];
    $state = $_POST['s'];
    $designation = $_POST['designation'];
    $doj = $_POST['doj'];
    $date = date("Y-m-d");
    $inst_id = $_SESSION['inst_id'];
    $inst_name = $_SESSION['name'];
    $ext_id = pathinfo($idproove, PATHINFO_EXTENSION);
    $ext_qcerti = pathinfo($qcerti, PATHINFO_EXTENSION);
    $generator = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
    $password = substr(str_shuffle($generator), 0, 8);
    $pass_hash = password_hash($password, PASSWORD_DEFAULT);


    //$certi_img=$sname.".".$extension;
    $q = "insert into staff_tbl values(null ,'$inst_id','$inst_name','$name','$gender','$email','$cno','$address','$state','$country',
    '$dob','$doj','$stype','$designation','','','','','$bloodgroup','$aca_year','$pass_hash','$date')";
    require 'sendstaffemail.php';
    if (mysqli_query($con, $q)); {
        $q1 = "select Id from staff_tbl where Email = '$email'";
        $res1 = mysqli_query($con, $q1) or die("Query failed" . mysqli_error($con));

        $row1 = mysqli_fetch_assoc($res1);
        $staff_id = $row1['Id'];
        $id_p = $inst_id . $staff_id . "." . $ext_id;
        $qualification = $staff_id . "." . $ext_qcerti;
        move_uploaded_file($idproove_loc, "staff_ID/" . $id_p);
        move_uploaded_file($qcerti_loc, "staff_qualification/$qualification");
        if (!empty($ecerti)) {
            $ecerti_loc = $_FILES['ecerti']['tmp_name'];
            $ext_ecerti = pathinfo($ecerti, PATHINFO_EXTENSION);
            $experience_certi = $staff_id . "." . $ext_ecerti;
            move_uploaded_file($ecerti_loc, "staff_experiance/" . $experience_certi);
        } else {
            $experience_certi = "-";
        }
        if (!empty($profile)) {
            $profile_loc = $_FILES['profile']['tmp_name'];
            $ext_profile = pathinfo($profile, PATHINFO_EXTENSION);
            $photo = $staff_id . "." . $ext_profile;
            move_uploaded_file($profile_loc, "staff_profile/" . $photo);
        } else {
            $photo = "default.jpg";
        }
        $q2 = "update staff_tbl set Id_prove='$id_p',Exp_doc='$experience_certi',Quali_doc='$qualification',Profile='$photo' where Id='$staff_id'";
        if (mysqli_query($con, $q2)) {
            echo "<script> Swal.fire(
                'Registered',
                'Enrolled Successfully',
                'success'
              )</script>";
        } else {
            die("<center><h1>Query Failed" . mysqli_error($con) . "</h1></center>");
        }
    }
}
?>