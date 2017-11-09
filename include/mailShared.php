<?php 
require_once('mailer/class.phpmailer.php');
require_once('mailer/PHPMailerAutoload.php');

	    $email_tujuan	 = "$_POST['email'];";

$mail             = new PHPMailer();
$body             = '<center><h3>File : '$row['files'].['name']'</h3></center>';
$body             = eregi_replace("[\]",'',$body);					

$mail->IsSMTP(); // telling the class to use SMTP
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
$mail->Host       = "smtp.email.com";      // sets Email as the SMTP server
$mail->Port       = 587;                  	  // set the SMTP port for the GMAIL server
$mail->Username   = "$email";  // Email username
$mail->Password   = "$password";          		     // Email password

$mail->SetFrom('$email', '$display_name');

$mail->Subject    = "File Share";

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