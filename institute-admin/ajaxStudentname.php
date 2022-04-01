<?php

include '../connect.php';
session_start();
$inst_id=$_SESSION['inst_id'];
$classid = intval($_GET['classid']);

if(isset($_GET['classid']))
{       //$q="select * from class_wise_student where Class_id='".$classid."' AND Inst_id='$inst_id' ORDER BY Stud_name";
       $queryss=mysqli_query($con,"select * from class_wise_student where Class_id='".$classid."' AND Inst_id='$inst_id' ORDER BY Stud_name");                        
        $countt = mysqli_num_rows($queryss);

        // echo '
        // <select required name="section" class="form-control mb-3">';
        echo'<option value="" selected hidden>--Select Student--</option>';
        while ($row = mysqli_fetch_array($queryss)) {
        echo'<option value="'.$row['Grno'].'" >'.$row['Stud_name'].'</option>';
        
        }
}

?>

