<?php
$value = 1;
do {
    echo "$value <br />";
    if ($value >= 10){
        break;
    }
    $value++;
} while (true);

echo "<br /><br />";
$value1 = 1;
$value2 = 1;

do {
    while (true) {
        if ($value2 >= 4){
            break;
        }
        echo "Value2: $value2 <br />";
        $value2++;
    }

    if ($value1 >= 5){
        break;
    }
    echo "Value1: $value1 <br />";
    $value1++;
} while (true);
echo "<br /><br />";
// continue
$value = 0;
while (true) {
    $value++;
    if ($value%2 == 1) {
        continue;
    }

    if ($value > 10){
        break;
    }
    echo "Value: $value <br />";
}
?>