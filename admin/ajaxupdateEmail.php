<?php
session_start();
include_once('../connect.php');

$id=$_SESSION['id'];
$email=$_POST['email'];

$query="select * from master_admin_tbl where Id ='$id'";
$result=mysqli_query($con,$query);
$num=mysqli_num_rows($result);
if($num>0)
{
    while($row=mysqli_fetch_array($result))
    {
        if($row['Email']==$email)
        {
            echo "";
        }
        else
        {
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
        }
    }
}
