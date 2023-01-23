<?php
require '../includes/init.php';

Auth::requireLogin();

$conn = require '../includes/db.php';

if (isset($_GET['id'])) {
    $article = Article::getByID($conn, $_GET['id']);
} else {
    $article = null;
}
?>

<?php require '../includes/header.php'; ?>

<?php if ($article): ?>
    <article>
        <h2><?= htmlspecialchars($article->Title); ?></h2>
        <p><?= htmlspecialchars($article->Content); ?></p>
    </article>

    <a href="edit_article.php?id=<?=$article->Id ?>">Edit</a> &nbsp;
    <a href="delete_article.php?id=<?=$article->Id ?>">Delete</a>

<?php else: ?>
    <p>Article not found.</p>
<?php endif; ?>

<?php require '../includes/footer.php'; ?>