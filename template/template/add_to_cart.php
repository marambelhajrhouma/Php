<?php
session_start();

if (!isset($_SESSION['iduser'])) {
    // Redirect to login page if the user is not authenticated
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        $productId = $_GET['id'];

        include_once('../controller/productController.php');
        include_once('../controller/basketController.php');

        $productController = new ProductController();
        $basketController = new BasketController();

        $product = $productController->getProductById($productId);

        if ($product) {
            $userId = isset($_SESSION['iduser']) ? $_SESSION['iduser'] : null;
            $basketController->addToBasket($userId, $productId, 1); // Assuming quantity is 1

            header("Location: ../template/cart_action.php");
            exit();
        } else {
            // Product not found
            echo "Product not found.";
        }
    } else {
        // Product ID not provided
        echo "Product ID not provided.";
    }
} else {
    // Invalid request method
    echo "Invalid request method.";
}
?>
