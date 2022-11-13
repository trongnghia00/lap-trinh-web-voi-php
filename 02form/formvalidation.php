<?php
$NameError = "";
$EmailError = "";
$GenderError = "";
$WebsiteError = "";

if (isset($_POST["submit"])) {
    if (empty($_POST["name"])) {
        $NameError = "Name is required";
    } else {
        $Name = $_POST["name"];
        if (!preg_match("/^[A-Za-z ]*$/", $Name)) {
            $NameError = "Only characters and spaces are allowed.";
        }
    }
    if (empty($_POST["email"])) {
        $EmailError = "Email is required";
    } else {
        $Email = $_POST["email"];
        if (!preg_match("/^\\S+@\\S+\\.\\S+$/", $Email)) {
            $EmailError = "Email is invalid.";
        }
    }
    if (empty($_POST["gender"])) {
        $GenderError = "Gender is required";
    }
    if (empty($_POST["website"])) {
        $WebsiteError = "Website is required";
    } else {
        $Web = $_POST["website"];
        if (!preg_match("/^https?:\\/\\/(?:www\\.)?[-a-zA-Z0-9@:%._\\+~#=]{1,256}\\.[a-zA-Z0-9()]{1,6}\\b(?:[-a-zA-Z0-9()@:%_\\+.~#?&\\/=]*)$/", $Web)) {
            $WebsiteError = "URL is invalid.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Form Validation with PHP</title>
        <style>
            .error { color: red; }
        </style>
    </head>
    <body>
        <h1>Form Validation with PHP</h1>
        <form action="formvalidation.php" method="post">
            <fieldset>
                <legend>* Please fill out the following fields.</legend>
                <p>
                    <label for="name">Name: </label>
                    <input name="name" id="name" type="text" placeholder="Your name" /> * <?php echo "<span class='error'>$NameError</span>" ?>
                </p>
                <p>
                    <label for="email">Email: </label>
                    <input name="email" id="email" type="email" placeholder="test@email.com" /> * <?php echo "<span class='error'>$EmailError</span>" ?>
                </p>
                <p>
                    <label for="gender">Gender: </label>
                    <input type="radio" name="gender" id="gender" value="Male" />Male 
                    <input type="radio" name="gender" id="gender" value="Female" />Female * <?php echo "<span class='error'>$GenderError</span>" ?>
                </p>
                <p>
                    <label for="website">Website: </label>
                    <input name="website" id="website" placeholder="http://yourwebsite.com" /> * <?php echo "<span class='error'>$WebsiteError</span>" ?>
                </p>
            </fieldset>
            <p>
                <input type="submit" name="submit" value="Submit" /> 
                <input type="reset" />
            </p>
        </form>
    </body>
</html>