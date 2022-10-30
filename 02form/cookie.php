<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cookie</title>
    </head>
    <body>
        <h1>Cookie</h1>
        
        <?php
        $cookie_name = "user";
        $cookie_value = "Nghia";
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

        if (isset($_COOKIE[$cookie_name])) {
            echo "Welcome " . $_COOKIE[$cookie_name] . "<br />";
        } else {
            echo "Hello Stranger. <br />";
        }
        ?>

    </body>
</html>