<?php 
	require_once 'swiftmailer/lib/swift_required.php';

	// Create the Transport
	function maxMailNotification($subject,$sms,$receiver){	
		if (!isset($receiver)) {
				# code...
			}	
		$transport = Swift_SmtpTransport::newInstance('mail.maxrailwaytrack.com', 25)
		  ->setUsername('zulkerv8')
		  ->setPassword('eaz2|Xr4Arcb')
		  ;

		/*
		You could alternatively use a different transport such as Sendmail or Mail:

		// Sendmail
		$transport = Swift_SendmailTransport::newInstance('/usr/sbin/sendmail -bs');

		// Mail
		$transport = Swift_MailTransport::newInstance();
		*/

		// Create the Mailer using your created Transport
		$mailer = Swift_Mailer::newInstance($transport);
		$sender = 'info@maxrailwaytrack.com';
		$senderName = 'Max Group';
		$cc = 'billah22@gmail.com';
		$ccName = 'Fahad';
		
		// Create a message
		$message = Swift_Message::newInstance($subject)
		  ->setFrom(array($sender => $senderName))
		  ->setTo(array($receiver, $cc => $ccName))
		  ->setBody($sms)
		  ;

		// Send the message
		$result = $mailer->send($message);
		echo "<span class='label label-success'>Email notification send.</span> ";  
	}
?>