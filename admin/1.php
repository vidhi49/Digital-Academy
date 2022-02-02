<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script> 
<?php
echo "<td>
<a href='#$r[0]' data-rel='popup' data-position-to='window'>
    <img src='../certi_img/$r[5]' class='img-thumbnail' style='height:100px;width:100px;border:2px solid black'>
</a>
<div  data-role='popup' id='$r[0]'>
<img src='../certi_img/$r[5]' class='img-thumbnail' >
</div>

</td>";//cert
?>