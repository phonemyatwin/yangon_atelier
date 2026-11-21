<?php
// Initialize session
require_once __DIR__ . '/../components/session_start.php';

// Clear presence in database upon explicit sign out
if (isset($_SESSION['admin']['id'])) {
    require_once __DIR__ . '/../components/connection.php';
    try {
        $stmt = $pdo->prepare("UPDATE admins SET last_activity = NULL WHERE id = :id");
        $stmt->execute([':id' => $_SESSION['admin']['id']]);
    } catch (PDOException $e) {
        // Silently ignore
    }
}

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
