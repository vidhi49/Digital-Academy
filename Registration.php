<!DOCTYPE html>
<html>

<head>
	<title> Register </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<style>
		@media screen and (min-width: 992px) {
			.max-width-55 {
				max-width: 55;
			}
		}

		input[type="file"] {
			border: none;
		}
	</style>
</head>

<body>
	<div class="d-flex justify-content-center mt-5">
		<div class="container max-width-55 ">
			<center>
				<h3 class="m-4 text-danger">Register Here </h3>
				<hr width="100%">
			</center>

			<form action="">
				<div class="form-group">
					<label class="form-label">Enter School Name :</label>
					<input type='text' class="form-control" />
				</div>
				<div class="form-group">
					<label class="form-label">Address :</label>
					<textarea cols='20' rows="3" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<label class="form-label">Email :</label>
					<input type='email' class="form-control" placeholder="Enter Valid Email Id" />
				</div>
				<div class="form-group">
					<label class="form-label">Contact No :</label>
					<input type='tel' maxlength="10" class="form-control" placeholder="10 Digits Only" />
				</div>
				<div class="form-group row">
					<label class=" col-sm-4 col-form-label">Provide School Certificate Image :</label>
					<div class="col-sm-8">
						<input type='file' class="form-control-file" />
					</div>
				</div>
				<div class="form-group mt-4">
					<button type="submit" class="btn btn-danger "> Register </button>
				</div>

			</form>
		</div>
	</div>
</body>

</html>