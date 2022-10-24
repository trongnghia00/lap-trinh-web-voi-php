<?php
// Read txt file
$filename = "file1.txt";
$content = file_get_contents($filename);
echo $content . "<br />";
echo "<br />";

//2
$fileHandler = fopen($filename, "r");
$fileSize = filesize($filename);
$content = fread($fileHandler, $fileSize);
fclose($fileHandler);
echo $content . "<br />";
echo "<br />";

// Write txt file
$filename = "newfile.txt";
$fileHandler = fopen($filename, "w+") or die("Unable to write the file");
fwrite($fileHandler, "Line 1. \n");
fwrite($fileHandler, "Line 2. \n");
fclose($fileHandler);

// Read ini file
$setting = parse_ini_file("config.ini");
print_r($setting);
echo "<br />";
foreach ($setting as $key => $value) {
    echo "$key => $value <br />";
}
echo "<br />";

// Read csv file
$filename = "people.csv";
$content = file_get_contents($filename);
var_dump(str_getcsv($content));
echo "<br />";

$csvfile = file($filename);
foreach ($csvfile as $line) {
    $data[] = str_getcsv($line);
}
print_r($data);
echo "<br /><br />";

$csv = array_map('str_getcsv', file($filename));
print_r($csv);
?>