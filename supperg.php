//Superglobal variables are defined by PHP and can always be used from anywhere without the global keyword.
<?php
function getPostValue($key, $default = NULL) {
// $_POST is a superglobal and can be used without
// having to specify 'global $_POST;'
if (isset($_POST[$key])) {
return $_POST[$key];
}
return $default;
}
// retrieves $_POST['username']
echo getPostValue('username');
// retrieves $_POST['email'] and defaults to empty string
echo getPostValue('email', '');

?>