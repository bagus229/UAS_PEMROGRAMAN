<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../config/session.php';

class AuthController {

    public function login() {
        require_once __DIR__ . '/../modules/auth/login.php';
    }

    public function loginProcess() {
        $db = Database::connect();

        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        $stmt = $db->prepare("SELECT * FROM users WHERE username=? LIMIT 1");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $user = $stmt->get_result()->fetch_assoc();

        if ($user && password_verify($password, $user['password'])) {

            $_SESSION['login'] = true;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            header("Location: ".BASE_URL."/dashboard");
            exit;
        }

        echo "<script>alert('Login gagal');</script>";
        require_once __DIR__ . '/../modules/auth/login.php';
    }

    public function logout() {
        session_unset();
        session_destroy();
        header("Location: ".BASE_URL."/login");
        exit;
    }
}
