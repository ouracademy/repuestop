<?php namespace App\Domain\Repository;

/**
 *
 * @author pc
 */
interface OrderLineRepository {
    public function findAll();
    public function find($id);
    public function getLines($status,$order);
    public function getOrderLines($orderId);
    
}
