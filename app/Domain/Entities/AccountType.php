<?php

namespace App\Domain\Entities;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Entities\Account;



/**
 * @ORM\Entity
 * @ORM\Table(name="account_type")
 */
class AccountType {

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
    
    
    /**
    * @ORM\OneToMany(targetEntity="Account", mappedBy="type", cascade={"persist"})
    * @var ArrayCollection|Account[]
    */
    protected $accounts;

    public function __construct($name) {
        $this->name = $name;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

}
