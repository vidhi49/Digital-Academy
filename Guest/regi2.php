<?php
require_once("../connect.php");
$user2= $_POST['users'];
$q1="select Id from register_tbl where Uname = '$user2'";
$res1=mysqli_query($con,$q1);
$num1=mysqli_num_rows($res1);

if( $num1 > 0)
{
	echo "<script>alert ('User is Already Taken')</script>";
}
else{
	
	echo "";
}
?>