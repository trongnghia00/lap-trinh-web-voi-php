<?php
require 'class/Database.php';
require 'class/Article.php';
require 'includes/auth.php';

session_start();

$db = new Database();
$conn = $db->getConn();

$articles = Article::getAll($conn);

?>

<?php require 'includes/header.php'; ?>

<?php
if (isLoggedIn()):
?>
    <p>You are logged in. <a href="logout.php">Logout</a></p>
    <a href="new_article.php">New Article</a>
<?php else: ?>
    <p>You are not logged in. <a href="login.php">Login</a></p>
<?php endif; ?>

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