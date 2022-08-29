//Sending Email With An Attachment Using mail()
<?php
$to = 'recipient@example.com';
$subject = 'Email Subject';
$message = 'This is the email message body';
$attachment = '/path/to/your/file.pdf';
$content = file_get_contents($attachment);
/* Attachment content transferred in Base64 encoding
MUST be split into chunks 76 characters in length as
specified by RFC 2045 section 6.8. By default, the
function chunk_split() uses a chunk length of 76 with
a trailing CRLF (\r\n). The 76 character requirement
does not include the carriage return and line feed */
$content = chunk_split(base64_encode($content));
/* Boundaries delimit multipart entities. As stated
in RFC 2046 section 5.1, the boundary MUST NOT occur
in any encapsulated part. Therefore, it should be
unique. As stated in the following section 5.1.1, a
boundary is defined as a line consisting of two hyphens
("--"), a parameter value, optional linear whitespace,
and a terminating CRLF. */
$prefix = "part_"; // This is an optional prefix
/* Generate a unique boundary parameter value with our
prefix using the uniqid() function. The second parameter
makes the parameter value more unique. */
$boundary = uniqid($prefix, true);
// headers
$headers = implode("\r\n", [
'From: webmaster@example.com',
'Reply-To: webmaster@example.com',
'X-Mailer: PHP/' . PHP_VERSION,
'MIME-Version: 1.0',
// boundary parameter required, must be enclosed by quotes
'Content-Type: multipart/mixed; boundary="' . $boundary . '"',
"Content-Transfer-Encoding: 7bit",
"This is a MIME encoded message." // message for restricted transports
]);

// message and attachment
$message = implode("\r\n", [
"--" . $boundary, // header boundary delimiter line
'Content-Type: text/plain; charset="iso-8859-1"',
"Content-Transfer-Encoding: 8bit",
$message, "--" . $boundary, // content boundary delimiter line
'Content-Type: application/octet-stream; name="RenamedFile.pdf"',
"Content-Transfer-Encoding: base64",
"Content-Disposition: attachment",
$content, "--" . $boundary . "--" // closing boundary delimiter line
]);
$result = mail($to, $subject, $message, $headers); // send the email
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