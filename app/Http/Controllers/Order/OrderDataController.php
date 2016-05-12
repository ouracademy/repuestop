<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;

use App\Application\RegisterOrder;
use App\Application\GetterOrders;

use Illuminate\Http\Request;

class OrderDataController extends Controller {

    private $registerService;
    private $getterService;

    public function __construct(GetterOrders $getter, RegisterOrder $register) {
        $this->getterService = $getter;
        $this->registerService = $register;
    }

    public function index() {
        return json_encode($this->getterService->takeAll());
        //return $this->getterService->takeOnlyCreated
    }

    public function store(Request $request) {
        $this->registerService
                        ->addInput('party', $request->input('party'))
                        ->addInput('body', $request->input('body'))
                        ->addInput('status', $request->input("status"));
        if ($this->registerService->isValidInput()) {
            $this->registerService->execute();
        }
        return json_encode(["response" => $this->registerService->getMessageForClient()]);
    }
    public function show($id){
        return response()->json($this->getterService->getOrderLinesFor($id));
    }

}
