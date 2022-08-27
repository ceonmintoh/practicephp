<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
<form method="POST" enctype="multipart/form-data">
<input type="file" name="myVar" />
<input type="submit" name="Submit" />
</form>
<form method="POST">
        <input type="text" name="myVar" value="myVal" />
        <input type="submit" name="submit" value="Submit" />
    </form>

    
    echo $_POST["myVar"]); // returns "myVal"

    // ensure there isn't an error
if ($_FILES["myVar"]["error"] == UPLOAD_ERR_OK)
{
$folderLocation = "myFiles"; // a relative path. (could be "path/to/file" for example)
// if the folder doesn't exist then make it
if (!file_exists($folderLocation)) mkdir($folderLocation);
// move the file into the folder
move_uploaded_file($_FILES["myVar"]["tmp_name"], "$folderLocation/" .
basename($_FILES["myVar"]["name"]));
}

$total = isset($_FILES["myVar"]) ? count($_FILES["myVar"]["name"]) : 0; // count how many files
were sent
// iterate over each of the files
for ($i = 0; $i < $total; $i++)
{
// there isn't an error
if ($_FILES["myVar"]["error"][$i] == UPLOAD_ERR_OK)
{
$folderLocation = "myFiles"; // a relative path. (could be "path/to/file" for example)
// if the folder doesn't exist then make it
if (!file_exists($folderLocation)) mkdir($folderLocation);
// move the file into the folder
move_uploaded_file($_FILES["myVar"]["tmp_name"][$i], "$folderLocation/" .
basename($_FILES["myVar"]["name"][$i]));
}
// else report the error
else switch ($_FILES["myVar"]["error"][$i])
{
case UPLOAD_ERR_INI_SIZE:
echo "Value: 1; The uploaded file exceeds the upload_max_filesize directive in
php.ini.";
break;
case UPLOAD_ERR_FORM_SIZE:
echo "Value: 2; The uploaded file exceeds the MAX_FILE_SIZE directive that was
specified in the HTML form.";
break;
case UPLOAD_ERR_PARTIAL:
echo "Value: 3; The uploaded file was only partially uploaded.";
break;
case UPLOAD_ERR_NO_FILE:
echo "Value: 4; No file was uploaded.";
break;
case UPLOAD_ERR_NO_TMP_DIR:
echo "Value: 6; Missing a temporary folder. Introduced in PHP 5.0.3.";
break;
case UPLOAD_ERR_CANT_WRITE:
echo "Value: 7; Failed to write file to disk. Introduced in PHP 5.1.0.";
break;
case UPLOAD_ERR_EXTENSION:
echo "Value: 8; A PHP extension stopped the file upload. PHP does not provide a way to
ascertain which extension caused the file upload to stop; examining the list of loaded extensions
with phpinfo() may help. Introduced in PHP 5.2.0.";
break;
default:
echo "An unknown error has occurred.";
break;
}
}
?>
</body>
</html>
