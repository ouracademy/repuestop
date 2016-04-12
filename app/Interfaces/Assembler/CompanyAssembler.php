<?php

namespace App\Interfaces\Assembler;


use App\Interfaces\Serializables\Company as DTO;

/**
 *
 * @author pc
 */
class CompanyAssembler {

    public function toDTO( $company) {
        return new DTO(
                $company->getId(), 
                $company->getCurrentName(),
                $company->getRuc(), 
                $company->getEmail(), 
                $company->getTelephone(),
                $company->getAddress()
        );
    }

}
