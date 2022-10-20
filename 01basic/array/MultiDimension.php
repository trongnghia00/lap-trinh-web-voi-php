<?php
$arr = [1, 2, 3, 4, 5];

$arr1 = [
    "John" => "johm@gmail.com",
    "Mary" => "mary@gmail.com"
];

// Multi dimension Array
$arr2 = [
    [0, 1, 2, 3, 4, 5],
    [6, 7, 8],
    [9, 10]
];
var_dump($arr2);
echo "<br />";
foreach ($arr2 as $singleArr) {
    var_dump($singleArr);
    echo "<br />";
}

foreach ($arr2 as $singleArr) {
    echo '[ ';
    foreach ($singleArr as $value) {
        echo $value . ", ";
    }
    echo " ]<br />";
}

$arr3 = [
    "emaillist1" => [
        "John1" => "john1@gmail.com",
        "Mary1" => "mary1@gmail.com"
    ],
    "emaillist2" => [
        "John2" => "john2@gmail.com",
        "Mary2" => "mary2@gmail.com"
    ]
];
var_dump($arr3);
echo "<br />";

foreach ($arr3 as $singleArr) {
    echo '[ ';
    foreach ($singleArr as $value) {
        echo $value . ", ";
    }
    echo " ]<br />";
}

foreach ($arr3 as $key => $singleArr) {
    echo "Value for key: $key [ ";
    foreach ($singleArr as $value) {
        echo $value . ", ";
    }
    echo " ]<br />";
}
?>