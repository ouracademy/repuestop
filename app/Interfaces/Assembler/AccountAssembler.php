<?php

namespace App\Interfaces\Assembler;

use App\Interfaces\Serializables\Account as DTO;

/**
 *
 * @author pc
 */
class AccountAssembler {

    public function toDTO($account) {
        return new DTO(
                $account->getId(), 
                $account->getParty()->getFullName(),
                $account->getInstrument()->getFullName(),
                $account->getQuantity()->getFullName() , 
                $account->getType()->getName()
              
        );
    }


}
