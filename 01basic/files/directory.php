<?php
$path = ".";
$result = scandir($path);
$result = array_diff($result, ['.', '..']);
foreach ($result as $file) {
    if (is_file($file)) {
        echo $file . "<br />";
    }
}
echo "<br />";

$result = glob("*.php");
foreach ($result as $file) {
    if (is_file($file)) {
        echo $file . "<br />";
    }
}

if ( !file_exists("myfolder")) {
    mkdir("myfolder");
}

copy("file1.txt", "myfolder/file2.txt");
?>