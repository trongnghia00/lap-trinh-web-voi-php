<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'includes/db.php';

    $datetime = date("Y-m-d H:i:s", strtotime($_POST["Published_at"]));
    $sql = "INSERT INTO blogs(Title, Content, Published_at) 
            VALUES (?, ?, ?);";
    $stmt = mysqli_prepare($conn, $sql);
    
    // $results = mysqli_query($conn, $sql);

    if ($stmt === false) {
        echo mysqli_error($conn);
    }
    else {
        mysqli_stmt_bind_param($stmt, "sss", $_POST["Title"], $_POST["Content"], $datetime);

        if (mysqli_stmt_execute($stmt)) {
            $id = mysqli_insert_id($conn);
            echo "Inserted record with ID: $id";
        } else {
            echo mysqli_stmt_error($stmt);
        }
    }
}
?>

<?php require 'includes/header.php'; ?>

<h2>New Article</h2>

<form method="post">
    <div>
        <label for="Title">Title</label>
        <input name="Title" id="title" placeholder="Article Title" />
    </div>
    <div>
        <label for="Content">Content</label>
        <textarea name="Content" rows="4" cols="40" id="content" placeholder="Article Content"></textarea>
    </div>
    <div>
        <label for="Published_at">Published at</label>
        <input type="datetime-local" name="Published_at" id="published_at" />
    </div>
    <button type="submit">Add</button>
</form>

<?php require 'includes/footer.php'; ?>