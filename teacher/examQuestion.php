<?php
include('../connect.php');
include('../admin/admin-header.php');
?>
<html>

<body>
  <?php
  if (isset($_POST['createExam'])) {
    $qArr = $_POST['selectedQue'];
    // print_r($qArr);
    foreach ($qArr as $id) {
      // echo $id;
      $que = "select * from question_tbl where id='$id'";
      $res = mysqli_query($con, $que);
      $nor = mysqli_num_rows($res);


      // echo $nor;
      while ($r = mysqli_fetch_array($res)) {
        echo $r[1];
      }
    }
  }
  ?>
  <?php
  // include("../guest/footer.php"); 
  ?>
</body>

</html>