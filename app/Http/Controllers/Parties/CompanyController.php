<?php

namespace App\Http\Controllers\Parties;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Application\Parties\CompanyService;
use Validator;

class CompanyController extends Controller {

    private $service;

    public function __construct(CompanyService $service) {

        $this->service = $service;
    }

    public function create() {
        $data = array(
            'name' => 'Repuestop',
            'ruc' => '45445545',
            'address' => 'Lima',
            'email' => 'a@gmail.com',
            'telephone' => 120,
        );
        $validator = Validator::make($data, [
                    'ruc' => 'required|unique:App\Entities\Person,identification',
                    'name' => 'required|unique:App\Entities\Company,name',
                    'email' => 'required|unique:App\Entities\Company,email',
        ]);

        if ($validator->fails()) {
            return $validator->getMessageBag()->toJson();
        }

        $this->service->store(
                $data['name'], $data['ruc'], $data['email'], $data['telephone'], $data['address']
        );
    }

    public function index() {
        return $this->service->getAll();
    }

}
