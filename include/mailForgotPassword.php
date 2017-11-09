<?php 
require_once('../dist/mailer/class.phpmailer.php');
require_once('../dist/mailer/PHPMailerAutoload.php');

	    $email_tujuan	 = "$inputValue";

$mail             = new PHPMailer();
$body             = '<center><h3>New Password : '.$newpassword.'</h3></center>';
$body             = eregi_replace("[\]",'',$body);					

$mail->IsSMTP(); // telling the class to use SMTP
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
$mail->Host       = "smtp.admin.com";      // sets Email as the SMTP server
$mail->Port       = 587;                  	  // set the SMTP port for the GMAIL server
$mail->Username   = "admin@admin.com";  // Email username
$mail->Password   = "admin";          		     // Email password

$mail->SetFrom('admin@admin.com', 'Admin');

$mail->Subject    = "Forgot Password";

$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);

$mail->AddAddress($email_tujuan);

//$mail->AddAttachment("images/phpmailer.gif");      // attachment
if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message sent!";
}
?>