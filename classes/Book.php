<?php
require_once "Item.php";
class Book extends Item{
    private $weight;

    function __construct($sku, $name, $price, $weight){
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->weight = $weight;
    }
    function getAttributes(){
        return "$this->weight KG";
    }
}
?>