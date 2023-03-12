<?php

require '../includes/init.php';

Auth::requireLogin();

$conn = require '../includes/db.php';

if (isset($_GET['id'])) {
    $article = Article::getByID($conn, $_GET['id']);
    if (! $article) {
        die("article not found");
    }
} else {
    die("id not supplied, article not found");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $prev_image = $article->image_file;

    if ($article->setImageFile($conn, null)) {
        if ($prev_image) {
            unlink("../uploads/$prev_image");
        }

        header("Location: edit_article_image.php?id=" . $article->Id);
    }
}

?>

<?php require '../includes/header.php'; ?>

<h2>Delete Article Image</h2>

<form method="post">
    <?php if ($article->image_file) : ?>
        <img src="../uploads/<?= $article->image_file ?>" />
    <?php endif; ?>

    <p>Are you sure ?</p>

    <button>Delete</button> 
    <a href="edit_article_image.php?id=<?= $article->Id ?>">Cancel</a>
</form>

<?php require '../includes/footer.php'; ?>