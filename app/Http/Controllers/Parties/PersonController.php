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
    public function store(Request $request){
         $data = array(
            'firstName' => $request->input('firstName'),
            'fatherLastName' => $request->input('fatherLastName'),
            'motherLastName' => $request->input('motherLastName'),
            'identification' => $request->input('identification'),
            'email' => $request->input('email'),
            'telephone' => $request->input('telephone'),
            'address' => $request->input('address'),
        );
         $validator = Validator::make($data, [
                    'identification' => 'required|unique:App\Domain\Entities\Person,identification,size:8',
                     'firstName' => 'required|regex:/(\b[^\d\W]+\b)/',
                     'fatherLastName' => 'required|regex:/(\b[^\d\W]+\b)/',
                     'motherLastName' => 'required|regex:/(\b[^\d\W]+\b)/',
                     'email' => 'required|email|unique:App\Domain\Entities\Party,email',
                     'telephone' => 'required|regex:/(\d*)/',
                      'address' => 'required'
                  
        ]);
       
        if ($validator->fails()) {
            return json_encode(["errors" =>  $validator->getMessageBag()->toArray()]);
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
        return json_encode(["message" => 'Se registro con exito los datos']);
    }
}
