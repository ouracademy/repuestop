<?php

namespace App\Infraestructure\Persistence\Doctrine;

use Doctrine\Common\Persistence\ObjectRepository;
use App\Domain\Repository\OrderLineRepository;

class DoctrineOrderLineRepository implements OrderLineRepository {

    private $genericRepository;

    public function __construct(ObjectRepository $genericRepository) {
        $this->genericRepository = $genericRepository;
    }

    public function getLines($status, $order) {
        return $this->genericRepository->findBy(
                        ['orders_id' => $order->getId(),
                            'status' => $status
        ]);
    }

    public function getOrderLines($orderId) {
        return $this->genericRepository->findBy([
                    'order' => $orderId
        ]);
    }

    public function find($id) {
        
    }

    public function findAll() {
        
    }

}
