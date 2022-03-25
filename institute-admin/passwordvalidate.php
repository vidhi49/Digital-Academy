<?php
 include ('../connect.php');
 session_start();
 $email=$_SESSION['email'];
$pwd=$_POST['currentpassword'];
$pass_hash=password_hash($pwd,PASSWORD_DEFAULT);
$q="select * from institute_admin_tbl where Email ='$email'";
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
        }
    }
}else
{
    echo "";
}
?>
