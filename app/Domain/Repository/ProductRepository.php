<?php namespace App\Domain\Repository;

/**
 *
 * @author pc
 */
interface ProductRepository {
    public function getAll();
    public function find($id);

    
}
