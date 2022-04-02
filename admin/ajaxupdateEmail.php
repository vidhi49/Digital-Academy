<?php
session_start();
include_once('../connect.php');

$id=$_SESSION['id'];
$email=$_POST['email'];

$q="select * from master_admin_tbl where Email ='$email'";
$res=mysqli_query($con,$q);
$nor=mysqli_num_rows($res);
if($nor>0)
{
    echo "This Email Already Registered";
}else
{
    echo "";
}
?>