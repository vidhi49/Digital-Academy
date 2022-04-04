<?php
include('../connect.php');
session_start();
$id = $_SESSION['id'];
// echo $id;
$q = "select * from  master_admin_tbl where Id='$id'";
$result = mysqli_query($con, $q);
$row = mysqli_fetch_array($result);
$permission = $row[4];


?>
<div class="table-responsive-md table-sm  p-5">
  <div class="row">
    <div class="col">
      <h2> List of All Admins</h2>
    </div>
    <div class="col d-flex justify-content-end">
      <form action="alladmin_rpt.php" target="_blank">
        <input type="submit" value="Print" class="btn btn-success fs-4" />
      </form>

    </div>
  </div>

  <hr>
  <table class="table table-flush table-hover" id="dataTableHover">
    <thead class="thead-light">
      <tr>
        <th scope="th-sm">ID</th>
        <th scope="th-sm">Profile</th>
        <th scope="th-sm">Email</th>
        <th scope="th-sm">Permission of Adding new Admin</th>
        <?php
        if ($permission == '1') {
          echo '<th scope="th-sm">Edit</th>
                      <th scope="th-sm">Delete</th>';
        }
        ?>

      </tr>
      </tr>
    </thead>
    <tbody>
      <?php
      // include("admin-sidebar.php");
      $q = "select * from master_admin_tbl ";
      $res = mysqli_query($con, $q) or die("Query Failed");
      $nor = mysqli_num_rows($res);
      if ($nor > 0) {
        while ($r = mysqli_fetch_array($res)) {
          echo "<tr>";
          echo "<th scope='row'>$r[0]</th>";
          echo "<td>
                        <img class='popup' src='admin_profile/$r[3]' alt='image' style='border-radius:50%' height='100' width='100'>
                  </td>";
          echo "<td>$r[1]</td>";
          if ($r[4] == '1') {
            echo "<td>Admin can Add New Admin</td>";
          } else {
            echo "<td style='color:red'>Admin can not Add New Admin</td>";
          }

          if ($permission == '1') {
            echo "<td class='' >
                  <a  class='btn btn-info' href='update-admin.php?Id=" . $r['Id'] . "' id='edit'  ></i>Edit</a> </td>";
            echo "<td class='' ><a  class='btn btn-danger' id='delete' href='#' data-id='" . $r['Id'] . "' ></i>Delete</a>
                
                 ";
          }
        }
        echo "</tr>";
      } else {
        echo "<center><h1>No Request is Found</h1></center>";
      }
      ?>
    </tbody>
  </table>
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <img class="w-100" id="popup-img" src="" alt="image">
    </div>
  </div>
</div>
<script>
  $('.popup').click(function() {
    var src = $(this).attr('src');
    $('.modal').modal('show');
    $('#popup-img').attr('src', src);
  });
</script>

</body>
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/ruang-admin.min.js"></script>
<!-- Page level plugins -->
<script src="../vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script>
  $(document).ready(function() {
    $('#dataTable').DataTable(); // ID From dataTable 
    $('#dataTableHover').DataTable(); // ID From dataTable with Hover
  });
</script>