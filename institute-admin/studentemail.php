<?php
 include ('../connect.php');
 session_start();
$email=$_POST['e'];
// $q="select * from student_tbl where Email ='$email'";
// $res=mysqli_query($con,$q);
// $nor=mysqli_num_rows($res);
// if($nor>0)
// {
//     echo "This Email Already Registered";
// }else
// {
//     echo "";
// }


$q="select * from student_tbl where Email = '$email'";
$res=mysqli_query($con,$q);
$nor=mysqli_num_rows($res);
if($nor>0)
{
    while($r=mysqli_fetch_row($res))
    {
        if($r[10]==$email)
        {
            echo "";
        }
        else
        {
            $q1="select * from student_tbl where Email='$email'";
            $res1=mysqli_query($con,$q1);
            $nor1=mysqli_num_rows($res1);
            if($nor1>0)
            {
                echo"Email is Already Registered";
            }
            else
            {
                echo "";
            }
        }
    }
}


?>

