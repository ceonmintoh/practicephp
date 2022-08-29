An basic way to check for the errors, is as follows:
<?php
$fileError = $_FILES["FILE_NAME"]["error"]; // where FILE_NAME is the name attribute of the file input in your form
switch($fileError) {
    case UPLOAD_ERR_INI_SIZE:// Exceeds max size in php.ini
    break;
    case UPLOAD_ERR_PARTIAL:
    // Exceeds max size in html form
    break;
    case UPLOAD_ERR_NO_FILE:
    // No file was uploaded
    break;
    case UPLOAD_ERR_NO_TMP_DIR:
    // No /tmp dir to write to
    break;
    case UPLOAD_ERR_CANT_WRITE:
    // Error writing to disk
    break;
    default:
    // No error was faced! Phew!
    break;
}