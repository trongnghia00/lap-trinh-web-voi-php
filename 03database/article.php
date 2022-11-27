<?php
require 'includes/db.php';

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

<?php require 'includes/header.php'; ?>

<?php if ($article === null): ?>
    <p>Article not found.</p>
<?php else: ?>
    <article>
        <h2><?= $article["Title"]; ?></h2>
        <p><?= $article["Content"] ?></p>
    </article>
<?php endif; ?>

<?php require 'includes/footer.php'; ?>