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
        $id = $_GET['id'];
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
        $datetime = date("Y-m-d H:i:s", strtotime($published_at));
        $sql = "UPDATE blogs 
                SET Title=?, Content=?, Published_at=? 
                WHERE Id = ?;";
        $stmt = mysqli_prepare($conn, $sql);
    
        if ($stmt === false) {
            echo mysqli_error($conn);
        }
        else {
            mysqli_stmt_bind_param($stmt, "sssi", $title, $content, $datetime, $id);
    
            if (mysqli_stmt_execute($stmt)) {
                                
                header("Location: article.php?id=$id");
                exit;
            } else {
                echo mysqli_stmt_error($stmt);
            }
        }
    }
}

?>

<?php require 'includes/header.php'; ?>

<h2>Edit Article</h2>

<?php require 'includes/form_article.php'; ?>
<?php require 'includes/footer.php'; ?>