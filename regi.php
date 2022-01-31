<?php
require_once("Connect.php");
$user= $_POST['user'];
$q="select Id from register_tbl where Uname = '$user'";
$res=mysqli_query($con,$q);
$num=mysqli_num_rows($res);

if( $num > 0)
{
	echo "User Name Taken";
}
else{
	
	echo " ";
}
?>