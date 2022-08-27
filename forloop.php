<?
$for ($i = 0; $i <= 9; $i++) {
    echo $i, ',';
    }
    # Example 2
    for ($i = 0; ; $i++) {
    if ($i > 9) {
    break;
    }
    echo $i, ',';
    }
    # Example 3
    $i = 0;
    for (; ; ) {
    if ($i > 9) {
    break;
    }
    echo $i, ',';
    $i++;
    }
    # Example 4
    for ($i = 0, $j = 0; $i <= 9; $j += $i, print $i. ',', $i++);
?>