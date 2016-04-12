<?php

namespace App\Interfaces\Assembler;

use App\Interfaces\Serializables\Brand as DTO;

/**
 *
 * @author pc
 */
class BrandAssembler {

    public function toDTO($item) {
        return new DTO(
                $item->getId(),
                $item->getName()
                     
        );
    }


}
