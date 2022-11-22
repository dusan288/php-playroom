<?php

class Item {
    public $name;
    protected $price;
    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }
}
