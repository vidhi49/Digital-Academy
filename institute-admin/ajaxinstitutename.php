<?php
include('../connect.php');
session_start();
$id=$_SESSION['inst_id'];
$que="select * from institute_tbl where Id='$id'";
 $result=mysqli_query($con,$que);
 $r1=mysqli_fetch_array($result);
 $currentname=$r1['Name'];
 $instname=$_POST['instname'];
 if($currentname==$instname)
 {
    echo "";
 }
 else
{
    $q="select * from institute_tbl where Name='$instname'";
$res=mysqli_query($con,$q);
$nor=mysqli_num_rows($res);
if($nor>0)
{
    echo "Institute Name is Already Registered";
   
    
}
else
{
    echo "";
}
}
