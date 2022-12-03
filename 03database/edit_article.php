<?php
require 'includes/db.php';
require 'includes/article.php';

$conn = getDB();

if (isset($_GET['id'])) {
    $article = getArticle($conn, $_GET['id']);
    if ($article) {
        $title = $article['Title'];
        $content = $article['Content'];
        $published_at = $article['Published_at'];
    } else {
        die("article not found");
    }
    

} else {
    die("id not supplied, article not found");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["Title"];
    $content = $_POST["Content"];
    $published_at = $_POST["Published_at"];

    $errors = validateArticle($title, $content, $published_at);

    if (empty($errors)) {
        die('Form is valid');
    }
}

?>

<?php require 'includes/header.php'; ?>

<h2>Edit Article</h2>

<?php require 'includes/form_article.php'; ?>
<?php require 'includes/footer.php'; ?>