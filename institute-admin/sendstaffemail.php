
<?php
require '../phpmailer/PHPMailer.php';
require '../phpmailer/Exception.php';
require '../phpmailer/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
$mail = new PHPMailer();
				$mail->isSMTP();
				$mail->Host='smtp.gmail.com';
				$mail->SMTPAuth = "true";
				$mail->SMTPSecure = "tls";
				$mail->Port="587";
				$mail->isHTML(true);
				$mail->Body='<table width="541"  style="border:5px solid midnightblue;border-radius:10px" align="center" cellpadding="40px">
<tbody align="center" >
  <tr>
    <td width="531" style="background-color: #0E0A37;	color: white;"><h1 style="font-weight: 1000;">Welcome to DGSKOOL</h1>
      <p style="color: white;">You are all set. Now you can use this <br>
          web application with better environment.</p>
      <button style="color: white;border: solid white 2px;background-color: transparent;	border-radius: 5px;	height: 40px;
  font-weight: 700;width: 300px;font-size: 17px;"> Welcome to DGSKOOL</button><br><br>	
    </td>
  </tr>
  <tr>
    <td style="color: midnightblue;">
       <p style="font-size: 20px;
  font-weight: 800;
  color: midnightblue;"><h1  style="color: midnightblue;	font-style: normal;">DGSKOOL</h1> <h2>hereby solemnly affirm and declare
           that [Name of school] act as an authorized user for 
           which  application of registration is filled.</h2></p>
          <p style="font-size: 20px;
  font-weight: 800;
  color: midnightblue;">Login ID: '.$email.'
  <br>
 Password:'.$password.'
 <br>
 User:Student
        </td>
  </tr>
  <tr >
    <td height="187" style="background-color: #f7ca18;color: midnightblue;">
        <h1>We are here to help!</h1>
        <p style="font-size: 20px;
  font-weight: 800;
  ">For any further queries, let us know on email abc@gmail.com .</p>
        
    </td>
  </tr>
</tbody>
</table>';
				$mail->Username="sem5b.01.tmtbca@gmail.com";
				$mail->Password = "optical1030";
				$mail->Subject="Approved Authorization";
				$mail->setFrom("sem5b.01.tmtbca@gmail.com");
				$mail->addAddress("sem5b.02.tmtbca@gmail.com");
                $mail->send();
				$mail->smtpClose();
?>
