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

$category_ids = array_column($article->getCategories($conn), 'id');
$categories = Category::getAll($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $article->Title = $_POST["Title"];
    $article->Content = $_POST["Content"];
    $article->Published_at = $_POST["Published_at"];

    $category_ids = $_POST['category'] ?? [];

    if ($article->update($conn)) {
        $article->setCategories($conn, $category_ids);
        header("Location: article.php?id={$article->Id}");
        exit;
    }
}

?>

<?php require '../includes/header.php'; ?>

<h2>Edit Article</h2>

<?php require 'includes/form_article.php'; ?>
<?php require '../includes/footer.php'; ?>