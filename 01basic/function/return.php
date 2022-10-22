<?php
function add($a, $b) : int {
    $result = $a + $b;
    return $result;
}

echo "Result: " . add(2, 3) . "<br />";

function getEvenNumbers($limit) : array {
    $retArr = [];
    for ($i = 0; $i <= $limit; $i++) {
        if ($i%2==0) {
            $retArr[] = $i;
        }
    }
    return $retArr;
}

$evenNums = getEvenNumbers(10);
print_r($evenNums);
?>