<?php
include '../connect.php';
$response=array();
session_start();
$instid=$_SESSION['inst_id'];
if(isset($_POST['delete'])){
    $id=$_POST['delete'];
    $que="select * from student_tbl where Id='$id' AND Inst_id='$instid'";
    $re=mysqli_query($con,$que);
    $res1=mysqli_fetch_array($re);
    unlink("student_profile/" . $res1['Profile']);
    $query="delete from student_tbl where Id='$id' AND Inst_id='$instid'";
    $res=mysqli_query($con,$query);
    if($res)
    {
        $response['status']='success';
        $response['message']='Student Deleted Succesfully';
        // echo "Scusse";
    }else
    {
        $response['status']='error';
        $response['message']='Unable to Delete';
        // echo "error";
    }
    echo json_encode($response);
}
if(isset($_POST['stud_id']))
{
    $id=$_POST['stud_id'];
    $result_array=array();
    $query="select * from student_tbl where Id='$id' AND Inst_id='$instid'";
    $res=mysqli_query($con,$query);
    if(mysqli_num_rows($res)>0)
    {
        foreach($res as $row)
        {
            array_push($result_array,$row);
        }
        header('Content-type: application/json');
        echo json_encode($result_array);
    }
    else{
        echo "No Record Found!";
    }
}
