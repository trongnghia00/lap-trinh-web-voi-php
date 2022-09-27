<?php

$value1 = true;
$value2 = false;

$result1 = $value1 and $value2;
$result2 = $value1 && $value2;
var_dump($result1);
echo "<br />";
var_dump($result2);
echo "<br />";
echo "<br />";

$value1 = true;
$value2 = false;
$result1 = ($value1 or $value2);
$result2 = $value1 || $value2;

var_dump($result1);
echo "<br />";
var_dump($result2);
echo "<br />";
echo "<br />";

$value1 = false;
$value2 = false;
$result1 = ($value1 xor $value2);
var_dump($result1);
echo "<br />";
echo "<br />";

$value1 = false;
$result1 = !$value1;
var_dump($result1);
echo "<br />";
?>