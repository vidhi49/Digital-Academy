<body>
  <?php
	include('../connect.php');
	include('admin-header.php'); ?>
  <div class="d-flex">
    <?php include("admin-sidebar.php"); ?>
    <div class="content mt-5 p-3">
      <div class="d-flex justify-content-center">
        <?php
				$show = false;
				$show1 = false;
				$show2 = false;
				$show3 = false;
				if (isset($_REQUEST['approved'])) {
					$status = "Approved";
					$id = $_REQUEST['id'];
					$generator = "ABCDEFGHIJKLMNOPQRSTUVWXYZqwertyuiopasdfghjklzxcvbnm1234567890!@#$%^&*()_+-=,./;'[]\<>?:{}|";
					$password = substr(str_shuffle($generator), 0, 8);
					$pass_hash = password_hash($password, PASSWORD_DEFAULT);
					$q = "select * from inquiry_tbl where Id='$id'";
					$date = date("Y-m-d");
					$res = mysqli_query($con, $q);
					$r = mysqli_fetch_array($res);
					if ($r[6] == "Pending") {
						$q1 = "update inquiry_tbl set status='$status' where Id='$id'";
						mysqli_query($con, $q1) or die("Q1");
						$q2 = "insert into institute_tbl values(null,'$r[0]','$r[1]','$r[2]','$r[3]','','','','$r[4]','$r[5]','','$date')";
						mysqli_query($con, $q2) or die("Q3");
						$q3 = "select * from institute_tbl where Email='$r[2]' and Name='$r[1]'";
						$result = mysqli_query($con, $q3);
						$r1 = mysqli_fetch_array($result);
						$q4 = "insert into institute_admin_tbl values(null,$r1[0],'$r1[1]','$r1[2]','$r1[3]','$pass_hash')";
						mysqli_query($con, $q4) or die("Q4");
						require 'app_email.php';
					// }
					} else if ($r[6] == 'Approved') {
						$show = true; //ALready Approved
						$name = $r[1];
					} else {
						$show2 = true; //Canot reject
						$name = $r[1];
					}
				}
				if (isset($_REQUEST['rejected'])) {
					$status = "Rejected";
					$id = $_REQUEST['id'];
					$q = "select * from inquiry_tbl where Id='$id'";
					$res = mysqli_query($con, $q);
					$r = mysqli_fetch_array($res);
					if ($r[6] == 'Pending') {
						$q1 = "update inquiry_tbl set status='$status' where Id='$id'";
						mysqli_query($con, $q1) or die("Q1");
						require 'rej_email.php';
					} else if ($r[6] == 'Approved') {
						$show1 = true; //It is rejected u canot approved
						$name = $r[1];
					} else {
						$show3 = true; //Already Rejectedd
						$name = $r[1];
					}
				}


				if ($show) {
					echo '
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
		<strong>Alert!!</strong> ';
					echo "$name";
					echo 'is Already Approved.
		<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		</div>
		';
				}
				if ($show1) {
					echo '
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>Alert!!</strong>';
					echo "$name";
					echo ' is Already Approved You cant not Reject .
		<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		</div>
		';
				}
				if ($show2) {
					echo '
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>Alert!!</strong> ';
					echo "$name";
					echo 'is Already Rejected You Cannot Approved.
		<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		</div>
		';
				}
				if ($show3) {
					echo '
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>Alert!!</strong> ';
					echo "$name";
					echo 'is Already Rejected.
		<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		</div>
		';
				}

				$q = "select * from inquiry_tbl";
				$res = mysqli_query($con, $q) or die("Query Failed");
				$nor = mysqli_num_rows($res);

				if ($nor > 0) {
				?>

        <div class="table-responsive-md table-sm w-100 ps-5"><br>
          <h2>Request History
            <hr>
          </h2><?php if (isset($message)) echo "<center><h3>$message</h3></center>"; ?> <br>
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
                <th scope="th-sm">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php

							while ($r = mysqli_fetch_array($res)) {
								echo "<tr>";
								echo "<th scope='row'>$r[0]</th>"; //id
								echo "<td>$r[1]</td>"; //name
								echo "<td>$r[2]</td>"; //email
								echo "<td>$r[3]</td>"; //add
								echo "<td>$r[4]</td>"; //con
								echo "<td>
            <img class='popup' src='../certi_img/$r[5]' alt='image' style='border-radius:50%' height='100' width='100'>
			</td>"; //cert
								echo "<td>$r[7]</td>"; //date
								echo "<td>$r[6]</td>"; //status
								echo "<td><form method='post'><input type='hidden' name='id' value='$r[0]'>";
								echo "<input type='submit' name='approved' id='approved' value='Approved' class='btn btn-success rounded-lg m-2'> &nbsp;";
								echo "<input type='submit' value='Rejected' id='rejected' name='rejected' class='btn btn-danger rounded-lg m-2'></form></td>";
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