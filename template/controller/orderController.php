<?php
include_once('../database/config.php');

class OrderController extends Connexion
{
    function __construct()
    {
        parent::__construct();
    }

    function addOrder($userId, $total, $products)
    {
        $query = "INSERT INTO `order` (iduser, total, products) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$userId, $total, $products]);
        // Return the ID of the inserted order
        return $this->pdo->lastInsertId();
    }

    
    function getUsersWithOrders()
    {
        $query = "SELECT DISTINCT iduser FROM `order`";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getAllOrders()
    {
        $query = "SELECT * FROM `order`";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function deleteUserOrder($userId)
    {
    $query = "DELETE FROM `order` WHERE iduser = ?";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute([$userId]);
    }
}
?>
