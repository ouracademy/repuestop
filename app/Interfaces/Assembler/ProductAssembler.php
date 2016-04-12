<?php

namespace App\Interfaces\Assembler;

use App\Interfaces\Serializables\Product as DTO;

/**
 *
 * @author pc
 */
class ProductAssembler {

    public function toDTO($item) {
        return new DTO(
                $item->getId(),
                $item->getBrand()->getName(),
                $item->getCodeInter(), 
                $item->getCodeOwner(),
                $item->getDesignType() , 
                $item->getGireType(),    
                $item->getMeasurement()->getInterior(),
                $item->getMeasurement()->getExterior(),
                $item->getMeasurement()->getHeight(),
                $item->getApplication(), 
                $item->getPrice()
              
        );
    }


}
