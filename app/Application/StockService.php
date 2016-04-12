<?php

namespace App\Services\Accounts\Stocks;

use App\Repository\AccountRepository;
use App\Assembler\AccountAssembler;

class StockService {

    private $repository;
    private $assembler;

    public function __construct(AccountRepository $repository,
            AccountAssembler $assembler) {
        $this->repository = $repository;
        $this->assembler = $assembler;           
    }
    public function getAll(){
        $response= array();
        $collection = $this->repository->getAll();
        
        foreach ($collection as $item) {
            array_push($response, $this->assembler->toDTO($item)->toJson());
        }
        return json_encode($response);
      
    }
   

   



}
