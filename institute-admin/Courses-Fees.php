<?php
// session_start();
include("../connect.php");
include("../institute-admin/change-header.php");
$a="fees";

//--------------------------------DELETE------------------------------------------------------------------

if (isset($_GET['Id']) && isset($_GET['action']) && $_GET['action'] == "delete") {
	$Id = $_GET['Id'];
  
	$query = mysqli_query($con, "DELETE FROM class_tbl WHERE Id='$Id'");
  
	if ($query == TRUE) {
  
	  echo "<script type = \"text/javascript\">
				  window.location = (\"create-class.php\")
				  </script>";
	} else {
  
	  $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>";
	}
  }

  //--------------------EDIT------------------------------------------------------------

if (isset($_GET['Id']) && isset($_GET['action']) && $_GET['action'] == "edit") {
	$Id = $_GET['Id'];
  
  
	$query = mysqli_query($con, "select * from class_tbl where Id ='$Id'");
	$row = mysqli_fetch_array($query);
}
  
  ?>
  
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
</head>

<div class="d-flex">
<?php include("institute-sidebar.php"); ?>
<div class="container">

	<div class="col-lg-12">
		<div class="row mb-4 mt-4">
			<div class="col-md-12">
				
			</div>
		</div>
		<div class="row">
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<b>List of Courses and Fees</b>
						<span class="float:right"><a class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="javascript:void(0)" id="new_course">
					<i class="fa fa-plus"></i> New Entry
				</a></span>
					
					</div>
					<div class="card-body">
						<table class="table table-condensed table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="">Course/Level</th>
									
									<th class="">Total Fee</th>
									<th class="text-center">Edit</th>
									<th class="text-center">Delete</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$course = $con->query("SELECT * FROM class_tbl  order by Name asc");
								while($row=$course->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td>
										<p> <b><?php echo $row['Name']?></b></p>
									</td>
									<td class="text-right">
										<p> <b><?php echo number_format($row['Amount'],2) ?></b></p>
									</td>
									
									<?php echo "<td><a href='manage_fees.php'><i class='fas fa-fw fa-edit'></i>Edit</a></td>"?>
										<?php echo "<td><a href='?action=delete&Id=".$row['Id']."'><i class='fas fa-fw fa-trash'></i>Delete</a></td>"?>
										
									
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	

</div>
</div>
