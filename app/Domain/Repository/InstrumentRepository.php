<?php namespace App\Domain\Repository;

interface InstrumentRepository{
    
    public function getAll();
    public function find($id);

    
}

