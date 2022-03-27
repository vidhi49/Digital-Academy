<?php include("../connect.php");
// session_start();
// include("../admin/admin-header.php");
include("../institute-admin/change-header.php");
// include("../institute-admin/institute-header.php");
$a = "viewclassattadence";
$inst_id = $_SESSION['inst_id'];
?>

<head>
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script>
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
        $(document).ready(function() {
            
            $("#type").on('change', function() {
                if ($("#type").val() == 'singledate') {
                    $("#coldate").show();
                    $("#colfrom").hide();
                    $("#colto").hide();
                }
                if ($("#type").val() == 'range') {
                    $("#colfrom").show();
                    $("#colto").show();
                    $("#coldate").hide();
                }
            });

            $("#view").click(function() {
                if ($("#class").val() == '') {
                    alert("Please Select Class");
                    $("#class").focus();
                    return false;

                } 
                 if($("#section").val() == ''){
                    alert("Please Select Section");
                    $("#section").focus();
                    return false;
                }
                
                
                
            });
        });
    </script>
</head>
<html>

<body>
    <div class="d-flex">
        <?php
        include("institute-sidebar.php");
        ?>
        <div class="institute-content  text-muted">
            <div class="row m-5 bg-white" style="border-radius:10px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">

                <div class="col ">
                    <form method="post" id="form" class="p-4 m-2">
                        <!-- <div id="selectclass" style="display: none;"> -->
                        <div id="selectclass">
                            <div>
                                <h1 class="fs-2 text-dark ">Select Class Attedence</h1>
                                <hr>

                            </div>
                            <br>
                            <div class="form-group row">

                                <div class="col">
                                    <label class="form-control-label ml-2 p-1">Select Class<span class="text-danger ml-2">*</span></label>
                                    <?php
                                    $qry = "SELECT DISTINCT Name FROM class_tbl Where Insti_id='$inst_id' ORDER BY Name ASC ";
                                    $result = $con->query($qry);
                                    $num = $result->num_rows;
                                    if ($num > 0) {
                                        echo ' <select   name="class" id="class" onchange="classDropdown(this.value)" class="form-control form-control-lg m-1" required >';
                                        echo '<option value="">--Select Class--</option>';
                                        while ($rows = $result->fetch_assoc()) {
                                            echo '<option  value="' . $rows['Name'] . '" >' . $rows['Name'] . '</option>';
                                        }
                                        echo '</select>';
                                    }
                                    ?>
                                </div>
                                <div class="col">
                                    <label class="form-control-label ml-2 p-1">Class Section<span class="text-danger ml-2">*</span></label>
                                    <?php


                                    echo ' <select    name="section" id="section"  class="form-control form-control-lg m-1" >';
                                    echo "<option value=''>--Select Section--</option>";
                                    echo "</select>";


                                    ?>

                                </div>
                            </div>
                            <div class="pt-1 mb-4">
                                <button class="btn bg-navy-blue text-white btn-lg " id="view" name="view" type="submit">View Attedance</button>
                            </div>
                        </div>
                                
                    </form>
                </div>
            </div>
            
            
        </div>
    </div>
</body>

</html>
<?php

if(isset($_POST['view']))
{
    $class=$_REQUEST['class'];
    $section=$_REQUEST['section'];
    echo "<script>window.location.href='classattedance.php?class=$class&section=$section';</script>";
}

?>