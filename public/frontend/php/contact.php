<?php
	if(!$_POST) exit;
	
	//PHP Mailer
    use phpmailer\PHPMailer\PHPMailer;
	//use phpmailer\PHPMailer\SMTP;
	use phpmailer\PHPMailer\Exception;

    require_once(dirname(dirname(__FILE__))."/assets/library/phpmailer/src/Exception.php");
	require_once(dirname(dirname(__FILE__))."/assets/library/phpmailer/src/PHPMailer.php");
	require_once(dirname(dirname(__FILE__))."/assets/library/phpmailer/src/SMTP.php");

	///////////////////////////////////////////////////////////////////////////

		//Enter name & email address that you want to emails to be sent to.
		
		$toName = "Naxos";
		$toAddress = "email@sitename.com";
		
	///////////////////////////////////////////////////////////////////////////
	
	//Only edit below this line if either instructed to do so by the author or have extensive PHP knowledge.
	
	//Form Fields
	$name = trim($_POST["name"]);
	$email = trim($_POST["email"]);
	$subject = trim($_POST["subject"]);
	$message = trim($_POST["message"]);
	
	//Check for empty fields
	if (empty($name) or empty($subject) or empty($message)) {
		echo json_encode(array("status" => "error"));
	} else if (empty($email) or !filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo json_encode(array("status" => "email"));
	} else {		
		//Send message via E-mail
		$body = "<p>You have been contacted by <b>".$name."</b>. The message is as follows.</p>
						<p>----------</p>
						<p>".preg_replace("/[\r\n]/i", "<br />", $message)."</p>
						<p>----------</p>
						<p>
							E-mail Address: <a href=\"mailto:".$email."\">".$email."</a>
						</p>";
		
		$objMail = new PHPMailer();
		
		//Use this line if you want to use PHP mail() function
		$objMail->isMail();
		
		//Use the codes below if you want to use SMTP mail
		/*			
		$objMail->isSMTP();
		$objMail->SMTPAuth = true;
		$objMail->Host = "mail.yourdomain.com";
		$objMail->Port = 587;	//You can remove that line if you don't need to set the SMTP port
		$objMail->Username = "example@yourdomain.com";
		$objMail->Password = "email_address_password";
		*/
		
		$objMail->setFrom($email, $name);
		$objMail->addAddress($toAddress, $toName);		
		$objMail->Subject = $subject;
		$objMail->msgHTML($body);
		
		if($objMail->send()) {
			echo json_encode(array("status" => "ok"));
		} else {
			echo json_encode(array("status" => "error"));
		}
	}
?>