<?php
require_once "Item.php";
class Furniture extends Item{
    private $length;
    private $width;
    private $height;

    function __construct($sku, $name, $price, $length, $width, $height){
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
    }

    function getAttributes(){
        return "$this->height x $this->width x $this->length";
    }
}
?>