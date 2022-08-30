<?
//Encryption
$method = "aes-256-cbc"; // cipher method
$iv_length = openssl_cipher_iv_length($method); // obtain required IV length
$strong = false; // set to false for next line
$iv = openssl_random_pseudo_bytes($iv_length, $strong); // generate initialization vector
/* NOTE: The IV needs to be retrieved later, so store it in a database.
However, do not reuse the same IV to encrypt the data again. */
if(!$strong) { // throw exception if the IV is not cryptographically strong
throw new Exception("IV not cryptographically strong!");
}
$data = "This is a message to be secured."; // Our secret message
$pass = "Stack0verfl0w"; // Our password
/* NOTE: Password should be submitted through POST over an HTTPS session.
Here, it's being stored in a variable for demonstration purposes. */
$enc_data = openssl_encrypt($data, $method, $password, true, $iv); // Encrypt
//Decryption
/* Retrieve the IV from the database and the password from a POST request */
$dec_data = openssl_decrypt($enc_data, $method, $pass, true, $iv); // Decrypt
?>