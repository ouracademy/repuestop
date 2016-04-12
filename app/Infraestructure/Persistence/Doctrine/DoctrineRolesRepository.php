<?php

namespace App\Infraestructure\Persistence\Doctrine;

use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\PersonRepository;


class DoctrineRolesRepository implements PersonRepository {

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

    public function store(Roles $roles) {
        $this->em->persist($roles);
        $this->em->flush();
    }

}
