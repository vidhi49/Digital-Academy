
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
				$mail->Body='<h3>Hi,<br> '.$r['Name'].'</h3><p>Click here to reset your password
                http://localhost/dgskool/guest/reset-password.php?id='.$row['Id'].'&email='.$row['Email'].'&user='.$user.'</p>
                ';
				$mail->Username="sem5b.01.tmtbca@gmail.com";
				$mail->Password = "optical1030";
				$mail->Subject="Reset Password - DGSKOOL";
				$mail->setFrom("sem5b.01.tmtbca@gmail.com");
				$mail->addAddress("sem5b.02.tmtbca@gmail.com");
                $mail->send();
				$mail->smtpClose();
?>
