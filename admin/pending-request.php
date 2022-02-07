<body>
  <?php
  include('../connect.php');
  include('admin-header.php'); ?>
  <div class="d-flex">
    <?php include("admin-sidebar.php"); ?>
    <div class="content mt-5 p-3">
      <div class="d-flex justify-content-center">
        <?php

        // include("admin-sidebar.php");
        $q = "select * from inquiry_tbl Where Status='Pending'";
        $res = mysqli_query($con, $q) or die("Query Failed");
        $nor = mysqli_num_rows($res);
        if ($nor > 0) {
        ?>

        <div class="table-responsive-md table-sm w-75">
          <h2> Pending Request</h2>
          <hr><br>
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="th-sm">ID</th>
                <th scope="th-sm">Instition Name</th>
                <th scope="th-sm">Email</th>
                <th scope="th-sm">Address</th>
                <th scope="th-sm">Contact</th>
                <th scope="th-sm">Certificate</th>
                <th scope="th-sm">Date</th>
                <th scope="th-sm">Status</th>
              </tr>
              </tr>
            </thead>
            <tbody>
              <?php

              while ($r = mysqli_fetch_array($res)) {
                echo "<tr>";
                echo "<th scope='row'>$r[0]</th>";
                echo "<td>$r[1]</td>";
                echo "<td>$r[2]</td>";
                echo "<td>$r[3]</td>";
                echo "<td>$r[4]</td>";
                echo "<td>
            <img class='popup' src='../certi_img/$r[5]' alt='image' style='border-radius:50%' height='100' width='100'>
			</td>";
                echo "<td>$r[7]</td>";
                echo "<td>$r[6]</td>";
              }
              echo "</tr>";
            } else {
              echo "<center><h1>No Request is Found</h1></center>";
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
  <?php include("../guest/footer.php"); ?>
</body>

</html>