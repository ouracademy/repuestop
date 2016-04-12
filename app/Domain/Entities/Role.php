<?php namespace App\Domain\Entities;

use Doctrine\ORM\Mapping as ORM;

use App\Domain\Entities\Party;
use App\Domain\Entities\RoleType;
use App\Domain\Entities\Entity;
 
/**
 * @ORM\Entity
 * @ORM\Table(name="entity_role")
 * @ORM\HasLifecycleCallbacks()
 */
class Role{
   /** 
    * @ORM\Id
    * @ORM\JoinColumn(name="entities_id", referencedColumnName="id")
    * @ORM\ManyToOne(targetEntity="Entity", inversedBy="roles")
    */
    private $entity;
    
    /** 
    * @ORM\Id
    * @ORM\JoinColumn(name="parties_id", referencedColumnName="id")
    * @ORM\ManyToOne(targetEntity="Party", inversedBy="roles")
    * @var Party
    */
    private $party;
 
     /** 
    * @ORM\Id
    * @ORM\JoinColumn(name="roleType_id", referencedColumnName="id")
    * @ORM\ManyToOne(targetEntity="RoleType", inversedBy="roles")
    */
    protected $roleType;
    
    
 
     /**
     * @ORM\Column(name="from_date",type="datetime",nullable=true)
     */
    protected $fromDate;
     /**
     * @ORM\Column(name="thru_date",type="datetime",nullable=true)
     */
    protected $thruDate;
    

    public function __construct(
            Party $party,
            RoleType $roleType,
            Entity $entity  )
    {
        $this->party=$party;
        $this->roleType=$roleType;
        $this->entity=$entity;
    }
 


    public function getParty(){
        return $this->party;
    }
    
    public function getRoleType(){
        return $this->roleType;
    }
    
    public function getEntity(){
        return $this->entity;
    }
    

}