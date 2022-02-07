<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="../css/style.css">
<script src="../js/jquery-3.4.1.min"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>
  </head>
  <body>
<?php
    include('../connect.php');
	include('admin-header.php');
  include("admin-sidebar.php");
    $q="select * from inquiry_tbl Where Status='Approved'";
	$res=mysqli_query($con,$q) or die("Query Failed");
	$nor=mysqli_num_rows($res);
    if($nor>0)
	{

?>
<div class="container">
  <div class="table-responsive-md table-sm w-auto">
    <br>
    <h2>Approved Request</h2>
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
      </thead>
      <tbody>
        <?php
		
		while($r=mysqli_fetch_array($res))
		{
			echo "<tr>";
			echo "<th scope='row'>$r[0]</th>";
			echo "<td>$r[1]</td>";
			echo "<td>$r[2]</td>";
			echo "<td>$r[3]</td>";
			echo "<td>$r[4]</td>";
			echo "<td>
            <img class='popup' src='../certi_img/$r[5]' alt='image' style='border-radius:50%' height='100' width='100'>
			</td>";//cert
			echo "<td>$r[7]</td>";
            echo "<td>$r[6]</td>";
			
		}
		echo "</tr>";
	}else
	{
		echo "<center><h1>No Request is Found</h1></center>";
	}
?>
      </tbody>
    </table>
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
</body>
  <script>
  $('.popup').click(function() {
    var src = $(this).attr('src');
    $('.modal').modal('show');
    $('#popup-img').attr('src', src);
  });
  </script>