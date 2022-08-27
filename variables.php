<?php
$variableName = 'foo';
$foo = 'bar';
// The following are all equivalent, and all output "bar":
echo $foo;
echo ${$variableName};
echo $$variableName;
//similarly,
$variableName = 'foo';
$$variableName = 'bar';
// The following statements will also output 'bar'
echo $foo;
echo $$variableName;
echo ${$variableName};
//Variable variables are useful for mapping function/method calls:
function add($a, $b) {
return $a + $b;
}
$funcName = 'add';
echo $funcName(1, 2); // outputs 3


//global variables
function foo() {
    global $bob;
    $bob->doSomething();
    }


    

?>