<?php namespace App\Domain\Repository;

use App\Domain\Entities\Company;

interface CompanyRepository{
    
    public function getAll();
    public function find($id);
    public function store(Company $company);
    public function findByIdentification($identification);
  

    
}

