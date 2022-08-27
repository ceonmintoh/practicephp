<?php
$amount_of_log_calls = 0;
function log_message($message) {
// Accessing global variable from function scope
// requires this explicit statement
global $amount_of_log_calls;
// This change to the global variable is permanent
$amount_of_log_calls += 1;
echo $message;
}
// When in the global scope, regular global variables can be used
// without explicitly stating 'global $variable;'
echo $amount_of_log_calls; // 0
log_message("First log message!");
echo $amount_of_log_calls; // 1
log_message("Second log message!");

?>

