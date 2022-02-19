<?php

include '../connect.php';

$className = intval($_GET['className']); //

$queryss = mysqli_query($con, "select * from subject_tbl where Class_name=" . $className . "");
$countt = mysqli_num_rows($queryss);
// echo '
// <select required name="section" class="form-control mb-3">';
echo '<option value="">----- Choose any one -----</option>';
while ($row = mysqli_fetch_array($queryss)) {
  echo '<option value="' . $row['Id'] . '" >' . $row['Sub_name'] . '</option>';
}
        //echo '</select>';