<?php
class Category 
{
    /**
     * Get all categories
     * @param object $conn Connection to DB
     * @return array An associative array of all categories
     */
    public static function getAll($conn) {
        $sql = "SELECT * 
                FROM category
                ORDER BY name;";
        
        $results = $conn->query($sql);

        return $results->fetchAll(PDO::FETCH_ASSOC);
    }
}