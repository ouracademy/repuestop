<?php

namespace App\Interfaces\Assembler;

use App\Interfaces\Serializables\Person as DTO;

/**
 * Description of Account
 *
 * @author pc
 */
class PersonAssembler {

    public function toDTO($person) {
        return new DTO(
                $person->getId(), 
                $person->getFirstName(), 
                $person->getFatherLastName(), 
                $person->getMotherLastName(), 
                $person->getIdentification(), 
                $person->getEmail(), 
                $person->getTelephone(),
                $person->getAddress()
        );
    }

}
