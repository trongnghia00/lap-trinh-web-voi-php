<?php
/**
 * Authentication
 * 
 * Login and Logout
 */
class Auth 
{
    /**
     * Return the user authentication status
     */
    public static function isLoggedIn() {
        return isset($_SESSION['logged_in']) && $_SESSION['logged_in'];
    }
}