<?php

namespace App\Application;

use App\Domain\Repository\OrderRepository;
use App\Interfaces\Assembler\Assembler;
use App\Interfaces\Assembler\OrderAssembler;
use App\Interfaces\Assembler\OrderLineAssembler;

use App\Domain\Repository\OrderLineRepository;
    


class GetterOrders {

    private $orderRepository;
    private $orderLineRepository;         
    private $input;
    private $output;
    private $assembler;
    private $orderLineAssembler;

    public function __construct(
    OrderRepository $repository,
    OrderLineRepository $orderLineRepository,
    OrderAssembler $assembler,
    OrderLineAssembler $orderLineAssembler
    ) {
        $this->orderRepository = $repository;
        $this->orderLineRepository =$orderLineRepository;
        $this->input = array();
        $this->assembler = $assembler;
        $this->orderLineAssembler = $orderLineAssembler;
        $this->output = new Assembler();
    }

    public function takeAll() {
        $this->output->assemble(
                $this->orderRepository->getAll(), 
                $this->assembler, 
                'orders');
        return $this->output->getData();

   }
   public function getOrderLinesFor($id){
        $this->output->assemble(
                $this->orderLineRepository->getOrderLines($id), 
                $this->orderLineAssembler, 
                'orderLines');
        return $this->output->getData();
  }

}
