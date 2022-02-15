<!doctype html>
<html>
<head>

	<meta charset="utf-8">
	<title>Employee Management</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Aclonica&family=Nova+Slim" rel="stylesheet">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="jquery-3.1.1.min.js"></script>
	
</head>

<body>
		<div class="container p-5">
		<form method="post">
			<div class="form-group">
			  <h1 class="mb-5 text-left text-danger"> Personal Details <hr></h1>
			</div>
			<div class="mb-4">
			  <label class="form-label" >Name:</label>
			  <input type="text" class="form-control" id="name" placeholder="Enter Your Name" required>
			</div>
			<div class="row ">
			    <div class="col-md-4">
                		<label for="city"> Gender : </label>
                		<select class="form-control" name="gender" required>
                    		<option> Male </option>
                    		<option> Female </option>
                    		<option> Other </option>
						</select>
					</div>
				<div class="col-md-4">
				  <label class="form-label">DOB[Date of birth]:</label>
				  <input class="form-control" type="date" id="dob" name="dob" required>
				</div>
				<div class="col-md-4">
				  <label class="form-label">Phone No.:</label>
				  <input class="form-control" type="number" id="phno" name="phno"  placeholder="Enter your phone number" required>
				</div>	
			</div>
			<div class="mb-3">
			  <label class="form-label">Address:</label>
			  <input class="form-control" type="text" id="address" name="address"  placeholder="Enter your address" required>
			</div>
			
			<div class="mb-5">
				<h1 class="mb-5 text-left text-danger"> Document Upload <hr></h1>
				
				<div class="row">
					<div class="col-sm-3" >
						<label class="form-label">ID Proof :</label>
						<input type='file' id="id_proof" name="id_proof" required class="form-control-file" />
					</div>
					
					<div class="col-sm-3" >
						<label class="form-label">Qualification certificate :</label>
						<input type='file' id="qcerti" name="qcerti" required class="form-control-file" />
					</div>
					<div class="col-sm-3" >
						<label class="form-label">Experience certificate :</label>
						<input type='file' id="ecerti" name="ecerti" required class="form-control-file" />
					</div>	
					<div class="col-sm-3">
					<label class="form-label">Other Documents :</label>
						<input type='file' id="other_doc" name="other_doc" required class="form-control-file" />
					</div>
				</div>	
			</div>
			<div class="mb-3">
			<h1 class="mb-5 text-left text-danger">Document Details <hr></h1>	
			<label class="form-label mb-4">Date of Joining :</label>&nbsp;&nbsp;&nbsp;
			<input type="date" id="doj"><br>
			<label class="form-label">Staff Designation :</label>
			<select class="form-select" id="designation" name="designation" required>
				<option disabled selected>Choose...</option>
					  <option value="1"  id="teaching"> Teaching </option>
					  <option value="2" id="non_teaching"> Non-teaching </option>
			  </select>
			</div>
			<script>
				$(document).ready(function()
				{
					$("#designation").mouseenter(function(){
						var type=$("#designation").val();
						if(document.getElementById("designation").value==1)
							{
								document.getElementById("d").visibility = "hidden";
							}
						else
						{
							document.getElementById("d").visibility = "show";
						}
					});
				});	

				</script>
			<div class="mb-3" id="d">
				<label class="form-select" name="class" required>Class Prefered</label>
				<select class="form-select" id="class" name="class" required>
				<option disabled selected>Choose...</option>
					  <option value=""  id="prenursary"> Pre-Nursary </option>
					  <option value="" id="nursary"> Nursary </option>
					  <option value=""  id="kg">  Kg </option>
					  <option value=""  id="lkg">  Lkg </option>
					  <option value="" id="1"> 1 </option>
					  <option value=""  id="2"> 2 </option>
					  <option value="" id="3"> 3 </option>
					  <option value=""  id="4"> 4 </option>
					  <option value="" id="5"> 5 </option>
					  <option value=""  id="6"> 6 </option>
					  <option value="" id="7"> 7 </option>
					  <option value=""  id="8"> 8 </option>
					  <option value="" id="9"> 9 </option>
					  <option value="" id="10"> 10 </option>
				</select>
           
			
			<label class="form-select" name="subject" required>Subject Prefered</label>
				<select class="form-select" id="subject" name="subject" required>
				<option disabled selected>Choose...</option>
					 <option value="" id="math"> Mathematics  </option>
					 <option value="" id="science"> Science  </option>
					 <option value="" id="english"> English  </option>
					 <option value="" id="hindi"> Hindi  </option>
					 <option value="" id="gujarati">Gujarati  </option>
					 <option value="" id="sanskrit"> Sanskrit  </option>
					 <option value="" id="pt"> Physical Training  </option>	  
				</select>
			 </div>
        
		
			<button type="submit" class="btn btn-primary bg-danger mt-4">Submit</button>
		</form>
		</div>	
</body>
</html>