<?php namespace App\Domain\Entities;

use Doctrine\ORM\Mapping as ORM;

use App\Domain\Entities\Party;
 
/**
 * @ORM\Entity
 * @ORM\Table(name="companies")
 * @ORM\HasLifecycleCallbacks()
 */
class Company extends Party{

 
    /**
     * @ORM\Column(name="current_name" ,type="string")
     *
     */
    protected $name;



    /**
     * @ORM\Column(name="ruc",type="string")
     */
    protected $ruc;

    /**
     * Company constructor.
     * @param int $id
     */
    public function __construct($currentName,$ruc,$email,$telephone,$address)
    {
        parent::__construct($email,$telephone,$address);
        $this->ruc = $ruc;
        $this->name=$currentName;
        $this->discriminator="company";
    }

    /**
     * @return mixed
     */
    public function getCurrentName()
    {
        return $this->name;
    }

    /**
     * @param mixed $currentName
     */
    public function setCurrentName($currentName)
    {
        $this->name = $currentName;
    }

    /**
     * @return mixed
     */
    public function getRuc()
    {
        return $this->ruc;
    }

    /**
     * @param mixed $ruc
     */
    public function setRuc($ruc)
    {
        $this->ruc = $ruc;
    }

    public function getFullName() {
        return $this->name;
    }

}