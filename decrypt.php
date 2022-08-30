<?
//Decrypt Files
//To decrypt files that have been encrypted with the above function you can use this function.
/**
* Dencrypt the passed file and saves the result in a new file, removing the
* last 4 characters from file name.
*
* @param string $source Path to file that should be decrypted
* @param string $key
The key used for the decryption (must be the same as for encryption)
* @param string $dest
File name where the decryped file should be written to.
* @return string|false Returns the file name that has been created or FALSE if an error occurred
*/
function decryptFile($source, $key, $dest)
{
$key = substr(sha1($key, true), 0, 16);
$error = false;
if ($fpOut = fopen($dest, 'w')) {
if ($fpIn = fopen($source, 'rb')) {
// Get the initialzation vector from the beginning of the file
$iv = fread($fpIn, 16);
while (!feof($fpIn)) {
$ciphertext = fread($fpIn, 16 * (FILE_ENCRYPTION_BLOCKS + 1)); // we have to read one block more for decrypting than for encrypting
$plaintext = openssl_decrypt($ciphertext, 'AES-128-CBC', $key, OPENSSL_RAW_DATA,
$iv);
// Use the first 16 bytes of the ciphertext as the next initialization vector
$iv = substr($ciphertext, 0, 16);
fwrite($fpOut, $plaintext);
}
fclose($fpIn);
} else {
$error = true;
}
fclose($fpOut);
} else {
$error = true;
}
return $error ? false : $dest;
}
?>