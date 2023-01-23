<?php
require '../includes/init.php';

Auth::requireLogin();

$conn = require '../includes/db.php';

$articles = Article::getAll($conn);

?>

<?php require '../includes/header.php'; ?>

<?php
if (Auth::isLoggedIn()):
?>
    <p>You are logged in. <a href="logout.php">Logout</a></p>
    <a href="new_article.php">New Article</a>
<?php else: ?>
    <p>You are not logged in. <a href="login.php">Login</a></p>
<?php endif; ?>

<h2>Admin page</h2>

<?php if (empty($articles)): ?>
    <p>No articles found.</p>
<?php else: ?>
    
    <table>
        <thead>
            <th>Title</th>
        </thead>
        <tbody>
            <?php foreach ($articles as $article): ?>
                <tr>
                    <td>
                        <a href="article.php?id=<?= htmlspecialchars($article["Id"]); ?>"><?= $article['Title'] ?></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php endif; ?>
        
<?php require '../includes/footer.php'; ?>