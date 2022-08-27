<?php
//Default values of uninitialized variables

//Unset AND unreferenced
var_dump($unset_var); // outputs NULL
//Boolean
echo($unset_bool ? "true\n" : "false\n"); // outputs 'false'
//String
$unset_str .= 'abc';
var_dump($unset_str); // outputs 'string(3) "abc"'
//Integer

$unset_int += 25; // 0 + 25 => 25
var_dump($unset_int); // outputs 'int(25)'
//Float/double
$unset_float += 1.25;
var_dump($unset_float); // outputs 'float(1.25)'
//Array
$unset_arr[3] = "def";
var_dump($unset_arr); //outputs array(1) {[3]=>string(3) "def" }


//Object
$unset_obj->foo = 'bar';
var_dump($unset_obj); // Outputs: object(stdClass)#1 (1) {["foo"]=> string(3) "bar" }
?>