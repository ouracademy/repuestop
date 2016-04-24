<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;

use App\Application\RegisterAccount;
use App\Application\GetterAccounts;

class AccountDataController extends Controller {

    private $registerService;
    private $getterService;

    public function __construct(GetterAccounts $getter, RegisterAccount $register) {
        $this->getterService = $getter;
        $this->registerService = $register;
    }

    public function index() {
        return response()->json($this->getterService->takeAll());

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
        return response()->json($this->getterService->getAccountLinesFor($id));
    }

}
