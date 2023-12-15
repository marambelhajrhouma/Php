<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include necessary files
    include_once('../controller/userController.php');
    $userController = new UserController();

    // Get user input from the form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Validate passwords match
    if ($password !== $confirmPassword) {
        echo "Passwords do not match.";
        exit();
    }

    // Check if the username and email are available
    if ($userController->isUsernameAvailable($username) && $userController->isEmailAvailable($email)) {
        // Hash the password before storing it
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Create a new user
        $user = $userController->createUser($username, $email, $hashedPassword);

        if ($user) {
            echo "User registration successful. You can now login.";
            header("Location: index.php");
            exit(); 
        } else {
            echo "Failed to register user.";
        }
    } else {
        echo "Username or email is already taken.";
    }
} else {
    // Invalid request method
    echo "Invalid request method.";
}
?>
