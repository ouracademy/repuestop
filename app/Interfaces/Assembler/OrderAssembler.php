<?php

namespace App\Interfaces\Assembler;

use App\Interfaces\Serializables\Order as DTO;

/**
 *
 * @author pc
 */
class OrderAssembler {
  
    public function toDTO($item) {
        return new DTO(
                $item->getId(),
                $item->getParty()->getFullName(),
                $item->getTimeCharged()->format('d-m-y H:i'),
                is_null($item->getTimeBooked()) ? null :  $item->getTimeCharged()->format('d-m-y H:i'),
                $item->getStatus()   
        );
    }


}
