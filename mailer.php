<?php 
	require('./lib/phpmailer/class.phpmailer.php');
	require('./lib/phpmailer/class.smtp.php');

	$attendeeName = $_POST['name'];
	$attendeeEmail = $_POST['email_address'];
	$attendeeAttendance = $_POST['attending'];
	$attendeeReason = $_POST['reason'];

	// mailer stuff 

	$name = 'Amutha Tom';

	$mail = new PHPMailer();
	$mail -> CharSEt = 'UTF-8';

	$body = $attendeeName.' will be '.$attendeeAttendance?'attending' : 'not attending'.' the wedding because '.$attendeeReason;

	$mail->IsSMTP();
	$mail->Host = 'smtp.gmail.com';

	$mail->SMTPSecure = 'tls';
	$mail->Port = 587;
	$mail->SMTPDebug = 1;
	$mail->SMTPAuth = true;

	$mail->Username = 'amuthatom@gmail.com';
	$mail->Password = 'amuthaandtom';

	$senderEmail = 'amuthatom@gmail.com';

	$mail->SetFrom($senderEmail, $name);
	// $mail->AddReplyTo('no-reply@mycomp.com','no-reply');
	$mail->Subject = 'Wedding Invitation';
	$mail->MsgHTML($body);

	$mail->AddAddress($receipientEmail, $receipientName);
	$mail->AddAddress($senderEmail, $name); 

	// $mail->AddAttachment($fileName);
	$mail->send();
	if(!$mail->Send()) {
		// echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
		
	}
?>