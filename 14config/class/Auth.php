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

    /**
     * Require user to be logged in
     */
    public static function requireLogin() {
        if (! static::isLoggedIn()) {
            die('Unauthorised');
        }
    }

    /**
     * Log in
     */
    public static function login() {
        session_regenerate_id(true);
        $_SESSION['logged_in'] = true;
    }

    /**
     * Log out
     */
    public static function logout() {
        $_SESSION = array();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        session_destroy();
    }
}