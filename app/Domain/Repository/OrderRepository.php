<?php namespace App\Domain\Repository;

/**
 *
 * @author pc
 */
interface OrderRepository {
    public function getAll();
    public function find($id);
    public function store($data);
    
}
