<?php
$db_host = "localhost";
$db_name = "my_blog";
$db_user = "blog_db_admin";
$db_pass = "kUO8jJphaouidk82";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (mysqli_connect_error()) {
    echo mysqli_connect_error();
    exit;
}

$sql = "SELECT * 
        FROM blogs
        WHERE Id = " . $_GET["id"];
$results = mysqli_query($conn, $sql);
if ($results === false) {
    echo mysqli_error($conn);
}
else {
    $article = mysqli_fetch_assoc($results);
}
?>

<!Doctype html>
<html>
    <head>
        <title>My Blog</title>
        <meta charset="utf-8" />
    </head>
    <body>
        <header><h1>My Blog</h1></header>
        <main>
            <?php if ($article === null): ?>
                <p>Article not found.</p>
            <?php else: ?>
                <article>
                    <h2><?= $article["Title"]; ?></h2>
                    <p><?= $article["Content"] ?></p>
                </article>
            <?php endif; ?>
        </main>
    </body>
</html>