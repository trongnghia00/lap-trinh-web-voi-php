<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP And HTML</title>
    <script>
        <?=
            "alert('Hello from PHP!');";
        ?>
    </script>
</head>
<body>
    <h1>Nhúng PHP vào HTML</h1>
    
    <?php echo "Hello World !"; ?>

    <?php 
        print "<p>Paragraph 1: from PHP</p>";
    ?>
    <?="<hr />" ?>

    <p <?= 'style="color:red"' ?> >This is a red text.</p>

    <?= '<p>' ?>
        This is a text from HTML.
    <?= '</p>' ?>
</body>
</html>