Here's a full example of using PHP's mail() function
<?php
// Debugging tools. Only turn these on in your development environment.
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");
// Special mail settings that can make mail less likely to be considered spam
// and offers logging in case of technical difficulties.
ini_set("mail.log", "/tmp/mail.log");
ini_set("mail.add_x_header", TRUE);
// The components of our email
$to = 'recipient@example.com';
$subject = 'Email Subject';
$message = 'This is the email message body';
$headers = implode("\r\n", [
'From: webmaster@example.com',
'Reply-To: webmaster@example.com',
'X-Mailer: PHP/' . PHP_VERSION
]);
// Send the email

$result = mail($to, $subject, $message, $headers);
// Check the results and react accordingly
if ($result) {
// Success! Redirect to a thank you page. Use the
// POST/REDIRECT/GET pattern to prevent form resubmissions
// when a user refreshes the page.
header('Location: http://example.com/path/to/thank-you.php', true, 303);
exit;
}
else {
// Your mail was not sent. Check your logs to see if
// the reason was reported there for you.
}