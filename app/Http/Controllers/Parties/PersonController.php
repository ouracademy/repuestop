<?php

namespace App\Http\Controllers\Parties;

use App\Http\Controllers\Controller;
use App\Application\Parties\PersonService;
use Illuminate\Http\Request;
use Validator;

class PersonController extends Controller {

    private $service;

    public function __construct(PersonService $service) {
        $this->service = $service;
    }

    public function index() {
        return $this->service->getAll();
    }

    public function create() {
        $data = array(
            'firstName' => 'Rojo',
            'fatherLastName' => 'verde',
            'motherLastName' => 'amarillo',
            'identification' => '48448479',
 
        );
        $validator = Validator::make($data, [
                    'identification' => 'required|unique:App\Entities\Person,identification',
        ]);
       
        if ($validator->fails()) {
            return $validator->getMessageBag()->toJson();    
        }
        $this->service->store(
                $data['firstName'],
                $data['fatherLastName'],
                $data['motherLastName'],
                $data['identification'],
                $data['email'],
                $data['telephone'],
                $data['address']
                ); 
    }

}
