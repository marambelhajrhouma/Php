<?php
//file productContoller.php

include_once('../model/product.php');
include_once('../database/config.php');

class ProductController extends Connexion{

    function __construct() {
        parent::__construct();
    }

    function insert(Product $product, $photo) {
        $query = "INSERT INTO product(pname, price, quantity , description, photo) VALUES (?, ?, ?, ?, ?)";
        $res = $this->pdo->prepare($query);
    
        $array = array(
            $product->getPname(),
            $product->getPrice(),
            $product->getQuantity(), 
            $product->getDescription(),
            $photo,
        );
    
        return $res->execute($array);
    }

    function listProducts() {
        $query = "SELECT * FROM product";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    function delete($productId) {
        $query = "DELETE FROM product WHERE id = ?";
        $stmt = $this->pdo->prepare($query);
    
        $params = array($productId);
    
        return $stmt->execute($params);
    }

    // to edit
    function getProductById($id) {
        $query = "SELECT * FROM product WHERE id = ?";
        $res = $this->pdo->prepare($query);
        $res->execute(array($id));
        return $res->fetch();
    }

    function modify(Product $product) {
        $query = "UPDATE product SET pname = ?, price = ?, quantity = ?, description = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($query);

        $params = array(
            $product->getPname(),
            $product->getPrice(),
            $product->getQuantity(),
            $product->getDescription(),
            $product->getId(),
        );

        return $stmt->execute($params);
    }

   
} 
?>
	