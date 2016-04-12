<?php

namespace App\Infraestructure\Persistence\Doctrine;

use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\QuantityRepository;
use App\Entities\Quantity;

class DoctrineQuantityRepository implements QuantityRepository {

    private $genericRepository;
    private $em;

    public function __construct(
            ObjectRepository $genericRepository,
            EntityManagerInterface $em) {
        $this->genericRepository = $genericRepository;
        $this->em = $em;
    }

    public function getAll() {
        return $this->genericRepository->findAll();
    }

    public function find($id) {
        return $this->genericRepository->find($id);
    }

    public function store(Quantity $quantity) {
        $this->em->persist($quantity);
        $this->em->flush();
        return $quantity;
    }

    public function findByUnitAndAmount($unit,$amount) {
        return $this->genericRepository->findOneBy(['amount' => $amount,
                                                 'unit'=>$unit]);   
    }

}
