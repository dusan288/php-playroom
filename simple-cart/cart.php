<?php

include('./cart-item.php');

class Cart {
    private $itemList;
    public function __construct() {
        if(isset($_SESSION['cart'])){
            $this->itemList = $_SESSION['cart'];
        } else {
            $this->itemList = [];
        }
    }
    public function addItem($name, $price) {
        $newCartItem = new CartItem($name, $price);
        $itemInCart = false;
        //check if item is in the cart
        for($i = 0; $i < count($this->itemList); $i++) {
            if($this->itemList[$i]->name == $name) {
                $this->itemList[$i]->incQuantity();
                $this->saveToSession();
                return;
            }
        }

        $this->itemList[] = $newCartItem;
        $this->saveToSession(); //persist data
    }
    public function saveToSession() {
        $_SESSION['cart'] = $this->itemList;
    }
    public function deleteCartFromSession() {
        $_SESSION['cart'] = [];
    }
    public function printCartList() {
        print_r($this->itemList);
    }

    public function getCartItems() {
        return $this->itemList;
    }
    public function getTotalPrice() {
        $totalPrice = 0;
        for($i = 0; $i < count($this->itemList); $i++) {
            $totalPrice += (float)$this->itemList[$i]->getPrice()*$this->itemList[$i]->quantity;
        }
        return $totalPrice;
    }
    public function removeItemFromCart($name) {
        $newCart = [];
        foreach($this->itemList as $item) {
            if($item->name != $name) {
                $newCart[] = $item;
            } else { //item found, decrement quantity if >1
                if($item->quantity > 1) {
                    $item->quantity--;
                    $newCart[] = $item;
                }
            }
        }
        $this->itemList = $newCart;
        $this->saveToSession();
    }
}