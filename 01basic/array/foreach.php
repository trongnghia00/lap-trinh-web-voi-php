<?php
$arr = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
var_dump($arr);
echo "<br />";

foreach ($arr as $value) {
    echo $value . "<br />";
}

$count = 0;
foreach ($arr as $value) {
    echo "[$count] => $value <br />";
    $count++;
}
?>