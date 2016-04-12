<?php namespace App\Domain\Repository;

/**
 *
 * @author pc
 */
interface AccountRepository {
    public function getAll();
    public function find($id);
    public function findByInstrumentAndParty($instrument,$party);

    
}
