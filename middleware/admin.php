<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Only allow admin users
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php?route=signin"); // redirect non-admins
    exit;
}
