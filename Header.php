<!DOCTYPE html>
<html>
<head>
    <title> Top </title>
	<meta charset="UTF-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Aclonica&family=Marcellus+SC" rel="stylesheet"></head>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<style>
	.minht
		{
			min-height: 475px;
		}
	li
	{
		padding: 3px;
	}
	.a {
		font-family:'Marcellus SC', serif;	
		font-size: 70px;
	}	
	</style>
<body>
 <nav style="background-color: #0E0A37" class="navbar navbar-expand-md pt-3 pb-2" >
    <div class="container " >
		<img src="dg5.png" height=40px>
		<h4 class="a"> <font color="#f7ca18"> skool </font></h4>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                     <a class="nav-link text-light" href="guest_home.php" >Home </a> 
                </li>
                 <li class="nav-item">
                    <a class="nav-link text-light" href="Registration.php"> Register </a>
                </li> 
				<li class="nav-item">
                    <a class="nav-link text-light" href="Login.php"> Login </a>
                </li> 
				<li class="nav-item">
                    <a class="nav-link text-light" href="Contactus.php"> Contact Us  </a>
                </li> 
				<li class="nav-item">
                    <a class="nav-link text-light" href="Aboutus.php"> About Us </a>
                </li> 
            </ul>
        </div>
    </div>
  </nav>

</body>
</html>
<?php
include("Connect.php");
?>