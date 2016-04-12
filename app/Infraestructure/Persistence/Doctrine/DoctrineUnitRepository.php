<?php namespace App\Infraestructure\Persistence\Doctrine;
use Doctrine\Common\Persistence\ObjectRepository;
use App\Domain\Repository\UnitRepository;


class DoctrineUnitRepository implements UnitRepository{
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
    public function findBySymbol($symbol){
        return $this->genericRepository->findOneBy(['symbol'=>$symbol]);
    }

}

