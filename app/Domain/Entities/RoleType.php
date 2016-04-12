<?php namespace App\Domain\Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use App\Domain\Entities\Role;
 
/**
 * @ORM\Entity
 * @ORM\Table(name="role_type")
 * @ORM\HasLifecycleCallbacks()
 */
class RoleType{
    /**
     * @var integer $id
     * @ORM\Column(name="id", type="integer", unique=true, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     */
    protected $id;
 
    /**
     * @ORM\Column(type="string")
     */
    protected $description;
    
     /**
    * @ORM\OneToMany(targetEntity="Role", mappedBy="roleType", cascade={"persist"})
    * @var ArrayCollection|Role[]
    */
    protected $roles;
 

  
    public function __construct()
    {
    }
 
 
    public function geDescription()
    {
        return $this->description;
    }
 
    public function setDescription($description)
    {
        $this->description = $description;
    }
 
  
   

    public function getRoles()
    {
        return $this->orders;
    }
}