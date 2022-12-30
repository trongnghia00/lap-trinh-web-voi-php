<?php
/**
 * Return the user authentication status
 */
function isLoggedIn() {
    return isset($_SESSION['logged_in']) && $_SESSION['logged_in'];
}
?>