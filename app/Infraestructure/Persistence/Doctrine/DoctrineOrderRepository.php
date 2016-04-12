<?php

namespace App\Infraestructure\Persistence\Doctrine;

use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Domain\Repository\OrderRepository;

class DoctrineOrderRepository implements OrderRepository {

    private $genericRepository;
    private $em;

    public function __construct(ObjectRepository $genericRepository, EntityManagerInterface $em) {
        $this->genericRepository = $genericRepository;
        $this->em = $em;
    }

    public function getAll() {
        return $this->genericRepository->findAll();
    }

    public function find($id) {
        return $this->genericRepository->find($id);
    }

    public function getLines($status, $order) {
        return $this->genericRepository->findBy(['name' => $name]);
    }

    public function store($data) {
        $this->em->persist($data);
        $this->em->flush();
    }

}
