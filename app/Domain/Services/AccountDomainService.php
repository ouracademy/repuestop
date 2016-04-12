<?php namespace App\Domain\Services;

use App\Domain\Repository\AccountRepository;

class AccountDomainService{
    private $accountRepository;
    
    public function __construct(AccountRepository $accountRepository) {
        $this->accountRepository = $accountRepository;
   }
 
    public function getAccountOf($party,$instrument){
        
        return $this->AccountRepository->findByInstrumentAndParty($instrument, $party);
    }
 
}
