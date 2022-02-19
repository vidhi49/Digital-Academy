<?php

include '../connect.php';

    $name = intval($_GET['name']);
   
   
        $queryss=mysqli_query($con,"select * from class_tbl where Name=".$name." ORDER BY Section");                        
        $countt = mysqli_num_rows($queryss);

       
        // echo'<option value="">--Select Section--</option>';
        while ($row = mysqli_fetch_array($queryss)) {
        echo'<option value="'.$row['Section'].'" >'.$row['Section'].'</option>';
        
        }
        
?>

