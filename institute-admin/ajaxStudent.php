<?php

include '../connect.php';
session_start();
$inst_id=$_SESSION['inst_id'];
$Id = $_GET['studid'];
// echo $classId;

  
$queryss="select * from student_tbl where Id='$Id' AND Inst_id='$inst_id'"; 
// echo $queryss;
$res=mysqli_query($con,$queryss);
// $row = mysqli_fetch_array($res);
// echo $row['Name'];  

        while ($row = mysqli_fetch_array($res)) {
            echo'<option value="'.$row['Name'].'" >'.$row['Name'].'</option>';
            }
   
?>

