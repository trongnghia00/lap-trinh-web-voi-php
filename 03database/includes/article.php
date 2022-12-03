<?php
/**
 * Get article based on ID
 * @param object $conn Connection to DB
 * @param integer $id the article ID
 * @param string $columns Optional list of columns, default: *
 * 
 * @return mixed An array contain article, null if not found
 */
function getArticle($conn, $id, $columns='*') {
    $sql = "SELECT $columns 
        FROM blogs
        WHERE Id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt === false) {
        echo mysqli_error($conn);
    }
    else {
        mysqli_stmt_bind_param($stmt, "i", $id);
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            return mysqli_fetch_array($result, MYSQLI_ASSOC);
        }
    }
}

/**
 * Validate the article properties
 * 
 * @param string $title Title
 * @param string $content Content
 * @param string $published_at Publised date and time
 * 
 * @return array An array of error messages
 */
function validateArticle($title, $content, $published_at) {
    $errors = [];
    if ($title == '') {
        $errors[] = 'Title is required';
    }
    if ($content == '') {
        $errors[] = 'Content is required';
    }
    if ($published_at == '') {
        $errors[] = 'Published_at is required';
    }
    return $errors;
}

?>