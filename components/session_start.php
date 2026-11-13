<?php
// This checks if the session is running. If none is running yet, start it. This one also prevents from crashing if one is already running by doing nothing and not throwing an error. 
if (session_status() === PHP_SESSION_NONE) {
    session_start([
        'cookie_httponly' => true,
        'cookie_samesite' => 'Lax'
    ]);
}
