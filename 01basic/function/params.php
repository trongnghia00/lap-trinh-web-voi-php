<?php
function getEvenNumbers($limit, $skip = 0) : array {
    $retArr = [];
    for ($i = 0; $i <= $limit; $i++) {
        if ($i == $skip) {
            continue;
        }
        if ($i%2==0) {
            $retArr[] = $i;
        }
    }
    return $retArr;
}

$evenNums = getEvenNumbers(10);
print_r($evenNums);
echo "<br /><br />";

$result = 0;
function add($a, $b, &$result) {
    $result = $a + $b;
}
add(1, 2, $result); 
echo $result . "<br />";
?>