<?php
$con = mysqli_connect("localhost", "root", "root@123") or die("Couldn't connect to server");
mysqli_select_db($con, "dgskool") or die("No database found");