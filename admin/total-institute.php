<html>

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
        $q = "select * from institute_tbl";
        $res = mysqli_query($con, $q) or die("Query Failed");
        $nor = mysqli_num_rows($res);
        if ($nor > 0) {
        ?>

        <div class="table-responsive-md table-sm w-100 p-5">
          <h2>Total Institution</h2>
          <hr><br>
          <table class="table table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Logo</th>
                <th>Instition Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Approval Date</th>
              </tr>
            </thead>
            <tbody>
              <?php
              while ($r = mysqli_fetch_array($res)) {
                echo "<tr>";
                echo "<td>$r[0]</td>"; //id
                echo "<td><img class='popup' src='../Institute-logo/$r[9]' style='border-radius:50%' height='100' width='100'></td>"; //logo
                echo "<td>$r[1]</td>"; //name
                echo "<td>$r[2]</td>"; //email
                echo "<td>$r[3]</td>"; //add
                echo "<td>$r[7]</td>"; //cont
                echo "<td>$r[10]</td>"; //date
              }
              echo "</tr>";
            } else {
              echo "<center><h1>No Institute is Registered yet...</h1></center>";
            }
              ?>
            </tbody>
          </table>
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