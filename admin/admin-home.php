<?php
include('admin-header.php');
?>
<head>
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->
<!-- <link rel="stylesheet" href="../css/style.css"> -->
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src= "https://cdnjs.cloudflare.com/ajax/libs/jquery-popup-overlay/2.1.5/jquery.popupoverlay.min.js"> </script>
</head>
<!-- <script src="../js/jquery-3.4.1.min"></script>  -->
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
			echo "<td>$r[0]</td>";//id
			echo "<td>$r[1]</td>";//name
			echo "<td>$r[2]</td>";//email
			echo "<td>$r[3]</td>";//add
			echo "<td>$r[4]</td>";//con
			echo "<td>
			<a href='#$r[0]' data-rel='popup' data-position-to='window'>
				<img src='../certi_img/$r[5]' class='img-thumbnail' style='height:100px;width:100px;border:2px solid black'>
			</a>
			<div  data-role='popup' id='$r[0]'>
			<img src='../certi_img/$r[5]' class='img-thumbnail' >
			</div>
			</td>";//cert
			echo "<td>$r[7]</td>";//date
            echo "<td>$r[6]</td>";//status
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
