<?php
 include ('../connect.php');
$sname=$_POST['sname'];
$q="select * from inquiry_tbl where Name ='$sname'";
$res=mysqli_query($con,$q);
$nor=mysqli_num_rows($res);
if($nor>0)
{
    echo "The Institute is Already Registered";
}else
{
    echo "";
}
?>
