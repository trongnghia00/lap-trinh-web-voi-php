<?php
/**
 * Get article based on ID
 * @param object $conn Connection to DB
 * @param integer $id the article ID
 * 
 * @return mixed An array contain article, null if not found
 */
function getArticle($conn, $id) {
    $sql = "SELECT * 
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

?>