<?php
include '../connect.php';
$response=array();
if(isset($_POST['delete'])){
    $id=$_POST['delete'];
    $que="select * from master_admin_tbl where Id='$id'";
    $re=mysqli_query($con,$que);
    $res1=mysqli_fetch_array($re);
    if($res1['Profile']!='defalut.jpg'){
        unlink("admin_profile/" . $res1['Profile']);
    }
    $query="delete from master_admin_tbl where Id='$id'";
    $res=mysqli_query($con,$query);
    if($res)
    {
        $response['status']='success';
        $response['message']='Admin Deleted Succesfully';
        // echo "Scusse";
    }else
    {
        $response['status']='error';
        $response['message']='Unable to Delete';
        // echo "error";
    }
    echo json_encode($response);
}
