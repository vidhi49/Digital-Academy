
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
				$mail->addAttachment("../certi_img/$f");
				$mail->Body="<h2>Request for approval...</h2>
				<p>$sname has been requested authorization to use DGskool web app.
The information provided by [user] is:</p><p>User Name:$uname <br>Email Id : $email<br>Phone No.:$cno</p>
				";
				$mail->Username="sem5b.01.tmtbca@gmail.com";
				$mail->Password = "optical1030";
				$mail->Subject="Request For Approval...";
				$mail->setFrom("sem5b.01.tmtbca@gmail.com");
				$mail->addAddress("sem5b.02.tmtbca@gmail.com");
				if ($mail->send()){
				echo "Email sent";	
				}
				else{
					echo "Error";
				}
				$mail->smtpClose();
?>