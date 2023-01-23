<?php
require 'includes/init.php';

$conn = require 'includes/db.php';

$page = $_GET['page'] ?? 1;

$articles_per_page = 4;

$paging = new Paging($page, $articles_per_page, Article::getTotal($conn));

$articles = Article::getPage($conn, $paging->limit, $paging->offset);

?>

<?php require 'includes/header.php'; ?>

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

    <nav>
        <ul>
            <li>
                <?php if ($paging->previous) : ?>
                    <a href="?page=<?= $paging->previous ?>">Previous</a>
                <?php else : ?>
                    Previous
                <?php endif; ?>
            </li>
            <li>
                <?php if ($paging->next) : ?>
                    <a href="?page=<?= $paging->next ?>">Next</a>
                <?php else : ?>
                    Next
                <?php endif; ?>
            </li>
        </ul>
    </nav>
<?php endif; ?>
        
<?php require 'includes/footer.php'; ?>