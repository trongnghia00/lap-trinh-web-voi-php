<?php

$status = (empty($user)) ? "not logged in" : "logged in";
echo $status . "<br />";

$user = "Nghia";
$status = (empty($user)) ? "not logged in" : "logged in";
echo $status . "<br />";

echo $color = $color ?? "red";
echo "<br />";
// Toán tử so sánh
$x = 100;
$y = "100";
var_dump($x == $y);
echo "<br />";
var_dump($x === $y);
echo "<br />";

var_dump($x != $y);
echo "<br />";
var_dump($x <> $y);
echo "<br />";
var_dump($x !== $y);
echo "<br />";

$x = 100;
$y = 50;
var_dump($x > $y);
echo "<br />";
var_dump($x < $y);
echo "<br />";

$x = 50;
$y = 50;
var_dump($x >= $y);
echo "<br />";
var_dump($x <= $y);
echo "<br />";
?>