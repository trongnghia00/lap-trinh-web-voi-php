<?php
$arr = [];
var_dump($arr);
echo "<br />";

if (empty($arr)) {
    echo "Array is empty. <br />";
}

$arr = 10;
var_dump($arr);
echo "<br />";

$arr = [10];
var_dump($arr);
echo "<br />";

$arr[0] = [10];
var_dump($arr);
echo "<br />";

$arr = [];
$arr[0] = 1;
$arr[2] = "string";
$arr[4] = true;
$arr[10] = 14.5;
var_dump($arr);
echo "<br />";

$arr[] = "new1";
$arr[] = "new2";
var_dump($arr);
echo "<br />";

foreach ($arr as $value) {
    echo $value . "<br/ >";
}
?>