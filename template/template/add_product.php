<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once('../model/product.php');
    include_once('../database/config.php');
    include_once('../controller/productController.php');
    $productController = new ProductController();

    $pname = $_POST['pname'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];

    $photo = ''; 
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
        $targetDir = '../uploads/'; 
        $targetFile = $targetDir . basename($_FILES['photo']['name']);

        // Debugging: Print file information
        var_dump($_FILES);

        // Check if the file already exists
        if (file_exists($targetFile)) {
            echo "Sorry, the file already exists.";
        } else {
            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetFile)) {
                $photo = $targetFile; // Set the file path
            } else {
                // Debugging: Print file upload error
                echo "Sorry, there was an error uploading your file: " . $_FILES['photo']['error'];
            }
        }
    }

    echo "Product Information: ";
    print_r([$pname, $price, $quantity, $description]);

    echo "File Information: ";
    print_r($photo);

    // Create a Product object
    $newProduct = new Product(null, $pname, $price, $quantity, $description);

    // Insert the new product
    $productController->insert($newProduct, $photo);

    // Redirect to index.php
    header("Location: ../template/index.php");
    exit();
}
?>
