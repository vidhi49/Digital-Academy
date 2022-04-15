<body>
  <?php
  include('../connect.php');
  include('admin-header.php');
  $a = 'institute';
  ?>
  <div class="d-flex">
    <?php include("admin-sidebar.php"); ?>
    <div class="content mt-3 p-3 ">
      <div class="d-flex justify-content-center  m-5"
        style="border-radius:10px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;background-color: white;">
        <?php

        // include("admin-sidebar.php");
        $q = "select * from institute_tbl";
        $res = mysqli_query($con, $q) or die("Query Failed");
        $nor = mysqli_num_rows($res);
        if ($nor > 0) {
        ?>

        <div class="table-responsive-md table-sm w-100 p-5">
          <div class="row">
            <div class="col">
              <h2> Total Institute</h2>
            </div>
            <div class="col d-flex justify-content-end">
              <form action="total_inst_rpt.php" target="_blank">
                <input type="submit" value="Print" class="btn btn-success fs-4" />
              </form>

            </div>
          </div>

          <hr><br>
          <table class="table table-flush table-hover" id="dataTableHover">
            <thead class="thead-light">
              <tr>

                <th scope="th-sm">ID</th>
                <th scope="th-sm">Logo</th>
                <th scope="th-sm">Instition Name</th>
                <th scope="th-sm">Email</th>
                <th scope="th-sm">Address</th>
                <th scope="th-sm">Contact</th>

                <th scope="th-sm">Date</th>
              </tr>
              </tr>
            </thead>
            <tbody>
              <?php

              while ($r = mysqli_fetch_array($res)) {
                echo "<tr>";
                echo "<th scope='row'>$r[0]</th>";
                echo "<td><img class='popup' src='../Institute-logo/$r[10]' style='border-radius:50%' height='100' width='100'></td>"; //logo
                echo "<td>$r[2]</td>"; //name
                echo "<td>$r[3]</td>"; //email
                echo "<td>$r[4],$r[5],$r[6]</td>"; //add
                echo "<td>$r[8]</td>"; //cont
                echo "<td>$r[11]</td>"; //date

              }
              echo "</tr>";
            } else {
              echo "<center><h1>No Institute is Found</h1></center>";
            }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
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
  <script src="../vendor/jquery/jquery.min.js">
  </script>
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

  </html>