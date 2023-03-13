<?php
require '../includes/init.php';

Auth::requireLogin();

$conn = require '../includes/db.php';

if (isset($_GET['id'])) {
    $article = Article::getWithCategories($conn, $_GET['id']);
} else {
    $article = null;
}
?>

<?php require '../includes/header.php'; ?>

<?php if ($article): ?>
    <article>
        <h2><?= htmlspecialchars($article[0]['Title']); ?></h2>

        <?php if ($article[0]['category_name']) : ?>
            <p>Categories: 
                <?php foreach ($article as $ar) : ?>
                    <?= htmlspecialchars($ar['category_name']) ?>
                <?php endforeach; ?>
            </p>
        <?php endif; ?>

        <?php if ($article[0]['image_file']) : ?>
            <img src="../uploads/<?= $article[0]['image_file'] ?>" />
        <?php endif; ?>
        
        <p><?= htmlspecialchars($article[0]['Content']); ?></p>
    </article>

    <a href="edit_article.php?id=<?=$article[0]['Id'] ?>">Edit</a> &nbsp;
    <a class="delete" href="delete_article.php?id=<?=$article[0]['Id'] ?>">Delete</a> &nbsp;
    <a href="edit_article_image.php?id=<?=$article[0]['Id'] ?>">Edit Image</a> &nbsp;

<?php else: ?>
    <p>Article not found.</p>
<?php endif; ?>

<?php require '../includes/footer.php'; ?>