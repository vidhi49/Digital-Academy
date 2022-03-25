<?php
 include ('../connect.php');
 session_start();
 $currentname=$_SESSION['name'];
$instname=$_POST['instname'];
$q="select * from institute_admin_tbl where Inst_name = '$currentname'";
$res=mysqli_query($con,$q);
$nor=mysqli_num_rows($res);
if($nor>0)
{
    while($r=mysqli_fetch_row($res))
    {
        if($r[3]==$instname)
        {
            echo "";
        }
        else
        {
            $q1="select * from institute_admin_tbl where Inst_name='$instname'";
            $res1=mysqli_query($con,$q1);
            $nor1=mysqli_num_rows($res1);
            if($nor1>0)
            {
                echo"Institute Name is Already Registered";
            }
            else
            {
                echo "";
            }
        }
    }
}


?>

