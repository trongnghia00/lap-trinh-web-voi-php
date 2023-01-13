<?php
require 'includes/init.php';

Auth::requireLogin();

$article = new Article();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $article->Title = $_POST["Title"];
    $article->Content = $_POST["Content"];
    $article->Published_at = $_POST["Published_at"];

    $conn = require 'includes/db.php';

    if ($article->create($conn)) {
        header("Location: article.php?id={$article->Id}");
        exit;
    }
}
?>

<?php require 'includes/header.php'; ?>

<h2>New Article</h2>

<?php require 'includes/form_article.php'; ?>
<?php require 'includes/footer.php'; ?>