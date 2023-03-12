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
    public $image_file;
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
     * Get the article record with categories
     * 
     * @param object $conn Connection to DB
     * @param integer $id the article ID
     * 
     * @return array The article data with categories
     */
    public static function getWithCategories($conn, $id) {
        $sql = "SELECT blogs.*, category.name as category_name FROM blogs
                LEFT JOIN blog_category
                ON blogs.Id = blog_category.blog_id
                LEFT JOIN category
                ON blog_category.category_id = category.id
                WHERE blogs.Id = :id;";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get the article's categories
     * 
     * @param object $conn Connection to DB
     * 
     * @return array The categories data
     */
    public function getCategories($conn) {
        $sql = "SELECT category.* FROM category
                JOIN blog_category
                ON category.id = blog_category.category_id
                WHERE blog_category.blog_id = :id";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $this->Id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get a page of article
     * 
     * @param object $conn Connection to DB
     * @param integer $limit Number of article to return
     * @param integer $offset Number of article to skip
     * 
     * @return array An associative array of a page of article
     */
    public static function getPage($conn, $limit, $offset) {
        $sql = "SELECT a.*, category.name AS category_name
                FROM (SELECT * 
                FROM blogs
                ORDER BY Published_at
                LIMIT :limit
                OFFSET :offset) AS a
                LEFT JOIN blog_category
                ON a.Id = blog_category.blog_id
                LEFT JOIN category
                ON blog_category.category_id = category.id";
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $articles = [];

        $previous_id = null;

        foreach ($results as $row) {
            $article_id = $row['Id'];
            if ($article_id != $previous_id) {
                $row['cat_names'] = [];
                $articles[$article_id] = $row;
            }

            $articles[$article_id]['cat_names'][] = $row['category_name'];

            $previous_id = $article_id;
        }

        return $articles;
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
     * Set article categories
     * 
     * @param object $conn Connection to DB
     * @param array $ids Category ids
     * 
     * @return void
     */
    public function setCategories($conn, $ids) {
        $sql = "DELETE FROM blog_category WHERE blog_id = {$this->Id}";
        $conn->query($sql);
        
        if ($ids) {
            $sql = "INSERT IGNORE INTO blog_category (blog_id, category_id) 
                    VALUES ";
            
            $values = [];

            foreach ($ids as $id) {
                $values[] = "({$this->Id}, ?)";
            }

            $sql .= implode(", ", $values);

            $stmt = $conn->prepare($sql);

            foreach ($ids as $i => $id) {
                $stmt->bindValue($i + 1, $id, PDO::PARAM_INT);  
            }

            $stmt->execute();
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

    /**
     * Get a count of total number of articles
     * 
     * @param object $conn Connection to DB
     * 
     * @return integer total number of articles
     */
    public static function getTotal($conn) 
    {
        return $conn->query('SELECT COUNT(*) FROM blogs')->fetchColumn();
    }

    /**
     * Update the image file property
     * 
     * @param object $conn Connection to DB
     * @param string $filename The filename of the image file
     * 
     * @return bool True is was successful, False otherwise 
     */
    public function setImageFile($conn, $filename) {
        $sql = "UPDATE blogs
                SET image_file = :image_file
                WHERE Id = :id";
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':id', $this->Id, PDO::PARAM_INT);
        $stmt->bindValue(':image_file', $filename, $filename == null ? PDO::PARAM_NULL : PDO::PARAM_STR);

        return $stmt->execute();
    }
}