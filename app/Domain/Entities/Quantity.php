<?php

namespace App\Domain\Entities;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Entities\Account;
use App\Domain\Entities\Unit;
use App\Domain\Entities\Transference;

/**
 * @ORM\Entity
 * @ORM\Table(name="quantities")
 * @ORM\HasLifecycleCallbacks()
 */
class Quantity {

    /**
     * @var integer $id
     * @ORM\Column(name="id", type="integer", unique=true, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     */
    protected $id;

    /**
     * @ORM\Column(name="amount",type="decimal")
     */
    protected $amount;

    /**
     * @ORM\JoinColumn(name="units_id", referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="Unit", inversedBy="quantities", cascade={"persist"})
     * @var Unit
     */
    protected $unit;

    /**
     * @ORM\OneToMany(targetEntity="Account", mappedBy="quantity", cascade={"persist"})
     * @var ArrayCollection|Account[]
     */
    protected $accounts;
     /**
     * @ORM\OneToMany(targetEntity="Transference", mappedBy="quantity", cascade={"persist"})
     * @var ArrayCollection|Transference[]
     */
    protected $transferences;

    public function __construct($amount, $unit) {
        $this->amount = $amount;
        $this->unit = $unit;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getAmount() {
        return $this->amount;
    }
    public function setAmount($amount){
        $this->amount=$amount;
    }

    public function getFullName() {
        return $this->amount;
    }

}
