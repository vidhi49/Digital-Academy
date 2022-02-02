<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="../css/style.css">
<script src="../js/jquery-3.4.1.min"></script> 
<?php
    include('../connect.php');
	include('admin-header.php');
    $q="select * from institute_tbl";
	$res=mysqli_query($con,$q) or die("Query Failed");
	$nor=mysqli_num_rows($res);
    if($nor>0)
	{

?>
    <div >
		<div ><br>
			<h2>Total Institution</h2><hr><br>    
			<table class="table table-hover">
			<thead>
                <tr>
                    <th>ID</th>
                    <th>Instition Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th>Certificate Imgae</th>
                    <th>Logo</th>
                    <th>Approval Date</th>
                 </tr>
            </thead>
            <tbody>
            <?php
		
		while($r=mysqli_fetch_array($res))
		{
			echo "<tr>";
			echo "<td>$r[0]</td>";
			echo "<td>$r[1]</td>";
			echo "<td>$r[2]</td>";
			echo "<td>$r[3]</td>";
			echo "<td>$r[4]</td>";
			echo "<td>$r[5]</td>";
			echo "<td>$r[6]</td>";
            echo "<td>$r[7]</td>";
			
		}
		echo "</tr>";
	}else
	{
		echo "<center><h1>No Institute is Registered yet...</h1></center>";
	}
?>
    </tbody>
  </table>
</div>

</div>
