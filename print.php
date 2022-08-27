<?

//printf will output a formatted string using placeholders
//sprintf will return the formatted string

$name = 'Jeff';
// The `%s` tells PHP to expect a string
//↓ `%s` is replaced by ↓
printf("Hello %s, How's it going?", $name);
#> Hello Jeff, How's it going?
// Instead of outputting it directly, place it into a variable ($greeting)
$greeting = sprintf("Hello %s, How's it going?", $name);
echo $greeting;
#> Hello Jeff, How's it going?

$money = 25.2;
printf('%01.2f', $money);
#> 25.20

foreach ([1, 2, 3, 4, 5, 6, 9, 12] as $p) {
    $i = pow(1024, $p);
    printf("pow(1024, %d) > (%7s) %20s %38.0F", $p, gettype($i), $i, $i);

    echo " ", $i, "\n";
}

?>