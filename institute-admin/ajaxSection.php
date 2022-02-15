<?php

include '../connect.php';

    $id = $_POST['Id'];//
   
    $q="select * from class_tbl where Id ='$id' ";
    $res=mysqli_query($con,$q);
    $nor=mysqli_num_rows($res);
        if($nor>0)
            {
                while ($row = mysqli_fetch_array($res)) {
                    echo'<option value="'.$row['Section'].'" >'.$row['Section'].'</option>';
                    
                    }
            }else
            {
                echo "$nor";
            }
            
        //echo "<script>alert($row['Section']);</script>";
        // echo '
        // <select required name="section" class="form-control mb-3">';
        //echo'<option value="">--Select Section--</option>';
        // while ($row = mysqli_fetch_array($queryss)) {
        // echo'<option value="'.$row['Section'].'" >'.$row['Section'].'</option>';
        
        // }
        //echo '</select>';
?>

