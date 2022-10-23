<?php
function myErrorHandler($errno, $errstr, $errfile, $errline) {
    echo "<b>Error: </b> [$errno] - $errstr <br />";
    echo "Error on line $errline in $errfile. <br />";
}

set_error_handler('myErrorHandler');

$test = 2;

if ($test > 1) {
    trigger_error("test > 1");
}
?>