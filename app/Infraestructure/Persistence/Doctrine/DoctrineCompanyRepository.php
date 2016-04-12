<?php

namespace App\Infraestructure\Persistence\Doctrine;

use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Domain\Repository\CompanyRepository;
use App\Domain\Entities\Company;

class DoctrineCompanyRepository implements CompanyRepository {

    private $genericRepository;
    private $em;
    public function __construct(
    ObjectRepository $genericRepository, EntityManagerInterface $em) {
        $this->genericRepository = $genericRepository;
        $this->em = $em;
    }
    public function getAll() {
        return $this->genericRepository->findAll();
    }
    public function find($id) {
        return $this->genericRepository->find($id);
    }
    public function store(Company $company) {
        $this->em->persist($company);
        $this->em->flush();
    }
    public function findByIdentification($identification) {
        return $this->genericRepository->findOneBy(["ruc" => $identification]);
    }
}
