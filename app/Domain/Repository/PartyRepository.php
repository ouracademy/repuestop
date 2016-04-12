<?php namespace App\Domain\Repository;

/**
 *
 * @author pc
 */
interface PartyRepository {
    public function getAll();
    public function find($id);

    
}
