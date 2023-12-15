<?php

class Basket
{
    protected $idbasket, $idUser, $id, $quantity;

    public function __construct($idbasket, $iduser, $id, $quantity)
    {
        $this->idbasket = $idbasket;
        $this->iduser = $iduser;
        $this->id = $id;
        $this->quantity = $quantity;
    }

    // _____________________id basket_______________________
    public function getIdBasket()
    {
        return $this->idbasket;
    }

    public function setIdBasket($idbasket)
    {
        $this->idbasket = $idbasket;
    }

    // _____________________id user_______________________
    public function getIduser()
    {
        return $this->iduser;
    }

    public function setIduser($iduser)
    {
        $this->iduser = $iduser;
    }

    // _____________________id product_______________________
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    // _____________________Quantity_______________________
    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }
}
?>
