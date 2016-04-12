<?php

namespace App\Http\Controllers\Accounts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Accounts\Stocks\StockService;
use App\Repository\QuantityRepository;
use App\Entities\Quantity;

class StockController extends Controller {

    private $service;
    private $repository;

    public function __construct(StockService $service, QuantityRepository $repository
    ) {
        $this->service = $service;
        $this->repository = $repository;
    }

    public function index() {
        return $this->service->getAll();
    }

    public function store(Request $request) {
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
        $data = json_decode($json);
        $partyId = $data->party;
        $orderLines = $data->body;
        $this->service->saveStock($partyId, TypeStock::Sales, $orderLines);
    }

    public function create() {
       
    }

}
