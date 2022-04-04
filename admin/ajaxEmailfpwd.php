<?php
 include ('../connect.php');
$email=$_POST['email'];
$q="select * from master_admin_tbl where Email ='$email'";
$res=mysqli_query($con,$q);
$nor=mysqli_num_rows($res);
if($nor>0)
{
    echo "";
}else
{
    echo "No Admin is Availabe for this Email";
}
?>