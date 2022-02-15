<?php

include '../connect.php';

   $id = $_GET['Name'];
   


        $queryss=mysqli_query($con,"select * from Staff_tbl where Name='$id'");                        
        echo " <option value='' selected >--Select Email--</option>";
        
         while ($row = mysqli_fetch_array($queryss)) {
            
            echo'<option value="'.$row['Email'].'" >'.$row['Email'].'</option>';
            }
        
        
?>

