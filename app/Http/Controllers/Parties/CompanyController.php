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
    
    public function store(Request $request){
        $data = array(
            'name' => $request->input('name'),
            'identification' => $request->input('identification'),
            'email' => $request->input('email'),
            'telephone' => $request->input('telephone'),
            'address' => $request->input('address'),
        );
         $validator = Validator::make($data, [
                    'identification' => 'required|unique:App\Domain\Entities\Company,ruc|size:11',
                    'email' => 'required|email|unique:App\Domain\Entities\Party,email',
                    'telephone' => 'required|regex:/(\d*)/',
                    'name' => 'required|regex:/(\b[^\d\W]+\b)/|unique:App\Domain\Entities\Company,name',
                    'address' => 'required'
                     
                    
        ]);
       
        if ($validator->fails()) {
            return json_encode(["errors" =>  $validator->getMessageBag()->toArray()]);
        }
        $this->service->store(
                $data['name'],
                $data['identification'],
                $data['email'],
                $data['telephone'],
                $data['address']
                ); 
        return json_encode(["messageOK" => 'Se registro con exito los datos']);
    }

}
