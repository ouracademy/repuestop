<?php

namespace App\Interfaces\Assembler;

use App\Interfaces\Serializables\Instrument as DTO;

/**
 *
 * @author pc
 */
class InstrumentAssembler {

    public function toDTO($item) {
        return new DTO(
                $item->getId(),
                $item->getBrand()->getName(),
                $item->getProductDetail()->getCodeInter(), 
                $item->getProductDetail()->getCodeOwner(),
                $item->getProductDetail()->getDesignType() , 
                $item->getProductDetail()->getGireType(),    
                $item->getMeasurement()->getInterior(),
                $item->getMeasurement()->getExterior(),
                $item->getMeasurement()->getHeight(),
                $item->getProductDetail()->getApplication(), 
                $item->getPrice()
              
        );
    }


}
