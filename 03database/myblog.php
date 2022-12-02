<?php
require 'includes/db.php';

$conn = getDB();
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

<?php require 'includes/header.php'; ?>
<a href="new_article.php">New Article</a>

<?php if (empty($articles)): ?>
    <p>No articles found.</p>
<?php else: ?>
    <ul>
        <?php foreach ($articles as $article): ?>
            <li>
                <article>
                    <h2><a href="article.php?id=<?= htmlspecialchars($article["Id"]); ?>"><?= $article['Title'] ?></a></h2>
                    <p><?= htmlspecialchars($article['Content']); ?></p>
                </article>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
        
<?php require 'includes/footer.php'; ?>