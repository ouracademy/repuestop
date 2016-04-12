<?php

namespace App\Application\Parties;

use App\Domain\Repository\CompanyRepository;
use App\Domain\Entities\Company;
use App\Interfaces\Assembler\CompanyAssembler;
use App\Interfaces\Assembler\Assembler;

class CompanyService {

    private $repository;
    private $assembler;
    private $output;

    public function __construct(CompanyRepository $repository, CompanyAssembler $assembler) {
        $this->repository = $repository;
        $this->assembler = $assembler;
        $this->output = new Assembler();
    }

    public function getAll() {
        $response = array();
        $collection = $this->repository->getAll();
        foreach ($collection as $item) {
            array_push($response, $this->assembler->toDTO($item)->toJson());
        }
        return json_encode($response);
    }

    public function store($name, $ruc, $email, $telephone, $address) {
        $company = new Company($name, $ruc, $email, $telephone, $address);
        $this->repository->store($company);
    }

    public function digestInput() {
        
    }

    public function exists($nroIdentification) {
        return $this->repository->findByIdentification($nroIdentification);
    }

    public function find($nroIdentification) {
        if ($this->exists($nroIdentification)) {
            $this->output->assembleItem($this->repository->findByIdentification($nroIdentification), $this->assembler, 'party');
            return $this->output->getDataInJsonFormat();
        }
        return null;
    }

}
