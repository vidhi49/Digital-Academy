<?php

include '../connect.php';
session_start();
// $inst_id=$_SESSION['inst_id'];
$classId = $_GET['classid'];
// $Class_id = $_REQUEST['class'];
$Amount = $_REQUEST['amount'];
// echo $classId;
echo $Class_id;
  
$queryss="select * from fees where Class_id= '$classId'"; 
// // echo $queryss;
$res=mysqli_query($con,$queryss);
// $row = mysqli_fetch_array($res);
// echo $row['Name'];  

        while ($row = mysqli_fetch_array($res)) {
            echo'<option value="'.$row['Amount'].'" >'.$row['Amount'].'</option>';
          
            }

// echo'<option value="" >'.$queryss.'</option>';
?>

