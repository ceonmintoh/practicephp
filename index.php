<?
A string containing several parts of text that are separated by a common character can be split into parts with the
explode function.
$fruits = "apple,pear,grapefruit,cherry";
print_r(explode(",",$fruits)); // ['apple', 'pear', 'grapefruit', 'cherry']
The method also supports a limit parameter that can be used as follow:
$fruits= 'apple,pear,grapefruit,cherry';
If the limit parameter is zero, then this is treated as 1.
print_r(explode(',',$fruits,0)); // ['apple,pear,grapefruit,cherry']
If limit is set and positive, the returned array will contain a maximum of limit elements with the last element
containing the rest of string.
print_r(explode(',',$fruits,2)); // ['apple', 'pear,grapefruit,cherry']
If the limit parameter is negative, all components except the last -limit are returned.
print_r(explode(',',$fruits,-1)); // ['apple', 'pear', 'grapefruit']
explode can be combined with list to parse a string into variables in one line:
$email = "user@example.com";
list($name, $domain) = explode("@", $email);
?>