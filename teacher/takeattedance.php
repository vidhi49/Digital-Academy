<?php
include('../connect.php');
// session_start();
 include('teacher-header.php'); 
$teacher_id = $_SESSION['Id'];
$inst_id = $_SESSION['Inst_id'];

?>
<html>

<body>
    <div class="d-flex">
        <?php include("teacher-sidebar.php"); ?>
        <!-- <div class="container-fluid ml-4 "> -->
            
            <div class="content mt-5 p-3 ">
                <div class="d-flex justify-content-center">
                    <div class="institute-content  text-muted">
                        <div class="row m-5 bg-white" style="border-radius:10px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">

                            <div class="col ">
                                <form method="post" class="p-4 m-2">
                                    <div>
                                        <div class="row">
                                            <div class="col">
                                            <h1 class="fs-2 text-dark ">Todays Attedance</h1>
                                            </div>
                                            <div class="col d-flex justify-content-end">
                                                <?php
                                                $q = "SELECT * FROM class_tbl where Insti_id ='$inst_id' AND Teacher_id='$teacher_id'";
                                                $res = mysqli_query($con, $q);
                                                $r = mysqli_fetch_array($res);
                                                $query = "SELECT * FROM attendance_tbl where Inst_id='$inst_id' AND Class_id='$r[0]' AND Date='".date('Y-m-d')."'";
                                                $rs=mysqli_query($con,$query);
                                                $num = mysqli_num_rows($rs);
                                                if($num>0)
                                                {
                                                    echo "<span style='color:green;font-weight: bold;'>Todays Attedance is taken</span>";
                                                }
                                                else
                                                {
                                                    echo "<span style='color:red;font-weight: bold;'>Today's Attedance is left</span>";
                                                }
                                                ?>
                                                
                                            </div>
                                        </div>
                                        
                                        <hr>
                                        Note: Click on the checkboxes besides each student to take attendance!
                                    </div>
                                    <div class="d-flex">
                                        
                                    </div>
                                    <br>
                                    <div class="table-responsive ">
                                        <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                            <thead class="thead-light">
                                                <tr>
                                                    <!-- <th>Roll No.</th> -->

                                                    <th>Name</th>

                                                    <th>Action</th>

                                                </tr>
                                            </thead>

                                            <tbody>

                                                <?php
                                                
                                                $q = "SELECT * FROM class_tbl where Insti_id ='$inst_id' AND Teacher_id='$teacher_id'";
                                                $res = mysqli_query($con, $q);
                                                $r = mysqli_fetch_array($res);
                                                $query = "SELECT * FROM class_wise_student where Inst_id='$inst_id' AND Class_id='$r[0]'";
                                                $rs = $con->query($query);
                                                $num = $rs->num_rows;
                                                $sn = 0;
                                                if ($num > 0) {
                                                    while ($rows = $rs->fetch_assoc()) {

                                                        echo "
                                                            <tr>                                                           
                                                                <td>" . $rows['Stud_name'] . "</td>
                                                                 <td><input type='checkbox' name='check[]' value=" . $rows['Grno'] . "  style='height: 30px;
                                                                 width: 30px;'></td>
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
                                    <div class="pt-1 mb-4">
                                        <button class="btn bg-navy-blue text-white btn-lg " id="take" name="take" type="submit">Take Attedance</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <?php include("../guest/footer.php"); ?>
</body>

</html>
<?php
if (isset($_REQUEST['take'])) {
    $date = date('Y-m-d');
    if(empty($_POST['check']))
    {
        echo "<script> 
            Swal.fire('Please Select Checkbox to take Attedance')</script>";
    }
    else{
    $q2 = "select * from attendance_tbl where Inst_id='$inst_id' AND Class_id='$r[0]' AND Date ='$date'";
    $res2 = mysqli_query($con, $q2);
    $nor = mysqli_num_rows($res2);
    if ($nor == 0) {
        foreach ($_POST['check'] as $value) {

            $q = "insert into attendance_tbl values(null,'$inst_id','$value','$r[0]','$teacher_id','1','$date')";
            $result1 = mysqli_query($con, $q);
            
        }
        $q1 = "select * from class_wise_student where Inst_id='$inst_id' and Class_id='$r[0]'";
        $res1 = mysqli_query($con, $q1);
        while ($r1 = mysqli_fetch_array($res1)) {
            $q2 = "select * from attendance_tbl where Inst_id='$inst_id' AND Class_id='$r[0]' AND Grno ='$r1[7]' AND Date='$date'";
            $res2 = mysqli_query($con, $q2);
            $nor = mysqli_num_rows($res2);
            if ($nor == 0) {
                $q = "insert into attendance_tbl values(null,'$inst_id','$r1[7]','$r[0]','$teacher_id','0','$date')";
                $result1 = mysqli_query($con, $q);
                
            }
        }
        echo "<script> 
        
        window.location = (\"takeattedance.php\");
        
        </script>";
    } else {
        
        echo "<script> 
        Swal.fire('Todays Attedance is taken!!!')</script>";
       
    }
    }
}
?>