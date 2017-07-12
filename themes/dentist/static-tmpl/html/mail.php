<?php

require_once "phpmailer/PHPMailerAutoload.php";

$mail = new PHPMailer;

//email information
$senderEmail = "ENTER SENDER EMAIL HERE";
$senderName = "ENTER SENDER NAME HERE";
$recipientEmail = "ENTER RECIPIENT EMAIL HERE";
$recipienteName = "ENTER RECIPIENT NAME HERE";

$subject = "Dentologist Book an Appointment Form Inquiry";

if(isset($_POST['btnSubmit']))
{
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'];

	$html = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Dentologist</title>
</head>
<body>
<table style="width:100%; font-family: Arial;" cellpadding="0" cellspacing="0">
  <thead style="background-color: #3498db;">
    <tr>
      <th style="padding: 10px;"><img src="http://placehold.it/300x75" style="vertical-align: middle;"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td style="padding: 10px; border: 1px solid #3498db; background: #E5E5E5;"><strong>First Name</strong></td>
    </tr>
    <tr>
      <td style="padding: 10px; border: 1px solid #3498db;">' . $firstName . '</td>    	
    </tr>
    <tr>
      <td style="padding: 10px; border: 1px solid #3498db; background: #E5E5E5;"><strong>Last Name</strong></td>
    </tr>
    <tr>
      <td style="padding: 10px; border: 1px solid #3498db;">' . $lastName . '</td>    	
    </tr>
    <tr>
      <td style="padding: 10px; border: 1px solid #3498db; background: #E5E5E5;"><strong>Phone Number</strong></td>
    </tr>
    <tr>
      <td style="padding: 10px; border: 1px solid #3498db;">' . $phone . '</td>    	
    </tr>
    <tr>
      <td style="padding: 10px; border: 1px solid #3498db; background: #E5E5E5;"><strong>Email</strong></td>
    </tr>
    <tr>
      <td style="padding: 10px; border: 1px solid #3498db;">' . $email . '</td>    	
    </tr>
    <tr>
      <td style="padding: 10px; border: 1px solid #3498db; background: #E5E5E5;"><strong>Question/Comments</strong></td>
    </tr>
    <tr>
      <td style="padding: 10px; border: 1px solid #3498db;">' . $message . '</td>    	
    </tr>
  </tbody>
</table>
</body>
</html>';

$mail->setFrom($senderEmail, $senderName);
$mail->addAddress($recipientEmail, $recipienteName);
$mail->Subject = $subject;
$mail->msgHTML($html);
}

if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    header("Location: thankyou.html");
}
?>