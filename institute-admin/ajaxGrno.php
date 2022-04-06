<?php

include '../connect.php';
session_start();
$inst_id=$_SESSION['inst_id'];
$classId = $_GET['classid'];
echo $classId;

$querys="select * from student_tbl where Class_id='$classId' AND Inst_id='$inst_id'";  
$res=mysqli_query($con,$querys);
// $result=mysqli_fetch_array($res);   
// echo $querys;
// echo'<option value="">--'.$querys.'--</option>';
echo'<option value="">--Select Section--</option>';
   
        while ($r = mysqli_fetch_array($res)) 
        {
            echo'<option value="'.$r['Id'].'" >'.$r['Grno'].'</option>';
        }
   
?>

