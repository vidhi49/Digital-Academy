<?php

include '../connect.php';
session_start();
$instid=$_SESSION['inst_id'];
   $id = $_GET['Name'];
   


        $queryss=mysqli_query($con,"select * from Staff_tbl where Name='$id' AND Inst_id='$instid'");                        
        echo " <option value='' selected >--Select Email--</option>";
        
         while ($row = mysqli_fetch_array($queryss)) {
            
            echo'<option value="'.$row['Email'].'" >'.$row['Email'].'</option>';
            }
        
        
?>

