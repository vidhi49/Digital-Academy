<?php include("../connect.php");
// session_start();
// include("../admin/admin-header.php");
include("../institute-admin/change-header.php");
// include("../institute-admin/institute-header.php");
$a = "institutedashboard";
$inst_id = $_SESSION['inst_id'];
?>

<head>
    <script src="../js/jquery-3.1.1.min.js"></script>
   
</head>
<html>

<body>
    <div class="d-flex">
        <?php
        include("institute-sidebar.php");
        ?>
        <div class="institute-content  text-muted">
           Welcome Admin!!!
            
        </div>
    </div>
</body>

</html>
