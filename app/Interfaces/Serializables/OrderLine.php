<?php

namespace App\Interfaces\Serializables;

class OrderLine extends Serializable {

    public $product;
    public $quantity;
    public $unit;
    public $offeredPrice;
    public $status;
    public $type;

    public function __construct($product, $quantity, $unit, $offeredPrice, $status, $type) {
        $this->product = $product;

        $this->quantity = $quantity;

        $this->unit = $unit;
        
        $this->offeredPrice = $offeredPrice;

        $this->status = $status;
        
        $this->type = $type;
    }

}
