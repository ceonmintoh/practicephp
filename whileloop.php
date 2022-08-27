<?
$i = true;
$sum = 0;
while ($i) {
if ($sum === 100) {
$i = false;
} else {
$sum += 10;
}
}
echo 'The sum is: ', $sum;
?>