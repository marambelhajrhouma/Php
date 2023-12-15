<?php

class Order
{
    protected $id, $iduser, $total, $products;

    public function __construct($id, $iduser, $total, $products)
    {
        $this->id = $id;
        $this->iduser = $iduser;
        $this->total = $total;
        $this->products = $products;
    }

    //
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getIduser()
    {
        return $this->iduser;
    }

    public function setIduser($iduser)
    {
        $this->iduser = $iduser;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setTotal($total)
    {
        $this->total = $total;
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function setProducts($products)
    {
        $this->products = $products;
    }
    
}
?>