<head>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../css/style.css">
<script src="../js/jquery-3.4.1.min"></script> 
</head>
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
		
		while($r=mysqli_fetch_array($res))
		{
			echo "<tr>";
			echo "<td>$r[0]</td>";//id
			echo "<td><img class='popup' src='../Institute-logo/$r[9]' style='border-radius:50%' height='100' width='100'></td>";//logo
			echo "<td>$r[1]</td>";//name
			echo "<td>$r[2]</td>";//email
			echo "<td>$r[3]</td>";//add
			echo "<td>$r[7]</td>";//cont
            echo "<td>$r[10]</td>";//date
			
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
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <img class="w-100" id="popup-img" src="" alt="image">
    </div>
  </div>
</div>
<script>
    $('.popup').click(function(){
        var src= $(this).attr('src');
        $('.modal').modal('show');
        $('#popup-img').attr('src',src);
    });

</script>


