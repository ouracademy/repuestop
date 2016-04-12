<?php

namespace App\Interfaces\Serializables;


class Product extends Serializable {

    public $id;
    public $brand;
    public $codeInter;
    public $codeOwner;
    public $designType;
    public $gireType;
    public $measureIn;
    public $measureOut;
    public $measureHeight;
    public $application;
    public $price;

    public function __construct($id, $marca, $codeInter, $codeOwner, $designType, 
            $gireType, $measureIn, $measureOut, $measureHeight, $application, $price) {
        $this->id = $id;
        $this->brand = $marca;
        $this->codeInter = $codeInter;
        $this->codeOwner = $codeOwner;
        $this->designType = $designType;
        $this->gireType = $gireType;
        $this->measureIn = $measureIn;
        $this->measureOut = $measureOut;
        $this->measureHeight = $measureHeight;
        $this->application = $application;
        $this->price = $price;
    }

}
