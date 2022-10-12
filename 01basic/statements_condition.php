<?php
$number = 10;
$result = $number % 2;
if ($result) {
    echo 'Odd number <br />';
} else {
    echo 'Even number <br />';
}
?>

<!doctype html>
<html>
    <head>
        <title>if else statement</title>
    </head>
    <body>
        <?php
        $condition = false;
        if ($condition) {
            ?>
            <h1>This is a true Condition Block</h1>
            <?php
        }
        else {
            ?>
            <h1>This is a false Condition Block</h1>
            <?php
        }
        ?>
    </body>
</html>

<?php
if ($number > 10) {
    echo 'Number greater than 10 <br />';
} elseif ($number == 10) {
    echo 'Number equal 10. <br />';
} else {
    echo 'Number less than 10 <br />';
}
?>

<?php
switch ($result) {
    case 1:
        echo 'Odd number. <br />';
        break;
    case 0:
        echo 'Even number. <br />';
        break;
    default:
        echo 'Others .... <br />';
}
?>