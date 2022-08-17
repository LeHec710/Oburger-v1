<?php

class Burger {
    
    // variables
    public $name;
    public $price;
    public $image;
    public $description;
    
    // constructor
    public function __construct(string $name, int $price, string $image) {
        $this->name = $name;
        $this->price = number_format($price, 2);
        $this->image = $image;
    }
    
    // getter and setter for name
    public function getName() {return $this->name;}
    public function setName(string $name) {$this->name = $name;}
    
    // getter and setter for price
    public function getPrice() {return $this->price;}
    public function setPrice(string $price) {$this->price = number_format($price, 2);}
    
    // getter and setter for description
    public function getDescription() {return $this->description;}
    public function setDescription(string $description) {$this->description = $description;}
    
    // getter and setter for image
    public function getImage() {return $this->image;}
    public function setImage(string $image) {$this->image = $image;}
    
}

?>