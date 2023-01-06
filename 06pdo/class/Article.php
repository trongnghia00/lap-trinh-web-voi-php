<?php

/**
 * Article class
 */
class Article 
{
    public $Id;
    public $Title;
    public $Content;
    public $Published_at;

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
     * @return mixed An object contain article, null if not found
     */
    public static function getByID($conn, $id, $columns='*') {
        $sql = "SELECT $columns 
                FROM blogs
                WHERE Id = :id";
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Article');

        if ($stmt->execute()) {
            return $stmt->fetch();
        }
    }

    public function update($conn) {
        $sql = "UPDATE blogs 
                SET Title=:title, Content=:content, Published_at=:published_at 
                WHERE Id = :id;";
        $stmt = $conn->prepare($sql);
        
        $stmt->bindValue(':title', $this->Title, PDO::PARAM_STR);
        $stmt->bindValue(':content', $this->Content, PDO::PARAM_STR);
        $stmt->bindValue(':published_at', $this->Published_at, PDO::PARAM_STR);
        $stmt->bindValue(':id', $this->Id, PDO::PARAM_INT);

        return $stmt->execute();
    }
}