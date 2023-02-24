<?php
require '../includes/init.php';

Auth::requireLogin();

$conn = require '../includes/db.php';

$page = $_GET['page'] ?? 1;

$articles_per_page = 6;

$paging = new Paging($page, $articles_per_page, Article::getTotal($conn));

$articles = Article::getPage($conn, $paging->limit, $paging->offset);

?>

<?php require '../includes/header.php'; ?>

<h2>Admin page</h2>
<p><a href="new_article.php">New Article</a></p>
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

    <?php require '../includes/paging.php' ?>

<?php endif; ?>
        
<?php require '../includes/footer.php'; ?>