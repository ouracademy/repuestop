<?php namespace App\Domain\Repository;

/**
 *
 * @author pc
 */
use App\Domain\Entities\Quantity;

interface QuantityRepository {
    public function getAll();
    public function find($id);
    public function findByUnitAndAmount($unit,$amount);
    public function store(Quantity $entity);
 
}
