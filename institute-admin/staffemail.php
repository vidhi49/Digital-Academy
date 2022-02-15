<?php
 include ('../connect.php');
$email=$_POST['e'];
$q="select * from staff_tbl where Email ='$email'";
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