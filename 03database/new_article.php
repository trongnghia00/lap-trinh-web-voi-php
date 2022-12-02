<?php
require 'includes/db.php';
$errors = [];
$title = '';
$content = '';
$published_at = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["Title"];
    $content = $_POST["Content"];
    $published_at = $_POST["Published_at"];

    if ($title == '') {
        $errors[] = 'Title is required';
    }
    if ($content == '') {
        $errors[] = 'Content is required';
    }
    if ($published_at == '') {
        $errors[] = 'Published_at is required';
    }

    if (empty($errors)) {
        $conn = getDB();
        $datetime = date("Y-m-d H:i:s", strtotime($published_at));
        $sql = "INSERT INTO blogs(Title, Content, Published_at) 
                VALUES (?, ?, ?);";
        $stmt = mysqli_prepare($conn, $sql);
    
        if ($stmt === false) {
            echo mysqli_error($conn);
        }
        else {
            mysqli_stmt_bind_param($stmt, "sss", $title, $content, $datetime);
    
            if (mysqli_stmt_execute($stmt)) {
                $id = mysqli_insert_id($conn);
                echo "Inserted record with ID: $id";
            } else {
                echo mysqli_stmt_error($stmt);
            }
        }
    }  
}
?>

<?php require 'includes/header.php'; ?>

<h2>New Article</h2>

<?php 
if (! empty($errors)): ?>
    <ul>
        <?php foreach ($errors as $err): ?>
            <li><?= $err ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="post">
    <div>
        <label for="Title">Title</label>
        <input name="Title" id="title" placeholder="Article Title" value="<?= htmlspecialchars($title); ?>" />
    </div>
    <div>
        <label for="Content">Content</label>
        <textarea name="Content" rows="4" cols="40" id="content" placeholder="Article Content"><?= htmlspecialchars($content); ?></textarea>
    </div>
    <div>
        <label for="Published_at">Published at</label>
        <input type="datetime-local" name="Published_at" id="published_at" value="<?= $published_at ?>"/>
    </div>
    <button type="submit">Add</button>
</form>

<?php require 'includes/footer.php'; ?>