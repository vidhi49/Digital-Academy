<?php
include('../connect.php');
session_start();
$id=$_SESSION['inst_id'];
$que="select * from institute_tbl where Id='$id'";
 $result=mysqli_query($con,$que);
 $r1=mysqli_fetch_array($result);
 $currentemail=$r1['Email'];
 $instemail=$_POST['email'];
 if($currentemail==$instemail)
 {
    echo "";
 }
 else
{
    $q="select * from institute_tbl where Email='$instemail'";
$res=mysqli_query($con,$q);
$nor=mysqli_num_rows($res);
if($nor>0)
{
    echo "Institute Email is Already Registered";
   
    
}
else
{
    echo "";
}
}
