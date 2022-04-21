<?php
 include ('../connect.php');
 session_start();
$id=$_SESSION['Id'];
$inst_id=$_SESSION['Inst_id'];
$pwd=$_POST['currentpassword'];
$pass_hash=password_hash($pwd,PASSWORD_DEFAULT);
$q="select * from staff_tbl where Inst_id='$inst_id'and Id='$id'";
$res=mysqli_query($con,$q);
$nor=mysqli_num_rows($res);
if($nor>0)
{
    while($r=mysqli_fetch_array($res))
    {
        if(password_verify($pwd, $r['Pwd']))
        {
            echo "";
        }
        else
        {
            echo "Current Password Does Not Matched";
            // echo $pwd;
        }
    }
}else
{
    echo "";
}
?>
