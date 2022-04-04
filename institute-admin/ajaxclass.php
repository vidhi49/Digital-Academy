<?php

include '../connect.php';
session_start();
$id=$_SESSION['inst_id'];
$name = $_GET['name'];


$queryss = mysqli_query($con, "select * from class_tbl where Name='" . $name . "' AND Insti_id='$id' ORDER BY Section");
$countt = mysqli_num_rows($queryss);


echo'<option value="" selected hidden>--Select Section--</option>';
while ($row = mysqli_fetch_array($queryss)) {
    echo '<option value="' . $row['Section'] . '" >' . $row['Section'] . '</option>';
}

?>
<!-- 
// echo '
// <select required name="section" class="form-control mb-3">';
//echo'<option value="">--Select Section--</option>';
while ($row = mysqli_fetch_array($queryss)) {
    echo '<option  value="' . $row['Section'] . '" >' . $row['Section'] . '</option>';
}
        //echo '</select>'; -->