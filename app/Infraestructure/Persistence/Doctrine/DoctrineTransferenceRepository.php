<?php

namespace App\Infraestructure\Persistence\Doctrine;

use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\TransferenceRepository;
use App\Entities\Transference;

class DoctrineTransferenceRepository implements TransferenceRepository {

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

    public function store(Transference $data) {
        $this->em->persist($data);
        $this->em->flush();
    }

}
