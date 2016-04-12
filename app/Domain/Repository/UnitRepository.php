<?php namespace App\Domain\Repository;

interface UnitRepository{
    
    public function getAll();
    public function find($id);
    public function findByName($name);
    public function findBySymbol($symbol);
    
}

