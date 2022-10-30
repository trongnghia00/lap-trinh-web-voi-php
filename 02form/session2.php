<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Session page 2</title>
    </head>
    <body>
        <h1>Session page 2</h1>
        
        <?php
        echo $_SESSION["favcolor"] . "<br />";
        print_r($_SESSION);
        ?>

    </body>
</html>