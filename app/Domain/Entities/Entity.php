<?php namespace App\Domain\Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use App\Domain\Entities\Role;
 
/**
 * @ORM\Entity
 * @ORM\Table(name="entities")
 * @ORM\HasLifecycleCallbacks()
 */
class Entity{
    /**
     * @var integer $id
     * @ORM\Column(name="id", type="integer", unique=true, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     */
    protected $id;
   
    /**
    * @ORM\OneToMany(targetEntity="Role", mappedBy="Entity", cascade={"persist"})
    * @var ArrayCollection|Role[]
    */
    protected $roles;

    /**
     * @ORM\Column(name="name",type="string")
     */
    protected $name;

    /**
     * @ORM\Column(name="description",type="string")
     */
    protected $description;

    /**
     * Entity constructor.

     * @param $name
     * @param $description
     */
    public function __construct( $name,$description)
    {
        $this->description = $description;
        $this->name = $name;
    }


    public function getId()
    {
        return $this->id;
    }
    public function addEntityRole(Role $entityRole)
    {
        if(! $this->roles->contains($entityRole)) 
        {
            $this->roles->add($entityRole);
        }
    }
    public function getRoles()
    {
        return $this->roles;
    }
}