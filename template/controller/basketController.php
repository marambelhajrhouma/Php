<?php
include_once('../model/basket.php');
include_once('../database/config.php');

class BasketController extends Connexion
{
    function __construct()
    {
        parent::__construct();
    }

    function addToBasket($userId, $productId, $quantity)
    {
        $query = "INSERT INTO user_basket (iduser, id, quantity) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$userId, $productId, $quantity]);
        var_dump($stmt->errorInfo());

    }

    //to add in page cart.php
    function getBasketProducts($userId)
    {
        $query = "SELECT p.id, p.pname AS name, p.price, b.quantity, (p.price * b.quantity) as total
        FROM product p
        JOIN user_basket b ON p.id = b.id
        WHERE b.iduser = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

        
    }

    function removeProductFromBasket($userId, $productId)
    {
        $query = "DELETE FROM user_basket WHERE iduser = ? AND id = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$userId, $productId]);
        var_dump($stmt->errorInfo());
    }

    function clearBasket($userId)
    {
        $query = "DELETE FROM user_basket WHERE iduser = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$userId]);
    }
}
?>
