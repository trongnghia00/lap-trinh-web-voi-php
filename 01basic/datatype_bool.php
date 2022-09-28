<?php
$b1 = True;
$b2 = false;

echo "True: " . $b1 . "<br />";
echo "False: " . $b2 . "<br />";

// string
$loggedin = true;
$username = "Nghia";

echo ( $loggedin && $username ) ? "Hello Nghia" : "Not Logged in";
echo "<br />";
// int
$loggedin = true;
$userid = 0;

echo ( $loggedin && $userid ) ? "Hello Nghia" : "Not Logged in";
echo "<br />";
?>