<?php
	// site owner
	$to = trim( $_POST['to'] );
	$subject = trim( $_POST['subject'] );
	
	
	// contact form fields
	$name = trim( $_POST['name'] );
	$email = trim( $_POST['email'] );
	$message = trim( $_POST['message'] );
	
	
	$error = false;
	
	if ( $name === "" )
	{
		$error = true;
	}
	elseif ( $email === "" )
	{
		$error = true;
	}
	elseif ( $message === "" )
	{
		$error = true;
	}
	// end if
	
	
	if ( ! $error )
	{
		$body = "Name: $name \n\nEmail: $email \n\nMessage: $message";
		
		$headers = 'From: ' . $name . ' <' . $email . '> ' . "\r\n" . 'Reply-To: ' . $email;
		
		mail( $to, $subject, $body, $headers );
		
		echo 'success';
	}
	else
	{
		echo 'error';
	}
	// end if
?>