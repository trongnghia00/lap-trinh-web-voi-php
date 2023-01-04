<?php

/**
 * Article class
 */
class Article 
{
    /**
     * Get all articles
     * @param object $conn Connection to DB
     * @return array An associative array of all articles
     */
    public static function getAll($conn) {
        $sql = "SELECT * 
                FROM blogs
                ORDER BY Published_at;";
        
        $results = $conn->query($sql);

        return $results->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get article based on ID
     * @param object $conn Connection to DB
     * @param integer $id the article ID
     * @param string $columns Optional list of columns, default: *
     * 
     * @return mixed An array contain article, null if not found
     */
    public static function getByID($conn, $id, $columns='*') {
        $sql = "SELECT $columns 
                FROM blogs
                WHERE Id = :id";
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
}