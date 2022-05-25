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

    function setLength($length){
        $this->length = $length;
    }
    function getLength(){
        return $this->length;
    }
    function setWidth($width){
        $this->width = $width;
    }
    function getWidth(){
        return $this->width;
    }
    function setHeight($height){
        $this->height = $height;
    }
    function getHeight(){
        return $this->height;
    }
    function getAttributes(){
        return "$this->height x $this->width x $this->length";
    }
}
?>