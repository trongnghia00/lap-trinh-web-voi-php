<?php
header("Content-Type: text/plain");
$name1 = "Nghia";
$name2 = 'Trong';
echo "$name1 and $name2" . "\n";
echo '$name1 and $name2' . "\n";

$name4 = "This is a \"Special\" String";
echo $name4 . "\n";

$name5 = "\t\tThis is a \"Special\" String";
echo $name5 . "\n";

$name5 = "\T\h\i\s is a \"Special\" String";
echo $name5 . "\n";

$name5 = "\t\h\i\s is a \"Special\" String";
echo $name5 . "\n";

$name5 = '\t\h\i\s is a \"Special\" String';
echo $name5 . "\n";

echo strlen($name5);
?>