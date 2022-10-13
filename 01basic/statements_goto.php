<?php
$value1 = "Nghia";
$value2 = -1;

if ($value2 <= 0) {
    goto error_block;
}

echo "value2 is greater than 0. <br />";
exit();

error_block:
echo "This is error block. <br />";

echo "<br />";
for ($count=0; $count<=10; $count++) {
    if ($count == 2) {
        goto loop2;
    }
}

loop2:
echo "Counter: $count <br />";

echo "<br />";

// goto loop3;
// for ($count=0; $count<=10; $count++) {
//     if ($count == 2) {
//         loop3:
//         echo "Counter: $count <br />";
//     }
// }
?>