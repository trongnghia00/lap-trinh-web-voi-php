<?php
require 'includes/db.php';
require 'includes/article.php';

$conn = getDB();

if (isset($_GET['id'])) {
    $article = getArticle($conn, $_GET['id'], "Id");
    if ($article) {
        $id = $_GET['id'];
    } else {
        die("article not found");
    }
} else {
    die("id not supplied, article not found");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "DELETE FROM blogs 
            WHERE Id = ?;";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt === false) {
    echo mysqli_error($conn);
    }
    else {
        mysqli_stmt_bind_param($stmt, "i", $id);

        if (mysqli_stmt_execute($stmt)) {
                            
            header("Location: myblog.php");
            exit;
        } else {
            echo mysqli_stmt_error($stmt);
        }
    }
}

?>

<?php require 'includes/header.php'; ?>

<h2>Delete Article</h2>

<form action="delete_article.php?id=<?=$article["Id"] ?>" method="post">
    <p>Are you sure ?</p>
    <button type="submit">Delete</button>
    <a href="article.php?id=<?=$article["Id"] ?>">Cancel</a>
</form>

<?php require 'includes/footer.php'; ?>