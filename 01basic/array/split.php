<?php
$students = "Nghia, Trong, Dinh, Nguyen";
$stuArr = explode(", ", $students);
var_dump($stuArr);
echo "<br />";
$stuList = implode(", ", $stuArr);
echo $stuList . "<br />";

$stuArr = explode(", ", $students, 2);
var_dump($stuArr);
echo "<br />";
?>