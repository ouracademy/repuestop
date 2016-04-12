<?php namespace App\Infraestructure\Persistence\Doctrine;
use Doctrine\Common\Persistence\ObjectRepository;
use App\Domain\Repository\InstrumentRepository;


class DoctrineInstrumentRepository implements InstrumentRepository{
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
    
    
}

