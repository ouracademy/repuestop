<?php

namespace App\Http\Controllers\Parties;

use App\Http\Controllers\Controller;
use App\Application\Parties\PersonService;
use App\Application\Parties\CompanyService;
use Illuminate\Http\Request;
use Validator;

class PartyController extends Controller {

    private $personService;
    private $companyService;

    public function __construct(PersonService $personService,CompanyService $companyService) {
        $this->personService = $personService;
        $this->companyService = $companyService;
    }

    public function verificate(Request $request) {
        $typeDocument = $request->input('type');
        $nroIdentification = $request->input('nro');
        
        switch($typeDocument){
            case "person": return $this->personService->find($nroIdentification);break;
            case "company": return $this->companyService->find($nroIdentification);break;
        } 
    }


}
