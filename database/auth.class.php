<?php
session_start();
require_once 'database.class.php';
class Auth extends Database {
    private $conn;
    public function __construct() {
        $this->conn = $this->connect();
    }
    public function register($username, $email, $password) {
        $checkEmail = "SELECT * FROM user WHERE email = :email";
        $stmt = $this->conn->prepare($checkEmail);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return ['success' => false, 'message' => 'Email already exists.'];
        }

        $checkUsername = "SELECT * FROM user WHERE username = :username";
        $stmt = $this->conn->prepare($checkUsername);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return ['success' => false, 'message' => 'Username already exists.'];
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO user (email, username, password, role) VALUES (:email, :username, :password, 'user')";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        if ($stmt->execute()) {
            $_SESSION['user_id'] = $this->conn->lastInsertId();
            return ['success' => true, 'message' => 'Registration successful.'];
        } else {
            return ['success' => false, 'message' => 'An error occurred during registration.'];
        }
    }
    public function login($email, $password) {
        $sql = "SELECT * FROM user WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return ['success' => false, 'message' => 'Email does not exist.'];
        }

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            return [
                'success' => true,
                'message' => 'Login successful.',
                'user' => $user
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Password is incorrect.'
            ];
        }
    }
}
?>