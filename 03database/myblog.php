<?php
// $articles = [
//     [
//         "title" => "First post",
//         "content" => "This is first post ..."
//     ],
//     [
//         "title" => "Another post",
//         "content" => "OK, another post ..."
//     ],
//     [
//         "title" => "Read this",
//         "content" => "You must read this, it's important."
//     ]
// ];

$db_host = "localhost";
$db_name = "my_blog";
$db_user = "blog_db_admin";
$db_pass = "kUO8jJphaouidk82";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (mysqli_connect_error()) {
    echo mysqli_connect_error();
    exit;
}

// echo "Connected successfully.";

$sql = "SELECT * 
        FROM blogs
        ORDER BY Published_at;";
$results = mysqli_query($conn, $sql);
if ($results === false) {
    echo mysqli_error($conn);
}
else {
    $articles = mysqli_fetch_all($results, MYSQLI_ASSOC);
    // var_dump($articles);
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
            <?php if (empty($articles)): ?>
                <p>No articles found.</p>
            <?php else: ?>
                <ul>
                    <?php foreach ($articles as $article): ?>
                        <li>
                            <article>
                                <h2><a href="article.php?id=<?= $article["Id"]; ?>"><?= $article['Title'] ?></a></h2>
                                <p><?= $article['Content'] ?></p>
                            </article>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </main>
    </body>
</html>