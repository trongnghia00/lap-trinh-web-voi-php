<?php
for ($value = 1; $value <= 10; $value++) {
    if ($value%2 == 1) {
        echo 'Odd Number: ' . $value . '<br />';
    }
}

echo '<br />';
$value = 1;
while ($value <= 10) {
    if ($value%2 == 1) {
        echo 'Odd Number: ' . $value . '<br />';
    }
    $value++;
}

echo '<br />';
$value = 1;
do {
    if ($value%2 == 1) {
        echo 'Odd Number: ' . $value . '<br />';
    }
    $value++;
} while ($value <= 10);
?>