<?php
// try {
//     // code
//     throw new Exception("Error Example");

//     echo "This line not excuted";
// } catch (Exception $e) {
//     echo "Caught Exeption: " . $e->getMessage() . "<br />";
// }


function div($x, $y) : int
{
    if ($y == 0) {
        throw new Exception("Divide by Zero.");
    }
    $result = $x / $y;
    return $result;
}

try {
    $result = div(1, 0);
} catch (Exception $e) {
    echo "Caught Exeption: " . $e->getMessage() . "<br />";
}
?>