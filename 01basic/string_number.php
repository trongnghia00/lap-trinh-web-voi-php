<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String and number</title>
</head>
<body>
    <h1>Define string</h1>
    <?php
        $name = "Trong Nghia";
        $message = "Hello World.";
        echo $name . ": " . $message;
        echo "<br />";
        echo "$name: $message";
        echo "<br />";
        echo '$name: $message';
    ?>
    <h1>Define number</h1>
    <?php
        $ver = 7.4;
        echo "PHP version is $ver";
    ?>

    <h1>Combine string and number</h1>
    <?php
        $lang = "PHP";
        echo $lang . " version is " . $ver;
        echo "<br />";
        echo "$lang version is $ver";
    ?>

    <h1>Add two value</h1>
    <?php
        $val1 = 10;
        $val2 = 20;
        $total = $val1 + $val2;
        echo "Total: $total";
    ?>
</body>
</html>