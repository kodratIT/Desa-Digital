<?php
	//Set to "mailchimp" or "file"
	$STORE_MODE = "mailchimp"; //mailchimp, file (saved to address.txt)
	
	//MailChimp API Key findable in your Mailchimp's dashboard
	$API_KEY =  "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-XX0";
				 
	//MailChimp List ID  findable in your Mailchimp's dashboard
	$LIST_ID =  "XXXXXXXXXX";
				 
	//Write .txt file path to save the emails of the subscribers
	$STORE_FILE = "address.txt";
	
	//MailChimp class
	require('mailchimp.php');
	
	//For the part below, no interventions are required
	if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["email"])) {
		$email = $_POST["email"];
		
		header('HTTP/1.1 200 OK');
		header('Status: 200 OK');
		header('Content-type: application/json');
	
		//Checking if the email writing is good
		if(filter_var($email, FILTER_VALIDATE_EMAIL)) {			
			//The part for the storage in a .txt
			if ($STORE_MODE == "file") {				
				//SUCCESS SENDING
				if(file_put_contents($STORE_FILE, strtolower($email)."\r\n", FILE_APPEND | LOCK_EX)) {
					echo json_encode(array(
							"status" => "success"
						 ));
				//ERROR SENDING
				} else {
					echo json_encode(array(
							"status" => "error",
							"type" => "FileAccessError"
						 ));
				}			
			//The part for the storage in Mailchimp
			} elseif ($STORE_MODE == "mailchimp") {	
                $MailChimp = new \DrewM\MailChimp\MailChimp($API_KEY);
				
				$result = $MailChimp->post('lists/'.$LIST_ID.'/members', array(
							'email_address'  => $email,
							'status'         => 'subscribed'
						  ));     
		
				//SUCCESS SENDING
				if ($MailChimp->success()) {   	
					echo json_encode(array(
							"status" => "success"
						 ));
				//ERROR SENDING
				} else {
					echo json_encode(array(
							"status" => "error",
							"type" => $MailChimp->getLastError()
						 ));
				}
			//ERROR
			} else {
				echo json_encode(array(
						"status" => "error",
					 ));
			}
		//ERROR DURING THE VALIDATION 
		} else {
			echo json_encode(array(
					"status" => "error",
					"type" => "ValidationError"
				 ));
		}
	} else {
		header('HTTP/1.1 403 Forbidden');
		header('Status: 403 Forbidden');
	}
?>