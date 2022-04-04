<?php
include ('../connect.php');
session_start();
$inst_id=$_SESSION['inst_id'];
if(isset($_REQUEST['check']))
{
    $email=$_POST['e'];
    $q="select * from student_tbl where Email ='$email' AND Inst_id='$inst_id'";
    $res=mysqli_query($con,$q);
    $nor=mysqli_num_rows($res);
    if($nor>0)
    {
        echo "This Email Already Registered";
    }else
    {
        echo "";
    }
}
if(isset($_REQUEST['update']))
 {
    $email=$_POST['e'];
    $id=$_POST['id'];
    $q="select * from student_tbl where Id = '$id' AND Inst_id='$inst_id'";
    $res=mysqli_query($con,$q);
    $nor=mysqli_num_rows($res);
    if($nor>0)
    {
        while($r=mysqli_fetch_row($res))
        {
            if($r[9]==$email)
            {
                echo "";
            }
            else
            {
                $q1="select * from student_tbl where Email='$email' AND Inst_id='$inst_id'";
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
    
 }

?>