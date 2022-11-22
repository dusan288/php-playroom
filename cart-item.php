<?php

include('./item.php');

class CartItem extends Item {
    public $quantity;
    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = 1;
    }
    public function incQuantity() {
        $this->quantity++;
    } 
    public function getPrice() {
        return $this->price;
    }
}