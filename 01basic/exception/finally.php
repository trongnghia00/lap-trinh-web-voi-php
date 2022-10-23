<?php
function custom_exception_handler($exception) {
    echo "Uncaught Exception: " . $exception->getMessage() . "<br />";
}

set_exception_handler('custom_exception_handler');

// throw new Exception("Raise Exception");
// echo "Hello";

try {
    throw new Exception("Raise Exception");
} 
catch (Exception $e) {
    echo "Caught Exception: " . $e->getMessage() . "<br />";
}
finally {
    echo "Hello <br />";
}

echo "End file";
?>