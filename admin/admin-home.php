<body>
	<?php
	include('../connect.php');
	include('admin-header.php');
	$a = 'allrequest';
	?>
	<div class="d-flex">
		<?php include("admin-sidebar.php"); ?>
		<div class="content mt-3 p-3 ">
			<div class=" justify-content-center  m-5" style="border-radius:10px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;background-color: white;">
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
						$q1 = "update inquiry_tbl set status='$status', Date='$date' where Id='$id'";
						mysqli_query($con, $q1) or die("Q1");
						$q2 = "insert into institute_tbl values(null,'$r[0]','$r[1]','$r[2]','$r[3]','','','','$r[4]','$r[5]','','$date')";
						// echo $q2;
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
					$date = date("Y-m-d");
					$q = "select * from inquiry_tbl where Id='$id'";
					$res = mysqli_query($con, $q);
					$r = mysqli_fetch_array($res);
					if ($r[6] == 'Pending') {
						$q1 = "update inquiry_tbl set status='$status' , Date='$date' where Id='$id'";
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
					echo "<script> 
						Swal.fire({
							title: 'Already Approved',
							text: '$name is Already Approved',
							confirmButtonColor: '#3085d6',
							confirmButtonText: 'OK',
						})</script>";
				}
				if ($show1) {
					echo "<script> 
						Swal.fire({
							title: 'Already Approved',
							text: '$name is Already Approved You can not Reject',
							confirmButtonColor: '#3085d6',
							confirmButtonText: 'OK',
						})</script>";
				}
				if ($show2) {
					echo "<script> 
						Swal.fire({
							title: 'Already Rejected',
							text: '$name is Already Rejected You Cannot Approved',
							confirmButtonColor: '#d33',
							confirmButtonText: 'OK',
						})</script>";
				}
				if ($show3) {
					echo "<script> 
						Swal.fire({
							title: 'Already Rejected',
							text: '$name is Already Rejected',
							confirmButtonColor: '#d33',
							confirmButtonText: 'OK',
						})</script>";
				}
				// include("admin-sidebar.php");
				$q = "select * from inquiry_tbl";
				$res = mysqli_query($con, $q) or die("Query Failed");
				$nor = mysqli_num_rows($res);
				if ($nor > 0) {
				?>

					<div class="table-responsive-md table-sm w-100 p-5" >
						<div class="row">
							<div class="col">
							<h2> All Request</h2>
							</div>
							<div class="col d-flex justify-content-end">
								<form action="total_req_rpt.php" target="_blank">
									<input type="submit" value="Print" id="print" class="btn btn-success fs-4" />
								</form>

							</div>
						</div>
						
						<hr><br>
						<table class="table table-flush table-hover" id="dataTableHover" style="border: 10px;">
							<thead class="thead-light">
								<tr>
									<th scope="th-sm">ID</th>
									<th scope="th-sm">Instition Name</th>
									<th scope="th-sm">Email</th>
									<th scope="th-sm">Address</th>
									<th scope="th-sm">Contact</th>
									<th scope="th-sm">Certificate</th>
									<th scope="th-sm">Date</th>
									<th scope="th-sm">Status</th>
									<th scope="th-sm" id='link'>Action</th>

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
								echo "<td id='link1'><form method='post'><input type='hidden' name='id' value='$r[0]'>";
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
	</div>
	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<img class="w-100" id="popup-img" src="" height="600" width="200" alt="image">
			</div>
		</div>
	</div>
	<script>
		$('.popup').click(function() {
			var src = $(this).attr('src');
			$('.modal').modal('show');
			$('#popup-img').attr('src', src);
		});
// 		$('#print').click(function() {
//     $('#link').hide();
//     $('#link1').hide();
//     $('#link2').hide();
//     $('#link3').hide();
//     var printme=document.getElementById('dataTableHover');
//     var wme = window.open();
//     wme.document.write('<html><body onload="window.print()">' + printme.outerHTML + '</html>');
//     wme.document.close();
//     wme.print();
//     wme.close();
//     $('#link').show();
//     $('#link1').show();
//     $('#link2').show();
//     $('#link3').show();
//   });
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

</html>