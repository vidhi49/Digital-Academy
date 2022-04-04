<?php

include '../connect.php';
session_start();
$id=$_SESSION['Inst_id'];
$name = $_GET['Id'];


$q="select * from class_tbl where Name='" . $name . "' AND Insti_id='$id' ORDER BY Section";
$queryss = mysqli_query($con, "select * from class_tbl where Name='" . $name . "' AND Insti_id='$id' ORDER BY Section");
while ($row = mysqli_fetch_array($queryss)) {
  echo '<option value="' . $row['Id'] . '" >' . $row['Section'] . '</option>';
}

?>
