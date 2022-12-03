<?php
require 'includes/db.php';
require 'includes/article.php';

$conn = getDB();

if (isset($_GET['id'])) {
    $article = getArticle($conn, $_GET['id']);
} else {
    $article = null;
}
?>

<?php require 'includes/header.php'; ?>

<?php if ($article === null): ?>
    <p>Article not found.</p>
<?php else: ?>
    <article>
        <h2><?= htmlspecialchars($article["Title"]); ?></h2>
        <p><?= htmlspecialchars($article["Content"]); ?></p>
    </article>

    <a href="edit_article.php?id=<?=$article["Id"] ?>">Edit</a> &nbsp;
    <a href="delete_article.php?id=<?=$article["Id"] ?>">Delete</a>

    <!-- <form action="delete_article.php?id=<?=$article["Id"] ?>" method="post">
        <button type="submit">Delete</button>
    </form> -->
<?php endif; ?>

<?php require 'includes/footer.php'; ?>