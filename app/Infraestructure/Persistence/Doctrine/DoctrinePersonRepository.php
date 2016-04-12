<?php

namespace App\Infraestructure\Persistence\Doctrine;

use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Domain\Repository\PersonRepository;
use App\Domain\Entities\Person;

class DoctrinePersonRepository implements PersonRepository {

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

    public function store(Person $person) {
        $this->em->persist($person);
        $this->em->flush();
    }
    public function findByIdentification($identification){
        return $this->genericRepository->findOneBy(["identification"=>$identification]);
    }

}
