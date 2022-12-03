<?php
require 'includes/db.php';
require 'includes/getArticle.php';

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

?>

<?php require 'includes/header.php'; ?>

<h2>Edit Article</h2>

<?php require 'includes/form_article.php'; ?>
<?php require 'includes/footer.php'; ?>