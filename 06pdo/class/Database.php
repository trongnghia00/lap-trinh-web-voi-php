<?php

class Database 
{
    public function getConn() {
        $db_host = "localhost";
        $db_name = "my_blog";
        $db_user = "blog_db_admin";
        $db_pass = "kUO8jJphaouidk82";

        $dsn = "mysql:host=$db_host;dbname=$db_name;charset=utf8";

        return new PDO($dsn, $db_user, $db_pass);
    }
}