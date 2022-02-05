<?php
 include ('../connect.php');
$email=$_POST['email'];
$q="select * from inquiry_tbl where Email ='$email'";
$res=mysqli_query($con,$q);
$nor=mysqli_num_rows($res);
if($nor>0)
{
    echo "The Institute from this Email Already Registered";
}else
{
    echo "";
}
?>