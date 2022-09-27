<?php
$mark = 10;
$name = "Nghia";

echo $name . "<br />";

$counter = 1;
echo $counter . "<br />";
// $counter = $counter + 1;
$counter += 1;
echo $counter . "<br />";

$fullname = "Trong ";
$fullname .= $name;
echo $fullname . "<br />";

$counter = 10;
$counter -= 5;
echo $counter . "<br />";

$square = 10;
$square *= $square;
echo $square . "<br />";

$val1 = 50;
$val1 /= 2;
echo $val1 . "<br />";

$val2 = 50;
$val2 %= 2;
echo $val2 . "<br />";
echo "<br />";

$counter = 1;
echo $counter++ . "<br />";
echo $counter . "<br />";

$counter = 1;
echo ++$counter . "<br />";
echo $counter . "<br />";

$counter = 1;
echo $counter-- . "<br />";
echo $counter . "<br />";

$counter = 1;
echo --$counter . "<br />";
echo $counter . "<br />";
?>