<?php
		if(isset($_POST['send'])) {
			require 'PHPMailerAutoload.php';
			require 'config.php';

			$mail = new PHPMailer;

			// $mail->SMTPDebug = 4;                               // Enable verbose debug output

			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = EMAIL;                 // SMTP username
			$mail->Password = PASS;                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to

			$mail->setFrom(EMAIL, 'website data');
			$mail->addAddress('rithvik.kammili@gmail.com');     // Add a recipient

			$mail->addReplyTo(EMAIL);
			// print_r($_FILES['file']); exit;
		   // Optional name

			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject ='Website data';


			$mail->Body    =  "name: ".$_POST['Name']."<br/>email: ".$_POST['Email']."<br/>MoblileNumber: ".$_POST['no']."<br/>message: ".$_POST['Message'];
			$mail->AltBody = 'this is only for admins';

			if(!$mail->send()) {
			    echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
			    echo 'Your Query Has Been successful Submitted';
			}
		}
	 ?>
