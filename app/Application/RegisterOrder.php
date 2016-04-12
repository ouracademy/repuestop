<?php

namespace App\Application;


use App\Domain\Repository\OrderRepository;
use App\Domain\Repository\InstrumentRepository;
use App\Domain\Repository\PartyRepository;
use App\Domain\Repository\UnitRepository;

use App\Domain\Entities\Order;
use App\Domain\Entities\LineOrder;

use App\Domain\Util\Date;
use Validator;

class RegisterOrder {

    private $orderRepository;
    private $partyRepository;
    private $instrumentRepository;

    private $messagesToClient;
    private $input;

    public function __construct(
          OrderRepository $repository, 
          PartyRepository $partyRepository, 
          InstrumentRepository $instrumentRepository,
          UnitRepository $unitRepository
    ) {
        $this->instrumentRepository = $instrumentRepository;
        $this->partyRepository = $partyRepository;
        $this->unitRepository = $unitRepository;
        $this->orderRepository = $repository;
        $this->messagesToClient = array();
        $this->input= array();
    }
    public function addInput($key,$value){
        $this->input[$key]=$value;
        return $this;
    }
    public function execute() 
    {
       $party = $this->partyRepository->find($this->input['party']);
       $order = new Order(Date::now(), null, $party,$this->input['status']);
        foreach ($this->input['body'] as $orderLine) {
            $instrument = $this->instrumentRepository->find($orderLine['product']);
            $unit = $this->unitRepository->findBySymbol($orderLine['unit']);
            $order->addLineOrder(new LineOrder($instrument, $orderLine['quantity'],'Sales',$unit));
        }
        $this->orderRepository->store($order);
        $this->messagesToClient['message']='Se registro la orden con exito';
     
      
    }
    public function isValidInput(){
         $validator = Validator::make($this->input, [
                    'party' => 'required|exists:App\Domain\Entities\Party,id',
        ]);

        if ($validator->fails()) {
            $this->messagesToClient['errors']=$validator->getMessageBag()->toArray;
            return false;
       }
       return true;
       
    }
    public function getMessageForClient(){
       
        return $this->messagesToClient;
    }
}
