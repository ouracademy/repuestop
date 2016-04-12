<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\OrderRepository;
use App\Services\Transferences\TransferenceService;
use App\Repository\AccountRepository;
use App\Domain\Quantity\Quantity;

class TransferenceController extends Controller {

    private $orderRepository;
    private $accountRepository;
    private $service;
    private $quantity;

    public function __construct(
    OrderRepository $orderRepository, TransferenceService $service, AccountRepository $accountRepository, Quantity $quantity) {
        $this->orderRepository = $orderRepository;
        $this->accountRepository = $accountRepository;
        $this->service = $service;
        $this->quantity = $quantity;
    }

    public function index() {
        
    }

    public function store(Request $request) {
        
    }

    public function create() {
        $json = '{
            "order":3,
            "quantity":{ 
                        "unit": "U",
                        "amount":10
                       },
            "from":2,
            "to":3
               }';
        $data = json_decode($json);
      //  dd($data);
        $orderId = $data->order;
        $toId = $data->to;
        $fromId = $data->from;
        $amount= $data->quantity->amount;
        $unit = $data->quantity->unit;
        
        $to = $this->accountRepository->find($toId);
        $from = $this->accountRepository->find($fromId);
        $order = $this->orderRepository->find($orderId);
        $quantity = $this->quantity->getQuantity($unit,$amount);

        $this->service->executeTransference($to,$from,$quantity, $order);
    }

}
