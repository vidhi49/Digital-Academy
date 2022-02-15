<?php

include '../connect.php';

   $id = $_GET['Email'];
   


        $queryss=mysqli_query($con,"select * from Staff_tbl where Email='$id'");                        
        
        // //while ($row = mysqli_fetch_array($queryss)) {
        // // echo " <input type='text' name ='tid' value ='".$row[0]."' class='form-control' disabled>";
        // echo $row[0];
        
        // }
        while ($row = mysqli_fetch_array($queryss)) {
                echo'<option value="'.$row['Id'].'" >'.$row['Id'].'</option>';
                }
        
?>

