<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repository\OrderRepository;
use App\Services\OrderService;
use App\Domain\Order\TypeOrder;

class AccountController extends Controller {
    private $orderRepository;
    private $service;

    public function __construct(OrderRepository $orderRepository,OrderService $service) {
        //$this->middleware('auth');
        $this->orderRepository=$orderRepository;
        $this->service=$service;
    }

    public function index() {

        return view('AccessWithCredentials/order/create');

    }

    public function store(Request $request) 
    {
        //TODO : Get json from view
       // $objects = json_decode($request->input('data'));
             $json = '{ "total": 100,
                    "party":1,
                    "type":"Sales",
                          "body": [
                              {"product": 10, "quantity": 10 },
                              {"product": 2, "quantity": 11 },
                              {"product": 3, "quantity": 12 }
                            ]
                          }';
         $data=json_decode($json);
         $partyId=$data->party;
         $orderLines=$data->body;
         $this->service->saveOrder($partyId,TypeOrder::Sales,$orderLines);
       

   
    }
    public function create() 
    {
     
  
    }

}
