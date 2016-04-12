<?php namespace App\Domain\Repository;

/**
 *
 * @author pc
 */
use App\Domain\Entities\Transference;
interface TransferenceRepository {
    public function getAll();
    public function find($id);
    public function store (Transference $data);
 
}
