<?
//Similar to the continue statement, a break halts execution of a loop. Unlike a continue statement, however, break
//causes the immediate termination of the loop and does not execute the conditional statement again.
$i = 5;
while(true) {
echo 120/$i.PHP_EOL;
$i -= 1;
if ($i == 0) {
break;
}
}
?>