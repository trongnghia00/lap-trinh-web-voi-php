<?php
/**
 * User
 * 
 * An entity that can log in to the site
 */
class User 
{
    public $id;
    public $username;
    public $password;

    /**
     * Authenticate a user
     * 
     * @param string $username Username
     * @param string $password Password
     * 
     * @return bool True if authenticate successful, False otherwise
     */
    public static function authenticate($username, $password) {
        return $username == 'nghia' && $password == 'secret';
    }
}