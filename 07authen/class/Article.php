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
    public $errors = [];

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

    /**
     * Update article
     * @param object $conn Connection to DB
     * 
     * @return boolean True if update successful, False otherwise
     */
    public function update($conn) {
        if ($this->validate()) {
            $sql = "UPDATE blogs 
                    SET Title=:title, Content=:content, Published_at=:published_at 
                    WHERE Id = :id;";
            $stmt = $conn->prepare($sql);
            
            $stmt->bindValue(':title', $this->Title, PDO::PARAM_STR);
            $stmt->bindValue(':content', $this->Content, PDO::PARAM_STR);
            $stmt->bindValue(':published_at', $this->Published_at, PDO::PARAM_STR);
            $stmt->bindValue(':id', $this->Id, PDO::PARAM_INT);

            return $stmt->execute();
        } else {
            return false;
        }
    }

    /**
     * Validate the article properties
     * 
     * @return boolean True if current properties are valid, False otherwise
     */
    protected function validate() {
        if ($this->Title == '') {
            $this->errors[] = 'Title is required';
        }
        if ($this->Content == '') {
            $this->errors[] = 'Content is required';
        }
        if ($this->Published_at == '') {
            $this->errors[] = 'Published_at is required';
        } else {
            $this->Published_at = date("Y-m-d H:i:s", strtotime($this->Published_at));
        }
        return empty($this->errors);
    }

    /**
     * Delete current article
     * 
     * @param object $conn Connection to DB
     * 
     * @return boolean True if delete successful, False otherwise
     */
    public function delete($conn) {
        $sql = "DELETE FROM blogs 
                WHERE Id = :id;";
        $stmt = $conn->prepare($sql);
        
        $stmt->bindValue(':id', $this->Id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    /**
     * Insert article with current properties
     * @param object $conn Connection to DB
     * 
     * @return boolean True if insert successful, False otherwise
     */
    public function create($conn) {
        if ($this->validate()) {
            $sql = "INSERT INTO blogs(Title, Content, Published_at) 
                    VALUES (:title, :content, :published_at);";
            $stmt = $conn->prepare($sql);
            
            $stmt->bindValue(':title', $this->Title, PDO::PARAM_STR);
            $stmt->bindValue(':content', $this->Content, PDO::PARAM_STR);
            $stmt->bindValue(':published_at', $this->Published_at, PDO::PARAM_STR);

            if ($stmt->execute()) {
                $this->Id = $conn->lastInsertId();
                return true;
            }
        } else {
            return false;
        }
    }
}