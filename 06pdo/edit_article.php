<?php
require 'class/Database.php';
require 'class/Article.php';

$db = new Database();
$conn = $db->getConn();

if (isset($_GET['id'])) {
    $article = Article::getByID($conn, $_GET['id']);
    if (! $article) {
        die("article not found");
    }
} else {
    die("id not supplied, article not found");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $article->Title = $_POST["Title"];
    $article->Content = $_POST["Content"];
    $article->Published_at = $_POST["Published_at"];

    if ($article->update($conn)) {
        header("Location: article.php?id={$article->Id}");
        exit;
    }
}

?>

<?php require 'includes/header.php'; ?>

<h2>Edit Article</h2>

<?php require 'includes/form_article.php'; ?>
<?php require 'includes/footer.php'; ?>