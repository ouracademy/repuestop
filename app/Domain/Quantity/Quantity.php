<?php namespace App\Domain\Quantity;

use App\Repository\QuantityRepository;
use App\Repository\UnitRepository;
use App\Entities\Quantity as Entity ;

class Quantity{
    private $quantityRepository;
    private $unitRepository;
    
    public function __construct(QuantityRepository $qRepository,UnitRepository $uRepository) {
        $this->quantityRepository = $qRepository;
        $this->unitRepository = $uRepository;
    }
    public function getQuantity($symbol,$amount){
        $unit = $this->unitRepository->findBySymbol($symbol);
        $object = $this->quantityRepository->findByUnitAndAmount($unit->getId(),$amount);
        if(is_null($object)){
            $object = $this->quantityRepository->store(new Entity($amount,$unit));
        }
        return  $object;
        
    }
 
}
