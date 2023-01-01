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
        WHERE Id = :id";
    $stmt = $conn->prepare($sql);

    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        return $stmt->fetch(PDO::FETCH_ASSOC);
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