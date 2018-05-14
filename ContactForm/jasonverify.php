  <?php
  require_once('recaptchalib.php');
  $privatekey = "6Le7CsASAAAAADRD8AJlnHjbaYs-qqKxpPijnslZ ";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) {
    
    die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
         "(reCAPTCHA said: " . $resp->error . ")");
  } else {
    
  }
  ?>


<?php

/* Subject and Email Variables */

	$emailSubject = 'Contact About KilkarneyBanquets.com';
	$webMaster = 'jfrelich31@gmail.com';
	
/* Gathering Data Variables */

	$typeField = $_POST['Type'];
	$guestField = $_POST['Guests'];
	$emailField = $_POST['Email'];
	$nameField = $_POST['Name'];
	$phonenumberField = $_POST['PhoneNumber'];
	$howField = $_POST['How'];
	$EventField = $_POST['EventDate'];
	$commentsField = $_POST['Comments'];
	
	$body = <<<EOD
Event Type: $typeField <br>
Number of Guests: $guestField <br>
Email: $emailField <br>
Name: $nameField <br>
Phone Number: $phonenumberField <br>
How did you hear about us: $howField <br>
Event Date: $EventField <br>
Comments: $commentsField <br>
EOD;

	$headers = "From: $emailField \r\n";
	$headers .= "Content-type: text/html\r\n";
	$success = mail($webMaster, $emailSubject, $body, $headers);
	
/* Results rendered as HTML */

	$theResults = <<<EOD
<html>
<head>
<title>Kilkarney Banquets</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	background-color: #f1f1f1;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-style: normal;
	line-height: normal;
	font-weight: normal;
	color: #666666;
	text-decoration: none;
}
-->
</style>
</head>

<div>
  <div align="left">Thank you for your interest! Your email will be answered very soon!</div>
</div>
</body>
</html>
EOD;
echo "$theResults";


?>