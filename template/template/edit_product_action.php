<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'], $_POST['pname'], $_POST['price'], $_POST['quantity'], $_POST['description'])) {
        include_once('../controller/productController.php');
        $productController = new ProductController();

        $productId = $_POST['id'];
        $pname = htmlspecialchars($_POST['pname']);
        $price = (float)$_POST['price'];
        $quantity = (int)$_POST['quantity'];
        $description = htmlspecialchars($_POST['description']);

        $product = $productController->getProductById($productId);

        if ($product) {
            $updatedProduct = new Product($productId, $pname, $price, $quantity, $description);

            // Update the product in the database
            $result = $productController->modify($updatedProduct);

            if ($result) {
                echo "Product updated successfully!";
                header("Location: admin_product_list.php");
                exit();
            } else {
                echo "Failed to update product.";
            }
        } else {
            echo "Product not found.";
        }
    } else {
        echo "Required fields not set.";
    }
} else {
    echo "Invalid request method.";
}
?>
