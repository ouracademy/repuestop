<?php

namespace App\Application\Parties;

use App\Domain\Repository\PersonRepository;
use App\Domain\Entities\Person;
use App\Interfaces\Assembler\PersonAssembler;
use App\Interfaces\Assembler\Assembler;

class PersonService {

    private $repository;
    private $assembler;
    private $output;

    public function __construct(PersonRepository $repository, PersonAssembler $assembler) {
        $this->repository = $repository;
        $this->assembler = $assembler;
        $this->output = new Assembler();
    }

    public function getAll() {
        $this->output->assemble($this->repository->getAll(),$this->assembler,'persons');
        return $this->output->getDataInJsonFormat();
      
    }
    public function store($firstName, $fatherLastName, $motherLastName, $identification, $email, $telephone, $address) {
        $person = new Person($firstName, $fatherLastName, $motherLastName, $identification, $email, $telephone, $address);
        $this->repository->store($person); 
    }
    public function find($nroIdentification){
        if($this->exists($nroIdentification)){
           $this->output->assembleItem($this->repository->findByIdentification($nroIdentification),$this->assembler,'party');
           return $this->output->getDataInJsonFormat(); 
        }
        return null;
        
    }
    public function exists($nroIdentification){
        if(is_null($this->repository->findByIdentification($nroIdentification))){
            return false;
        }
        return true;
    }
}
