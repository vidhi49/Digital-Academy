 <?php
 include ('../connect.php');
 session_start();
 $currentemail=$_SESSION['email'];
$email=$_POST['email'];
$q="select * from institute_admin_tbl where Email = '$currentemail'";
$res=mysqli_query($con,$q);
$nor=mysqli_num_rows($res);
if($nor>0)
{
    while($r=mysqli_fetch_row($res))
    {
        if($r[4]==$email)
        {
            echo "";
        }
        else
        {
            $q1="select * from institute_admin_tbl where Email='$email'";
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

