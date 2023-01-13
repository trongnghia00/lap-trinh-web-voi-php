<?php
require 'includes/init.php';

$conn = require 'includes/db.php';

if (isset($_GET['id'])) {
    $article = Article::getByID($conn, $_GET['id']);
    if (! $article) {
        die("article not found");
    }
} else {
    die("id not supplied, article not found");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($article->delete($conn)) {
        header("Location: myblog.php");
        exit;
    }
}

?>

<?php require 'includes/header.php'; ?>

<h2>Delete Article</h2>

<form action="delete_article.php?id=<?=$article->Id ?>" method="post">
    <p>Are you sure ?</p>
    <button type="submit">Delete</button>
    <a href="article.php?id=<?=$article->Id ?>">Cancel</a>
</form>

<?php require 'includes/footer.php'; ?>