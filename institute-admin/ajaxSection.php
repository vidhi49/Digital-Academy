<?php

include '../connect.php';

    $name = intval($_GET['name']);
    //$abc=$_GET['abc'];
   
        $queryss=mysqli_query($con,"select * from class_tbl where Name=".$name." ORDER BY Section");                        
        $countt = mysqli_num_rows($queryss);

        // echo '
        // <select required name="section" class="form-control mb-3">';
        echo'<option value="">--Select Section--</option>';
        while ($row = mysqli_fetch_array($queryss)) {
        echo'<option value="'.$row['Id'].'" >'.$row['Section'].'</option>';
        
        }
        //echo '</select>';
?>

