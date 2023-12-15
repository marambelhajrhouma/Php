<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        include_once('../controller/userController.php');
        $userController = new UserController();

        // Attempt to login
        $user = $userController->login($email, $password);

        if ($user) {
            session_start();
            $_SESSION['iduser'] = $user['iduser'];
            header('Location: index_user.php');
            exit();
        } else {
            header('Location: login.php?error=1');
            exit();
        }
    } else {
        header('Location: login.php?error=2'); 
        exit();
    }
} else {
    header('Location: login.php?error=3'); 
    exit();
}
?>
