<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="../css/style.css">
<script src="../js/jquery-3.4.1.min"></script>
<?php
    include('../connect.php');
	include('admin-header.php');
  include("admin-sidebar.php");
    $q="select * from inquiry_tbl Where Status='Pending'";
	$res=mysqli_query($con,$q) or die("Query Failed");
	$nor=mysqli_num_rows($res);
    if($nor>0)
	{
?>
<div class="container">
  <div class="table-responsive-md table-sm w-auto">
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
		
		while($r=mysqli_fetch_array($res))
		{
			echo "<tr>";
			echo "<th scope='row'>$r[0]</th>";
			echo "<td>$r[1]</td>";
			echo "<td>$r[2]</td>";
			echo "<td>$r[3]</td>";
			echo "<td>$r[4]</td>";
			echo "<td>$r[5]</td>";
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