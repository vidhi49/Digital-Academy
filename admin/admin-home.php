<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="../css/style.css">
<script src="../js/jquery-3.4.1.min"></script> 
<script src="../js/req.js"></script>
<style>
	#submit:disabled{
		background-color:black;
		opacity:0.2;
	}
	</style>
	
<?php
include('../connect.php');
		$show=false;
		$show1=false;
		$show2=false;
		$show3=false;
		if(isset($_REQUEST['approved']))
		{
			$status="Approved";
			$id=$_REQUEST['id'];					
			$q ="select * from inquiry_tbl where Id='$id'";
			$date=date("Y-m-d");
			$res=mysqli_query($con,$q);
			$r=mysqli_fetch_array($res);
			if($r[6]=="Pending")
			{
				$q1="update inquiry_tbl set status='$status' where Id='$id'";
				mysqli_query($con,$q1) or die("Q1");
				$q2="insert into institute_tbl values(null,'$r[1]','$r[2]','$r[3]','$r[4]','$r[5]','','$date')";
				mysqli_query($con,$q2) or die("Q3");
				require 'app_email.php';		
			}
			else if($r[6]=='Approved')
			{
				$show=true;//ALready Approved
				$name=$r[1];
			}
			else
			{
				$show2=true;//Canot reject
				$name=$r[1];
			}

		}
		if(isset($_REQUEST['rejected']))
		{
			$status="Rejected";
			$id=$_REQUEST['id'];	
			$q="select * from inquiry_tbl where Id='$id'";
			$res=mysqli_query($con,$q);
			$r=mysqli_fetch_array($res);
			if($r[6]=='Pending')
			{
				$q1="update inquiry_tbl set status='$status' where Id='$id'";
				mysqli_query($con,$q1) or die("Q1");	
				require 'rej_email.php';	
			}
			else if($r[6]=='Approved')
			{
				$show1=true;//It is rejected u canot approved
				$name=$r[1];
			}
			else
			{
				$show3=true;//Already Rejectedd
				$name=$r[1];
			}

			
		}
	
	include('admin-header.php');
		if($show)
		{
		echo '
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
		<strong>Alert!!</strong> ';
		echo "$name";
		echo 'is Already Approved.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		</div>
		';
		}
		if($show1)
		{
		echo '
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>Alert!!</strong>';
		echo "$name";
		echo ' is Already Approved You cant not Reject .
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		</div>
		';
		}
		if($show2)
		{
		echo '
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>Alert!!</strong> ';
		echo "$name";
		echo 'is Already Rejected You Cannot Approved.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		</div>
		';
		}
		if($show3)
		{
		echo '
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>Alert!!</strong> ';
		echo "$name";
		echo 'is Already Rejected.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		</div>
		';
		}
    include('../connect.php');
    $q="select * from inquiry_tbl";
	$res=mysqli_query($con,$q) or die("Query Failed");
	$nor=mysqli_num_rows($res);

    if($nor>0)
	{

?>
<div >
		<div ><br>
			<h2>Request History</h2><?php if(isset($message)) echo "<center><h3>$message</h3></center>";?> <br>    
			<table class="table table-hover">
			<thead>
                <tr>
                    <th>ID</th>
                    <th>Instition Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th>Certificate</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
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
			echo "<td>$r[7]</td>";
            echo "<td>$r[6]</td>";
			echo "<td><form method='post'><input type='hidden' name='id' value='$r[0]'>";
			echo "<input type='submit' name='approved' id='approved' value='Approved' class='btn btn-success rounded-lg'> &nbsp;";
		echo "<input type='submit' value='Rejected' id='rejected' name='rejected' class='btn btn-danger rounded-lg'></form></td>";
			
			
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
