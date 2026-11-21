<?php
require_once __DIR__ . '/../../components/connection.php';

if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit;
}

// Keep presence timestamp fresh (update at most once per 60 seconds)
if (isset($pdo) && isset($_SESSION['admin']['id'])) {
    $now = time();
    if (!isset($_SESSION['admin']['last_ping']) || ($now - $_SESSION['admin']['last_ping']) > 60) {
        try {
            $stmt = $pdo->prepare("UPDATE admins SET last_activity = NOW() WHERE id = :id");
            $stmt->execute([':id' => $_SESSION['admin']['id']]);
            $_SESSION['admin']['last_ping'] = $now;
        } catch (PDOException $e) {
            // Silently ignore presence ping errors
        }
    }
}
