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

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {
        if (empty($_FILES)) {
            throw new Exception('Invalid upload.');
        }

        switch ($_FILES['file']['error']) {
            case UPLOAD_ERR_OK :
                break;
            case UPLOAD_ERR_NO_FILE :
                throw new Exception('No file uploaded.');
                break;
            case UPLOAD_ERR_INI_SIZE :
                throw new Exception('File is too large (from server settings)');
                break;
            default :
                throw new Exception('An error occurred.');
        }

        if ($_FILES['file']['size'] > 1000000) {
            throw new Exception('File is too large');
        }

        $mime_types = ['image/gif', 'image/png', 'image/jpeg'];
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mine_type = finfo_file($finfo, $_FILES['file']['tmp_name']);

        if (! in_array($mine_type, $mime_types)) {
            throw new Exception('Invalid file type');
        }

        $pathinfo = pathinfo($_FILES["file"]["name"]);
        $filename = $pathinfo['filename'];
        $filename = preg_replace('/[^a-zA-Z0-9_-]/', '_', $filename);
        $filename = mb_substr($filename, 0, 200);

        $fullname = $filename . '.' . $pathinfo['extension'];

        $dest = "../uploads/" . $fullname;

        $i = 1;
        while (file_exists($dest)) {
            $fullname = $filename . "-$i." . $pathinfo['extension'];
            $dest = "../uploads/" . $fullname;
            $i++;
        }

        if (move_uploaded_file($_FILES['file']['tmp_name'], $dest)) {
            $prev_image = $article->image_file;

            if ($article->setImageFile($conn, $fullname)) {
                if ($prev_image) {
                    unlink("../uploads/$prev_image");
                }

                header("Location: edit_article_image.php?id=" . $article->Id);
            }
        } else {
            throw new Exception("Unable to move uploaded file.");
        }

    } catch (Exception $e) {
        $error = $e->getMessage();
    }
    
}

?>

<?php require '../includes/header.php'; ?>

<h2>Edit Article Image</h2>

<form method="post" enctype="multipart/form-data">
    <?php if ($article->image_file) : ?>
        <img src="../uploads/<?= $article->image_file ?>" />
        <a href="delete_article_image.php?id=<?= $article->Id ?>">Delete</a>
    <?php endif; ?>

    <?php if (isset($error)) : ?>
        <p><?= $error ?></p>
    <?php endif; ?>

    <div>
        <label for="file">Image file</label>
        <input type="file" name="file" id="file" />
    </div>
    <button>Upload</button>
</form>

<?php require '../includes/footer.php'; ?>