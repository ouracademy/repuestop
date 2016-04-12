<?php namespace App\Domain\Entities;

use Doctrine\ORM\Mapping as ORM;

 
/**
 * @ORM\Entity
 * @ORM\Table(name="product_type")
 * @ORM\HasLifecycleCallbacks()
 */
class Type{
    /**
     * @var integer $id
     * @ORM\Column(name="id", type="integer", unique=true, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     */
    protected $id;
 
    /**
     * @ORM\Column(type="string",unique=true,nullable=true)
     */
    protected $name;
    
  
 
    public function __construct($name)
    {
        $this->name=$name;
    }
 
    public function getId()
    {
        return $this->id;
    }
 
    public function getName()
    {
        return $this->name;
    }
 
    public function setInterior($name)
    {
        $this->name = $name;
    }
  
}