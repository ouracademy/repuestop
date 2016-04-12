<?php

namespace App\Domain\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="instruments")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discriminator", type="string")
 * @ORM\DiscriminatorMap({"1" = "Product"})

 */
abstract class Instrument {

    /**
     * @var integer $id
     * @ORM\Column(name="id", type="integer", unique=true, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="LineOrder", mappedBy="instrument", cascade={"persist"})
     * @var ArrayCollection|LineOrder[]
     */
    protected $orderLines;

    /**
     * @ORM\OneToMany(targetEntity="Account", mappedBy="instrument", cascade={"persist"})
     * @var ArrayCollection|Account[]
     */
    protected $accounts;

    public function __construct() {
        
    }

    public function getId() {
        return $this->id;
    }

    public abstract function getFullName();
}
