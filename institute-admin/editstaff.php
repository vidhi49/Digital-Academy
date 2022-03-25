<?php include("../connect.php");
// session_start();
include("change-header.php");
$inst_id = $_SESSION['inst_id'];
$inst_name = $_SESSION['name'];
$a = 'managestaff';
$indian_states = array(
    'AP' => 'Andhra Pradesh', 'AR' => 'Arunachal Pradesh', 'AS' => 'Assam', 'BR' => 'Bihar', 'CT' => 'Chhattisgarh',
    'GA' => 'Goa', 'GJ' => 'Gujarat', 'HR' => 'Haryana', 'HP' => 'Himachal Pradesh', 'JK' => 'Jammu & Kashmir',
    'JH' => 'Jharkhand', 'KA' => 'Karnataka', 'KL' => 'Kerala', 'MP' => 'Madhya Pradesh', 'MH' => 'Maharashtra',
    'MN' => 'Manipur', 'ML' => 'Meghalaya', 'MZ' => 'Mizoram', 'NL' => 'Nagaland', 'OR' => 'Odisha', 'PB' => 'Punjab',
    'RJ' => 'Rajasthan', 'SK' => 'Sikkim', 'TN' => 'Tamil Nadu', 'TR' => 'Tripura', 'UK' => 'Uttarakhand',
    'UP' => 'Uttar Pradesh', 'WB' => 'West Bengal',
);
$id = $_REQUEST['Id'];
$q = "select * from staff_tbl where Id='$id'";
$res = mysqli_query($con, $q);
$r = mysqli_fetch_array($res);
?>
<html>

<head>
    <meta charset="utf-8">
    <title>Staff Emrolment</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/student.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Aclonica&family=Nova+Slim" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <link href="../css/css/ruang-admin.min.css" rel="stylesheet"> -->
    <script>
        $(document).ready(function() {
            $("#file").change(function(e) {
                var tmppath = URL.createObjectURL(e.target.files[0]);
                $("#profileimg").fadeIn("slow").attr('src', tmppath);

            });
        });

        Filevalidation = () => {
            const fi = document.getElementById('file');
            var filePath = fi.value;
            var allowedExtensions =
                /(\.jpg|\.jpeg|\.png|\.gif)$/i;
            if (!allowedExtensions.exec(filePath)) {
                // alert('Invalid file type');
                $("#filemessage").html('Photo Must be jpg/jpeg/png/gif').css('color', 'red');
                // fi.value = '';
                return false;
            } else {
                // $("#filemessage").html('');
                if (fi.files.length > 0) {
                    for (const i = 0; i <= fi.files.length - 1; i++) {

                        const fsize = fi.files.item(i).size;
                        const file = Math.round((fsize / 1024));
                        if (file > 200) {
                            $("#filemessage").html('File Must be less then 200kb').css('color', 'red');
                            return false;
                        } else {

                            $("#filemessage").html('');

                            return false;
                        }
                    }
                }
            }
        }

        function classDropdown(str) {
            if (str == "") {
                document.getElementById("section").innerHTML = "";
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
                        document.getElementById("section").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "ajaxSection.php?name=" + str, true);
                xmlhttp.send();
            }
        }

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
    </script>
</head>

<body>

    <body>
        <div class="d-flex">
            <?php include("institute-sidebar.php"); ?>
            <div class="content p-5 text-muted h6">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h1 mb-0 text-muted">Edit Student </h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="institute-home.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Student Details</li>
                    </ol>
                </div>

                <form method="post" enctype="multipart/form-data" id="editform">
                    <div class="card mb-4 " style='box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;'>
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h4 class="m-0 font-weight-bold text-primary">Personal Details</h4>
                            <div class="breadcrumb">

                                ID No:<?php echo  $r['Id'] ?>

                            </div>

                        </div>
                        <div class="card-body py-3">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="row">
                                            <div class="upload text-center pb-3 pt-2">
                                                <div> <img id="profileimg" src='staff_profile/<?php echo $r['Profile']; ?>' style="border:5px solid black;border-radius:10px" height="195" width="195" alt="image"> </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <input class="form-control form-control-lg m-1" type="file" id="file" onchange="Filevalidation()" name="photo">
                                                <span id="filemessage"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <label class="form-control-label ml-2 p-1">Name:<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control form-control-lg m-1" id="name" name="name" value="<?php echo  $r['Name'] ?>" placeholder="First Name/Surname" required>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label class="form-label ml-2 p-1" for="city"> Gender : <span class="text-danger">*</span></label>
                                                <select class="form-control form-control-lg m-1" name="gender" required>
                                                    <option value="" disabled selected> Choose... </option>
                                                    <option value="Male" <?php if ($r['Gender'] == 'Male') echo ' selected'; ?>> Male </option>
                                                    <option value="Female" <?php if ($r['Gender'] == 'Female') echo ' selected'; ?>> Female </option>
                                                    <option value="Other" <?php if ($r['Gender'] == 'Other') echo ' selected'; ?>> Other </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class=" col ">
                                                <label class="form-label ml-2 p-1">DOB[Date of birth]:<span class="text-danger">*</span></label>
                                                <input class="form-control form-control-lg m-1" type="date" id="dob" value="<?php echo  $r['Dob'] ?>" name="dob" required>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-sm-4 col-lg-4">
                                        <label class="form-label ml-2 p-1">Phone No.:<span class="text-danger">*</span></label>
                                        <input class="form-control form-control-lg m-1" type="tel" value="<?php echo  $r['Cno'] ?>" maxlength="10" id="cno" name="cno" placeholder="Enter your phone number" required>
                                        <span id="cmessage"></span>
                                    </div>
                                    <div class="col-sm-4 col-lg-4">
                                        <label class="form-control-label ml-2 p-1">Email:<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-lg m-1" id="e" value="<?php echo  $r['Email'] ?>" name="email" placeholder="abc@xyz.com" required>
                                        <span id="emsg"></span>
                                    </div>
                                    <div class="col">
                                        <label class="form-label ml-2 p-1">Blood Group:<span class="text-danger">*</span></label>
                                        <select class="form-control form-control-lg m-1" name="bloodgroup" required>
                                            <option value="" disabled selected> Choose... </option>
                                            <option <?php if ($r['Bloodgroup'] == 'A+') echo ' selected'; ?>> A+ </option>
                                            <option <?php if ($r['Bloodgroup'] == 'A-') echo ' selected'; ?>> A- </option>
                                            <option <?php if ($r['Bloodgroup'] == 'AB+') echo ' selected'; ?>> AB+ </option>
                                            <option <?php if ($r['Bloodgroup'] == 'AB-') echo ' selected'; ?>> AB- </option>
                                            <option <?php if ($r['Bloodgroup'] == 'B-') echo ' selected'; ?>> B- </option>
                                            <option <?php if ($r['Bloodgroup'] == 'B+') echo ' selected'; ?>> B+ </option>
                                            <option <?php if ($r['Bloodgroup'] == 'O+') echo ' selected'; ?>> O+ </option>
                                            <option <?php if ($r['Bloodgroup'] == 'O-') echo ' selected'; ?>> O- </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col form-outline">
                                        <label class="form-label ml-2 p-1">Address:<span class="text-danger">*</span></label>
                                        <textarea cols='20' id="address" required rows="2" class="form-control form-control-lg m-1" name="address"><?php echo  $r['Address']; ?></textarea>

                                    </div>

                                </div>
                                <div class="row ">
                                    <div class="col">
                                        <label class="form-label ml-2 p-1" for="city"> Country : <span class="text-danger">*</span></label>
                                        <select required name="country" onchange="selectstate(this.value)" class="form-control form-control-lg m-1">
                                            <option value="">--Select Class--</option>

                                            <option value="India" <?php if ($r['Country'] == 'India') echo ' selected'; ?>> India </option>

                                        </select>
                                    </div>
                                    <div class=" col ">
                                        <label class="form-label ml-2 p-1">State:<span class="text-danger">*</span></label>

                                        <select required name="s" id="s" class="form-control form-control-lg m-1">
                                            <option value=''>--Select Section--</option>
                                            <?php
                                            foreach ($indian_states as $x => $val) {
                                                echo '<option ' . (($r['State'] == $val) ? 'selected="selected"' : "") . '   > ' . $val . ' </option>';
                                            } ?>
                                        </select>
                                    </div>
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
                                    <label class="form-label p-1 ml-2">Staff Type:</label><span class="text-danger">*</span>
                                    <select class="form-control form-control-lg m-1" id="stype" name="stype" required>
                                        <option value="" disabled selected> Choose... </option>
                                        <option <?php if ($r['Stype'] == 'Teaching') echo ' selected'; ?>>Teaching</option>
                                        <option <?php if ($r['Stype'] == 'Nom-Teaching') echo ' selected'; ?>>Non-Teaching</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <div class="form-outline">
                                        <label class="form-label ml-2 p-1">Designation</label><span class="text-danger">*</span>
                                        <select class="form-control form-control-lg m-1" name="designation" required>
                                            <option value="" disabled selected> Choose... </option>
                                            <option <?php if ($r['Desgination'] == 'Faculty') echo ' selected'; ?>> Faculty </option>
                                            <option <?php if ($r['Desgination'] == 'Clerk') echo ' selected'; ?>> Clerk </option>
                                            <option <?php if ($r['Desgination'] == 'Accountant') echo ' selected'; ?>> Accountant </option>
                                            <option <?php if ($r['Desgination'] == 'Principle') echo ' selected'; ?>> Principle </option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <!--row-->
                            <div class="row">
                                <div class="col">
                                    <label class="form-label p-1 ml-2">DOJ[Date of Joining]:</label><span class="text-danger">*</span>
                                    <input class="doj form-control form-control-lg m-1" type="date" id="doj" value="<?php echo  $r['Doj'] ?>" name="doj" required>

                                </div>
                                <div class="col">
                                    <label class="form-label p-1 ml-2">Academic Year:<span class="text-danger">*</span></label>
                                    <input class="form-control form-control-lg m-1" type="text" id="aca_year" value="<?php echo $r['Academicyr']; ?>" name="aca_year" readonly required>

                                </div>

                            </div>

                            <div class="row py-3">

                                <div class="col">
                                    <input type="submit" name="submit" id="submit" class="btn  btn-danger">
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

        </form>
    </body>
</body>
<?php

if (isset($_POST['submit'])) {

    $sname = $_POST['name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $cno = $_POST['cno'];
    $email = $_POST['email'];
    $bloodgroup = $_POST['bloodgroup'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $state = $_POST['s'];

    $stype = $_POST['stype'];
    $designation = $_POST['designation'];
    $doj = $_POST['doj'];
    $aca_year = $_POST['aca_year'];
    $profilename = $r['Profile'];
    if (!empty($_FILES['photo']['name'])) {
        $imgname = $_FILES['photo']['name'];
        $tmpname = $_FILES['photo']['tmp_name'];
        $imageExtension = explode('.', $imgname);
        $imageExtension = strtolower(end($imageExtension));
        $newimgname = $inst_id . $r['Id'];
        $newimgname .= "." . $imageExtension;
        if ($profilename != 'default.jpg') {
            unlink("staff_profile/" . $newimgname);
        }
        $q = "update staff_tbl set Name='$sname', Gender='$gender' ,Dob='$dob',
        Cno='$cno', Email='$email',Address='$address' , Country='$country', State='$state', Doj='$doj', Stype='$stype',Desgination='$designation', Bloodgroup='$bloodgroup',
        Profile='$newimgname' where Id='$id'";
        // echo $q;
        $res = mysqli_query($con, $q);
        if ($res) {

            move_uploaded_file($tmpname, "staff_profile/" . $newimgname);
            echo "<script type = \"text/javascript\">
                window.location = (\"manage-staff.php\")
                </script>";
        } else {
            die("<center><h1>Query Failed" . mysqli_error($con) . "</h1></center>");
        }
    } else {
        $q = "update staff_tbl set Name='$sname', Gender='$gender' ,Dob='$dob',
        Cno='$cno', Email='$email',Address='$address' , Country='$country', State='$state', Doj='$doj', Stype='$stype',Desgination='$designation', Bloodgroup='$bloodgroup'
         where Id='$id'";
        $res = mysqli_query($con, $q);
        if ($res) {
            echo "<script type = \"text/javascript\">
                window.location = (\"manage-staff.php\")
                </script>";
        } else {
            die("<center><h1>Query Failed" . mysqli_error($con) . "</h1></center>");
        }
    }
}
?>