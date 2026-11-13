<?php
// Initialize session
require_once __DIR__ . '/../components/session_start.php';

// Clear all session values
$_SESSION = [];

// Delete session cookies
if (ini_get('session.use_cookies')) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', [
        'expires' => time() - 3600,
        'path' => $params['path'],
        'httponly' => $params['httponly'],
        'samesite' => $params['samesite']
    ]);
}

// Destroy session data storage
session_destroy();

// Redirect to login page
header('Location: index.php');
exit;
