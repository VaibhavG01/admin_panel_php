<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Only allow normal users
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
    header("Location: index.php?route=signin"); // redirect non-users
    exit;
}
