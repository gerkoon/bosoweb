<?php 
	if(isset($_POST['email'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];

	$email_to = "andoni@alotofus.com";
 
    $email_subject = "message by ". $name . "( ".$email . " ) from bosogroup.net";

    $email_message = "Form details below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "Name: ".clean_string($name)."\n";
 
    $email_message .= "Email: ".clean_string($email)."\n";
 
    $email_message .= "Message: ".clean_string($message)."\n";
    
 
// create email headers
 
$headers = 'From: '.$email."\r\n".
 
'Reply-To: '.$email."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers); 

}

header('Location: ' . $_SERVER['HTTP_REFERER']);

?>