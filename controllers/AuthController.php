<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once "db/config.php";
require_once "models/Auth.php";

class AuthController {
    private $db;
    private $auth;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->auth = new Auth($this->db);

        // ✅ Auto login with cookie if session not set
        if (!isset($_SESSION['user_id']) && isset($_COOKIE['remember_me'])) {
            $cookieData = json_decode($_COOKIE['remember_me'], true);
            if ($cookieData && isset($cookieData['id'], $cookieData['role'], $cookieData['name'])) {
                $_SESSION['user_id'] = $cookieData['id'];
                $_SESSION['role']    = $cookieData['role'];
                $_SESSION['name']    = $cookieData['name']; // restore name
            }
        }

        // ✅ Auto redirect logged-in users if they visit signin/signup
        if (isset($_SESSION['user_id'])) {
            if ($_SESSION['role'] === 'admin' && isset($_GET['route']) && in_array($_GET['route'], ['signin','signup'])) {
                header("Location: index.php?route=admin_dashboard");
                exit;
            } elseif ($_SESSION['role'] === 'user' && isset($_GET['route']) && in_array($_GET['route'], ['signin','signup'])) {
                header("Location: index.php?route=user_dashboard");
                exit;
            }
        }
    }

    // ✅ Signup
    public function signup($data) {
    $this->auth->name     = $data['name'];
    $this->auth->email    = $data['email'];
    $this->auth->password = password_hash($data['password'], PASSWORD_DEFAULT);

    // ✅ Safe role assignment
    $allowed_roles = ['user', 'admin'];
    $this->auth->role = (isset($data['role']) && in_array($data['role'], $allowed_roles))
                        ? $data['role']
                        : 'user';

    if ($this->auth->register()) {
        header("Location: index.php?route=signin");
        exit;
    } else {
        echo "Error: Could not register user.";
    }
}


    // ✅ Signin
    public function signin($data) {
        $this->auth->email = $data['email'];
        $stmt = $this->auth->login();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($data['password'], $user['password'])) {
            // Start session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role']    = $user['role'];
            $_SESSION['name']    = $user['name'];

            // Remember me → set cookie for 7 days
            if (isset($data['remember'])) {
                $cookieData = json_encode([
                    "id"   => $user['id'],
                    "role" => $user['role'],
                    "name" => $user['name']
                ]);
                setcookie("remember_me", $cookieData, time() + (7 * 24 * 60 * 60), "/");
            }

            // Redirect based on role
            if ($user['role'] === 'admin') {
                header("Location: index.php?route=admin_dashboard");
            } else {
                header("Location: index.php?route=user_dashboard");
            }
            exit;

        } else {
            echo "❌ Invalid email or password.";
        }
    }

    // ✅ Logout
    public function logout() {
        // Clear all sessions
        $_SESSION = [];
        session_destroy();

        // Clear cookie
        setcookie("remember_me", "", time() - 3600, "/");

        header("Location: index.php?route=signin");
        exit;
    }
}
