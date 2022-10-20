<?php
$arr = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];

$arr = [2 => 'Mon', 3 => 'Tue', 4 => 'Wed', 5 => 'Thu', 6 => 'Fri', 7 => 'Sat', 8 => 'Sun'];
var_dump($arr);
echo "<br />";

foreach ($arr as $value) {
    echo $value . "<br />";
}

foreach ($arr as $key => $value) {
    echo "$key => $value" . "<br />";
}

foreach (array_keys($arr) as $key) {
    echo $key . "<br />";
}

var_dump(array_keys($arr));
echo "<br />";

$userEmails = [
    "John" => "john@gmail.com",
    "Jenn" => "jenn@gmail.com",
    "Mary" => "mary@gmail.com"
];
var_dump($userEmails);
echo "<br />";
echo $userEmails["John"] . "<br />";

$userEmails[] = ["Jane" => "jane@gmail.com"];
var_dump($userEmails);
echo "<br />";
echo $userEmails["Jane"] . "<br />";

$userEmails = [
    "John" => "john@gmail.com",
    "Jenn" => "jenn@gmail.com",
    "Mary" => "mary@gmail.com"
];

$userEmails["Jane"] = "jane@gmail.com";
var_dump($userEmails);
echo "<br />";

unset($userEmails["Jane"]);
var_dump($userEmails);
echo "<br />";

unset($userEmails["John"]);
var_dump($userEmails);
echo "<br />";
?>