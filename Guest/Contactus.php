<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<link href="https://fonts.googleapis.com/css2?family=Aclonica&family=Nova+Slim" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<style>
.content {
  margin-top: 100px;
  margin-bottom: 100px;
  margin-right: 150px;
  margin-left: 80px;
}
</style>
<body>
	<?php require("header.php");?>
<div class="content">
  <div class="container">
    <div class="row align-items-stretch no-gutters contact-wrap">
		<div class="col-md-8" style="background-color: #f7ca18;border-radius:10px">
			<div class="form h-100" style="padding:30px;color:black">
				<h3>Send us a message</h3>
				<form class="mb-5" method="post" id="contactForm" name="contactForm" novalidate="novalidate">
				<div class="row">
					<div class="col-md-6 form-group mb-5">
						<label for="" class="col-form-label">Name *</label>
						<input type="text" class="form-control" name="name" id="name" placeholder="Your name">
					</div>
					<div class="col-md-6 form-group mb-5">
						<label for="" class="col-form-label">Email *</label>
						<input type="text" class="form-control" name="email" id="email" placeholder="Your email">
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 form-group mb-5">
						<label for="" class="col-form-label">Phone</label>
						<input type="text" class="form-control" name="phone" id="phone" placeholder="Phone #">
					</div>
					<div class="col-md-6 form-group mb-5">
						<label for="" class="col-form-label">School or College</label>
						<input type="text" class="form-control" name="company" id="scl" placeholder="School or college name">
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 form-group mb-5">
					<label for="message" class="col-form-label">Message *</label>
					<textarea class="form-control" name="message" id="message" cols="30" rows="4" placeholder="Write your message"></textarea>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 form-group">
					<input type="submit" value="Send Message" class="btn btn-primary rounded-0 py-2 px-4">
					<span class="submitting"></span>
				</div>
			</div>
			</form>
			
				<div id="form-message-success">
				Your message was sent, thank you!
			</div>
			</div>
		</div>
<div class="col-md-4" style="padding:40px" >
	<div class="wpb_wrapper">
		<h4>Contact information:</h4>
		<p style=" font-size: 24px;vertical-align:top;line-height: 30px;"><a >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, magnam!</a></p>
		<h4>Email:</h4>
		<p style=" font-size: 24px;vertical-align:top;line-height: 30px;"><a href="gmail.com">DigitalAcademy.com</a></p>
		<h4>Phone :</h4>
		<p><span style=" font-size: 24px; line-height: 30px;"><a href="tel:+918329631267">+91-832 963 1267</a></span></p>
		<h4>Skype :</h4>
		<p style=" font-size: 24px;vertical-align:top;line-height: 30px;"><a href="google.com">DigitalAcademy.com</a></p>
		<h4 style="padding-bottom:10px;">Social Link Icons :</h4>
		<a href=" place link for icon">
						
		</a>
		<a href=" place link for icon">
						
		</a>
		<a href=" place link for icon">
						
		</a>
		<a href=" place link for icon">
						
		</a>

 </div>
</div>
</div>
</div>
</div>
	<?php require("footer.html");?>
</body>
</html>







