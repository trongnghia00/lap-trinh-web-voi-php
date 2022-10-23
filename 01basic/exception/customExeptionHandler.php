<?php
function custom_exception_handler($exception) {
    echo "Uncaught Exception: " . $exception->getMessage() . "<br />";
}

set_exception_handler('custom_exception_handler');

// throw new Exception("Raise Exception");

function add($a, $b) : int {
    if ($a <= 0) {
        throw new Exception("Input param a <= 0");
    }
    $result = $a + $b;
    return $result;
}

echo add(2,3) . "<br />";

// Multiple Exception
function div($x, $y) : int
{
    try {
        if ($y == 0) {
            throw new Exception("Divide by Zero.");
        }
    } catch (Exception $e) {
        throw new Exception("Input param y = 0");
    }

    $result = $x / $y;
    return $result;
}

echo div(4, 0) . "<br />";
?>