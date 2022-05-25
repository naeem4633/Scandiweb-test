<?php
abstract class Item{
    protected $sku;
    protected $name;
    protected $price;
    protected $type;


    function setSku($sku){
        $this->sku = $sku;
    }
    function getSku(){
        return $this->sku;
    }
    function setName($name){
        $this->name = $name;
    }
    function getName(){
        return $this->name;
    }
    function setPrice($price){
        $this->price = $price;
    }
    function getPrice(){
        return $this->price;
    }
    abstract function getAttributes();
}
?>