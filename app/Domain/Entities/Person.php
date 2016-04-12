<?php namespace App\Domain\Entities;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Entities\Party;


 
/**
 * @ORM\Entity
 * @ORM\Table(name="persons")
 * 
 */
class Person extends Party{

 
    /**
     * @ORM\Column(name="first_name",type="string")
     */
    protected $firstName;
    /**
     * @ORM\Column(name="mother_last_name",type="string")
     */
    protected $motherLastName;
         /**
     * @ORM\Column(name="father_last_name",type="string")
     */
    protected $fatherLastName;

    /**
     * @ORM\Column(type="string")
     * @ORM\Column(name="identification", type="string", unique=true, nullable=false)
     */
    protected $identification;

    /**
     * Persona constructor.
     * @param $firstName
     * @param $lastName
     * @param $identification
     */
    public function __construct($firstName, $fatherLastName,$motherLastName, $identification)
    {
        $this->firstName = $firstName;
        $this->fatherLastName = $fatherLastName;
        $this->motherLastName = $motherLastName;
        $this->identification = $identification;
        $this->discriminator="person";
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getFatherLastName()
    {
        return $this->fatherLastName;
    }
      /**
     * @param mixed $lastName
     */
    public function setFatherLastName($lastName)
    {
        $this->fatherLastName = $lastName;
    }
      /**
     * @return mixed
     */
    public function getMotherLastName()
    {
        return $this->motherLastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setMotherLastName($lastName)
    {
        $this->motherLastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getIdentification()
    {
        return $this->identification;
    }

    /**
     * @param mixed $identification
     */
    public function setIdentification($identification)
    {
        $this->identification = $identification;
    }

    public function getFullName() {
        return $this->firstName.' '.$this->fatherLastName;
    }

}