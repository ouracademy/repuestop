<?php namespace App\Domain\Repository;
use App\Domain\Entities\Person;

interface PersonRepository{
    
    public function getAll();
    public function find($id);
    public function store(Person $person);
    public function findByIdentification($identification);
  
    
}

