<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Forms GET</title>
    </head>
    <body>
        <h1>Form GET</h1>
        <a href="form.html">Back to Form</a> <br />
        <?php
        $name = $_GET["name"];
        $email = $_GET["email"];

        echo "Name: $name - Email: $email";
        ?>
    </body>
</html>