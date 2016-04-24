<?php

namespace App\Application;

use App\Domain\Repository\AccountRepository;
use App\Interfaces\Assembler\Assembler;
use App\Interfaces\Assembler\AccountAssembler;

    


class GetterAccounts {

    private $accountRepository;      
    private $input;
    private $output;
    private $assembler;

    public function __construct(
    AccountRepository $repository,
    AccountAssembler $assembler
    ) {
        $this->accountRepository = $repository;
        $this->input = array();
        $this->assembler = $assembler;
        $this->output = new Assembler();
    }

    public function takeAll() {
        $this->output->assemble(
                $this->accountRepository->getAll(), 
                $this->assembler, 
                'accounts');
        return $this->output->getData();

   }
 

}
