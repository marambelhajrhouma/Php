<?php
// userController.php
include_once('../model/user.php');
include_once('../database/config.php');

class UserController extends Connexion {

    function __construct() {
        parent::__construct();
    }

    function isUsernameAvailable($username) {
        $query = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$username]);
        $result = $stmt->fetch();
        return !$result;
    }

    function isEmailAvailable($email) {
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$email]);
        $result = $stmt->fetch();
        return !$result;
    }

    function createUser($username, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users(username, email, password) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($query);
        $result = $stmt->execute([$username, $email, $password]);

        if ($result) {
            // Fetch the newly created user
            $query = "SELECT * FROM users WHERE username = ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$username]);
            return $stmt->fetch();
        }

        return false;
    }

    function login($email, $password) {
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            // Login successful
            return $user;
        } else {
            // Login failed
            return false;
        }
    }

    //for the list of the users in admin list
    function getUserById($userId) {
        $query = "SELECT * FROM users WHERE iduser = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$userId]);
        return $stmt->fetch();
    }
}
?>
