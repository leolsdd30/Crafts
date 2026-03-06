<?php
namespace App\Auth;

class Middleware
{
    /**
     * Ensure the user is logged in. If not, redirect to the login page.
     */
    public static function requireLogin()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . APP_URL . "/login");
            exit;
        }
    }

    /**
     * Ensure the user is logged in AND has a specific role.
     * 
     * @param string $role The required role (e.g., 'homeowner' or 'craftsman')
     */
    public static function requireRole($role)
    {
        self::requireLogin();

        if ($_SESSION['role'] !== $role) {
            // Alternatively, load a 403 Forbidden page here.
            echo "Access Denied: You do not have permission to view this page.";
            exit;
        }
    }

    /**
     * Ensure an admin is logged in
     */
    public static function requireAdmin()
    {
        self::requireLogin();

        if ($_SESSION['role'] !== 'admin') {
            echo "Access Denied: Administrator privileges required.";
            exit;
        }
    }

    /**
     * Verify a CSRF token
     */
    public static function verifyCsrfToken($token)
    {
        if (empty($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']) {
            die("CSRF Token Validation Failed");
        }
        return true;
    }
}
