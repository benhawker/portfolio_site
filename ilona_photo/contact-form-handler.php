<?php 
$errors = '';
$myemail = 'ben.c.hawker@gmail.com';//<-----Put Your email address here.
if(empty($_POST['name'])  || 
   empty($_POST['email']) || 
   empty($_POST['message']))
{
    $errors .= "\n Error: Name, email & message fields are required";
}

$name = $_POST['name']; 
$email_address = $_POST['email']; 
$phone = $_POST['phone'];
$subject = $POST['subject'];
$message = $_POST['message']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "Les Crosets enquiry: $name";
	$email_body = "You have received a new message. ".
	" Here are the details:\n Name: $name \n Email: $email_address \n Phone: $phone \n Subject: $subject \n Message \n $message"; 
	
	$headers = "From: $myemail\n"; 
	$headers .= "Reply-To: $email_address";
	
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: confirm.html');
} 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>Contact form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<p>Sorry but there's been an error. Click <a href="contact.html">here</a> to back to the contact form</p>
<?php
echo nl2br($errors);
?>
<p>Your message:</p>
<?php
echo nl2br($message);
?>
</body>
</html>