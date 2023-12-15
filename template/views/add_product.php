<!--add_product.php -->

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    include_once('../model/product.php');
    include_once('../database/config.php');
    include_once('../controller/productController.php');

    $productController = new ProductController();

    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];

    // Create a Product object
    $newProduct = new Product(null, $name, $price, $quantity,$description);

    // Insert the new product
    $productController->insert($newProduct);
}
?>
