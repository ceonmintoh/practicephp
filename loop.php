<?
$list = ['apple', 'banana', 'cherry'];
foreach ($list as $value) {
if ($value == 'banana') {
continue;
}
echo "I love to eat {$value} pie.".PHP_EOL;
}
?>