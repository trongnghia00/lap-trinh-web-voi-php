<?php
$arr = [1, 2, 3];

var_dump($arr);
echo "<br />";
print_r($arr);
echo "<br />";

echo $arr[0] . "<br />";
echo $arr[1] . "<br />";
echo $arr[2] . "<br />";

echo "Array Length: " . count($arr) . "<br />";
for ($count = 0; $count < count($arr); $count++) {
    echo $arr[$count] . "<br />";
}

$arr[0] = 5;
$arr[1] = 6;
$arr[2] = 7;
var_dump($arr);
echo "<br />";

$arr[0] = "String";
$arr[1] = true;
$arr[2] = 6.5;
var_dump($arr);
echo "<br />";
?>