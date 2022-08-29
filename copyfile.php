<?
if (copy('test.txt', 'dest.txt')) {
    echo 'File has been copied successfully';
    } else {
    echo 'Failed to copy file to destination given.';
}
?>