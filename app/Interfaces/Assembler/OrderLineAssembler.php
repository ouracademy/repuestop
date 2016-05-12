<?php

namespace App\Interfaces\Assembler;

use App\Interfaces\Serializables\OrderLine as DTO;

/**
 *
 * @author pc
 */
class OrderLineAssembler {
  
    public function toDTO($item) {
        return new DTO(
                $item->getInstrument()->getFullName(),
                $item->getQuantity(),
                'U',
                $item->getOfferedPrice(),
                $item->getStatus(),
                $item->getType()  
        );
    }


}
