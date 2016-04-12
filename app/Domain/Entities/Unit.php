<?php

namespace App\Domain\Entities;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Entities\Quantity;
use App\Domain\Entities\LineOrder;

/**
 * @ORM\Entity
 * @ORM\Table(name="units")
 * @ORM\HasLifecycleCallbacks()
 */
class Unit {

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
     * @ORM\Column(type="string",name="symbol")
     */
    protected $symbol;

    /**
     * @ORM\OneToMany(targetEntity="Quantity", mappedBy="unit", cascade={"persist"})
     * @var ArrayCollection|Quantity[]
     */
    protected $quantities;

    /**
     * @ORM\OneToMany(targetEntity="LineOrder", mappedBy="unit", cascade={"persist"})
     * @var ArrayCollection|LineOrder[]
     */
    protected $orderLines;

    public function __construct($name, $symbol) {
        $this->name = $name;
        $this->symbol = $symbol;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getSymbol() 
    {
        return $this->symbol;
    }

}
