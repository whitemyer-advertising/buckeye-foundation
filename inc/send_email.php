<?php 
require('class.phpmailer.php');
$mail_common = new PHPMailer();
//if($task == 'email-contact' || $task == 'email-subscribe' || $task == 'email-unsubscribe')
//	{
	$mail_common->From		=$email;
	$mail_common->FromName	=$name;
//	$mail_common->Host		='mail.zoarinteractive.com';
	$mail_common->Host		='email-smtp.us-east-1.amazonaws.com';
	$mail_common->Mailer		="smtp";
	$mail_common->isSMTP();
  
	$mail_common->Body			= $mail_body;
	$mail_common->AltBody			= $mail_body;

	$mail_common->AddAddress ('bobby@whitemyer.com');

//	$mail_common->AddAddress ('bob@whitemyer.com');
//	$mail_common->AddCc		('tim@whitemyer.com');
	$mail_common->AddBcc	('lisa@whitemyer.com');

	$mail_common->Username = 'AKIA5O7OANEVY7VUJDML';
	$mail_common->Password = 'BGofgD3bCPT4abDWUQC+aHDlGIz3/vhiXZjKRZL6uXOQ';

	$mail_common->AddReplyTo ($email, $name);	
	$mail_common->Subject			= 'AWS SMTP Mailer Test';

	
	// Tells PHPMailer to use SMTP authentication
	$mail_common->SMTPAuth = true;

	// Enable TLS encryption over port 587
	$mail_common->SMTPSecure = 'tls';
	$mail_common->Port = 587;

	// Tells PHPMailer to send HTML-formatted email
	$mail_common->isHTML(true);

	if(!$mail_common->Send())
		echo '<br> There has been a mail error. Your email has not gone through. Please try again';

	// Clear all addresses and attachments for next loop
	$mail_common->ClearAddresses();
	$mail_common->ClearAttachments();
?>
  
  
