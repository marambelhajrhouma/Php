<?php
session_start();

if (!isset($_SESSION['iduser'])) {
    // Redirect to login page if the user is not authenticated
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_product'])) {
    $productId = $_POST['product_id'];

    include_once('../controller/basketController.php');
    $basketController = new BasketController();

    $userId = $_SESSION['iduser'];
    $basketController->removeProductFromBasket($userId, $productId);
}

header("Location: cart_action.php");
exit();
?>
