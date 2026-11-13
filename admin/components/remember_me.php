<?php
$thirty_days = time() + (60 * 60 * 24 * 30);

setcookie('admin_email_cookie', $remember ? $email : '', [
    'expires' => $remember ? $thirty_days : time() - 3600,
    'path' => '/',
    'httponly' => true,
    'samesite' => 'Lax'
]);


if ($remember) {
    $params = session_get_cookie_params();
    setcookie(session_name(), session_id(), [
        'expires' => $thirty_days,
        'path' => $params['path'],
        'httponly' => $params['httponly'],
        'samesite' => $params['samesite'],
    ]);
}
