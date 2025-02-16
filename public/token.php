<?php
session_start();

function generateToken() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    header('Content-Type: application/json');
    echo json_encode(['token' => generateToken()]);
}
?>
