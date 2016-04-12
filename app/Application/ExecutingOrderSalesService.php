<?php

namespace App\Services;

use App\Domain\Entities\Order;
use App\Domain\Entities\Quantity;

use App\Domain\Services\TransferenceDomainService;
use App\Domain\Services\AccountDomainService;
use App\Domain\Services\AllocatorRolesDomainService;

class ExecutingOrderSalesService {

    private $transferenceService;
    private $roleService;
    private $accountService;
    private $currentOrder;
    private $partyReceiver;
    private $partyProvider;
    private $results;

    public function __construct(
          TransferenceDomainService $transferenceService,
          AccountDomainService $accountService,
          AllocatorRolesDomainService $roleService
    ) 
    {
        $this->transferenceService = $transferenceService;
        $this->accountService = $accountService;
        $this->roleService = $roleService;
        $this->results= array();
    }
    public function setOrderToExecute(Order $order){
        $this->currentOrder = $order;
        $this->partyReceiver = $order->getParty(); 
        $this->partyProvider = $this->roleService->getPartyHouseProvider();
    }

    public function execute(){
        $orderLines = $this->currentOrder->getOrderLinesByStatus('Created');
        foreach($orderLines as $line){
           $instrument = $line->getInstrument();
           $from = $this->accountService->getAccountOf($this->partyProvider,$instrument);
           $to = $this->accountService->getAccountOf($this->partyReceiver,$instrument);
           $quantity =  new Quantity($line->getAmount(),$line->getUnit());
           $result = $this->transferenceService->execute($to, $from,$quantity, $this->currentOrder);
           array_push($this->results,$result);
       }
       return $this->results;
        
    } 

}
