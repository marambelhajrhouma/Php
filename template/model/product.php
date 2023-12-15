<?php

class Product { 

protected $id,$pname, $price, $quantity, $description;

//
public function __construct($id,$pname,$price,$quantity,$description) {
    $this->id = $id;
    $this->pname = $pname;
    $this->price = $price;
    $this->quantity = $quantity;
    $this->description = $description;
}

// _____________________id_______________________

public function getId(){
    return $this->id;
}

public function setId($id) {
    $this->id = $id;
}

// _____________________pName_______________________

public function getPname() {
    return $this->pname;
}

public function setPname($pname) {
    $this->pname = $pname;
}

// _____________________Price_______________________


public function getPrice() {
    return $this->price;
}

public function setPrice($price) {
    $this->price = $price;
}

// _____________________Quantity_______________________
public function getQuantity() {
    return $this->quantity;
}

public function setQuantity($quantity) {
    $this->quantity = $quantity;
}

// _____________________description_______________________

public function getDescription(){
    return $this->description;
}

public function setDescription($description) {
    $this->description = $description;
}

}
?>