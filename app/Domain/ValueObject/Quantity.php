<?php namespace App\Domain\ValueObject;


class Quantity{
    private $amount;
    private $unit;
    
    public function __construct($amount,$unit) {
        $this->amount = $amount;
        $this->unit = $unit;
    }

}
