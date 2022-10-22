<?php
declare(strict_types = 1);
function printNumbers(int $limit) {
    for ($i=1; $i <= $limit; $i++)  {
        echo $i . " ";
    }
    echo "<br />";
}

printNumbers(10);
//printNumbers("10");
?>