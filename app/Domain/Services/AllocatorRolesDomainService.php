<?php

namespace App\Domain\Services;

use App\Domain\Entities\Role;
use App\Domain\Repository\PartyRepository;
use App\Domain\Repository\EntityRepository;
use App\Domain\Repository\RolesTypeRepository;



class AllocatorRolesDomainService {

    private $rolesRepository;
    private $partyRepository;
    private $rolesTypeRepository;
    private $entityRepository;
    public function __construct(
                    PartyRepository $partyRepository, 
                    RolesRepository $rolesRepository,
                    RolesTypeRepository $rolesTypeRepository,
                    EntityRepository $entityRepository
            
                ) {
        $this->partyRepository = $partyRepository;
        $this->rolesRepository = $rolesRepository;
        $this->rolesTypeRepository = $rolesTypeRepository;
        $this->entityRepository = $entityRepository;


    }

    public function assignate($partyId,$roleTypeName,$entityName) {
        $entity=$this->entityRepository->findByName($entityName);
        $party = $this->partyRepository->find($partyId);
        $roleType = $this->rolesTypeRepository->findByName($roleTypeName);
        $entityRole = new Role($party, $roleType, $entity);
        $this->rolesRepository->store($entityRole);
    }
    public function getPartyHouseProvider(){
        $roleType = $this->rolesTypeRepository->findOneByName('Owner');
        $entity = $this->entityRepository->findOneByName('Stock'); 
        $role = $this->rolesRepository->findByRoleTypeAndEntity($roleType ,$entity);
        return $role->getParty();
    }
 
   

}
