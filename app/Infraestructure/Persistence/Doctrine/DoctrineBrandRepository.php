<?php namespace App\Infraestructure\Persistence\Doctrine;
use Doctrine\Common\Persistence\ObjectRepository;
use App\Domain\Repository\BrandRepository;


class DoctrineBrandRepository implements BrandRepository{
    private $genericRepository;

    public function __construct(ObjectRepository $genericRepository)
    {
        $this->genericRepository = $genericRepository;
    }
    public function getAll()
    {
        return $this->genericRepository->findAll();
    }
  
    public function find($id){
        return $this->genericRepository->find($id);
    }

    public function findByName($name) {
        return $this->genericRepository->findBy(['name' => $name]);
    }

}

