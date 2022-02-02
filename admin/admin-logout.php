
<?php
	session_start();
	session_destroy();
	header('location:../admin/admin-login.php');
?>