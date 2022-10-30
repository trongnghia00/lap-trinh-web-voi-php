<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Forms GET</title>
    </head>
    <body>
        <h1>Save to file</h1>
        <a href="form.html">Back to Form</a> <br />
        <?php
        $name = $_POST["name"];
        $email = $_POST["email"];

        echo "Name: $name - Email: $email <br />";

        // Save to file
        $output = $name . " # " . $email . " \n";
        $file = fopen("formdata.txt", "ab");
        fwrite($file, $output);
        fclose($file);
        echo "Data written to file !!";
        ?>
    </body>
</html>