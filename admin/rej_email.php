
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
				$mail->Body='<h3>To,<br> '.$r[1].'</h3><p>We appriciate your interest in collaborating with us.
                However, we have choosen not to move forward with your 
                request for authanticated user.
                </p><p>Unfortunately, your proposal does \'t meet the guideline specified 
                in our application.If you\'re willing to reformat your proposal, 
                we would be happy to reconsider your request,though we can\'t guarantee
                its acceptance.Thank you for your time and interest to reach out to us.</p>
                <p>Regards,</p><p>DGSKOOL<p><p><b>Note:
                This is a system generated Email. please do not replay to this email</b></p>
                ';
				$mail->Username="sem5b.01.tmtbca@gmail.com";
				$mail->Password = "optical1030";
				$mail->Subject="Your Application - DGSKOOL";
				$mail->setFrom("sem5b.01.tmtbca@gmail.com");
				$mail->addAddress("sem5b.02.tmtbca@gmail.com");
                $mail->send();
				$mail->smtpClose();
?>
