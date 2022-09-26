<?php

$math = 7;
$science = 3;
$english = 10;
$total = $math + $science + $english;

echo "Total Mark: $total for Math($math) + Science($science) + English($english) <br />";

echo "Total Mark: $math + $science + $english for Math($math) + Science($science) + English($english) <br />";
echo "Total Mark: ", ($math + $science + $english), " for Math($math) + Science($science) + English($english) <br />";

$length = 10;
$breath = 20;
$area = $length * $breath;
echo $area . "<br />";

$percent = ($total / 30) *100;
echo "Percentage score: $percent <br />";

$a = 100 % 5;
echo $a . "<br />";
$a = 101 % 5;
echo $a . "<br />";
$a = 102 % 5;
echo $a . "<br />";
$a = 103 % 5;
echo $a . "<br />";

$a = 10;
$b = 20;
$result = ($a ** 2) * ($b ** 2);
echo $result;

?>