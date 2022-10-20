<?php
// Indexed array
$arr = [ 5, 2, 4, 3, 1, 0];
foreach ($arr as $val) {
    echo "$val ";
}
echo "<br />";
sort($arr);
foreach ($arr as $val) {
    echo "$val ";
}
echo "<br />";
rsort($arr);
foreach ($arr as $val) {
    echo "$val ";
}
echo "<br />";
echo "<br />";

// Associative Array
$arr = [
    "3" => "Nghia",
    "1" => "Trong",
    "2" => "Dinh"
];
foreach ($arr as $key => $val) {
    echo "$key => $val, ";
}
echo "<br />";
asort($arr);
foreach ($arr as $key => $val) {
    echo "$key => $val, ";
}
echo "<br />";
arsort($arr);
foreach ($arr as $key => $val) {
    echo "$key => $val, ";
}
echo "<br />";

ksort($arr);
foreach ($arr as $key => $val) {
    echo "$key => $val, ";
}
echo "<br />";
krsort($arr);
foreach ($arr as $key => $val) {
    echo "$key => $val, ";
}
echo "<br />";
?>