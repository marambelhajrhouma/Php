<!-- delete_product.php -->
<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        $productId = $_GET['id'];

        include_once('../controller/productController.php');
        $productController = new ProductController();

        $deleted = $productController->delete($productId);

        if ($deleted) {
            header("Location: admin_product_list.php");
            exit();
        } else {
            echo "Error deleting the product.";
        }
    } else {
        echo "Product ID not provided.";
    }
} else {
    echo "Invalid request method.";
}
?>
