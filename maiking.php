<?
/*Sending mail in PHP can be as simple as calling the built-in function mail(). mail() takes up to five parameters but
the first three are all that is required to send an email (although the four parameters is commonly used as will be
demonstrated below)*/

//A minimal example would resemble the following code:
mail('recipient@example.com', 'Email Subject', 'This is the email message body');

//Additionally, mail() accepts a fourth parameter which allows you to have additional mail headers sent with your email.

$to = 'recipient@example.com'; // Could also be $to = $_POST['recipient'];
$subject = 'Email Subject'; // Could also be $subject = $_POST['subject'];
$message = 'This is the email message body'; // Could also be $message = $_POST['message'];
$headers = implode("\r\n", [
'From: John Conde <webmaster@example.com>',
'Reply-To: webmaster@example.com',
'X-Mailer: PHP/' . PHP_VERSION
]);

//The optional fifth parameter can be used to pass additional flags as command line options to the program
//configured to be used when sending mail, as defined by the sendmail_path configuration setting.

$fifth = '-fno-reply@example.com';

//Although using mail() can be pretty reliable, it is by no means guaranteed that an email will be sent when mail() is called.

$result = mail($to, $subject, $message, $headers, $fifth);

$to = 'recipient@example.com';
$subject = 'Email Subject';
$message = '<html><body>This is the email message body</body></html>';
$headers = implode("\r\n", [
'From: John Conde <webmaster@example.com>',
'Reply-To: webmaster@example.com',
'MIME-Version: 1.0',
'Content-Type: text/html; charset=ISO-8859-1',
'X-Mailer: PHP/' . PHP_VERSION
]);
?>