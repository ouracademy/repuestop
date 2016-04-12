<?php namespace App\Domain\Repository;

use App\Domain\Entities\Company;

interface EntityRepository{
    
    public function getAll();
    public function find($id);
    public function store(Company $company);
    public function findByArea($area);

    
}

