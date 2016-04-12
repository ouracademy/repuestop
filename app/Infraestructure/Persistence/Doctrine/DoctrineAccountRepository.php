<?php

namespace App\Infraestructure\Persistence\Doctrine;

use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Domain\Repository\AccountRepository;
use App\Domain\Entities\Account;

class DoctrineAccountRepository implements AccountRepository {

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

    public function store(Account $account) {
        $this->em->persist($account);
        $this->em->flush();
    }

    public function findByInstrumentAndParty($instrument, $party) {
        $this->genericRepository->findOneBy(['instrument' => $instrument,
                                                 'party'  => $party]);
    }

}
