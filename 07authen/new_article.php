<?php
require 'class/Database.php';
require 'class/Article.php';
require 'includes/auth.php';

session_start();

if (! isLoggedIn()) {
    die('Unauthorised');
}

$article = new Article();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $article->Title = $_POST["Title"];
    $article->Content = $_POST["Content"];
    $article->Published_at = $_POST["Published_at"];

    $db = new Database();
    $conn = $db->getConn();

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