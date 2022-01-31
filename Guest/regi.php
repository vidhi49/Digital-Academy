<?php
require_once("../connect.php");
$user= $_POST['user'];
$q="select Id from register_tbl where Uname = '$user'";
$res=mysqli_query($con,$q);
$num=mysqli_num_rows($res);

if( $num > 0)
{
	echo "<span style='color:red'>User Name Taken</span>";
}
else{
	
	echo "";
}


?>