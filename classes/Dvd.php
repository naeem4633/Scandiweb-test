<?php
require_once "Item.php";
class Dvd extends Item{
    private $size;

    function __construct($sku, $name, $price, $size){
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->size = $size;
    }

    function getAttributes(){
        return "$this->size MB";
    }
}
?>