<?php

namespace App\Domain\Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use App\Domain\Entities\Order;
use App\Domain\Entities\Person;
use App\Domain\Entities\Company;
use App\Domain\Entities\Role;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="parties")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discriminator", type="string")
 * @ORM\DiscriminatorMap({"person" = "Person", "company" = "Company"})

 */
abstract class Party {

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
    protected $email;

    /**
     * @ORM\Column(type="string")
     */
    protected $telephone;

    /**
     * @ORM\Column(type="string")
     */
    protected $address;

    /**
     * @ORM\OneToMany(targetEntity="Account", mappedBy="party", cascade={"persist"})
     * @var ArrayCollection|Account[]
     */
    protected $accounts;

    /**
     * @ORM\OneToMany(targetEntity="Order", mappedBy="party", cascade={"persist"})
     * @var ArrayCollection|Order[]
     */
    protected $orders;

    /**
     * @ORM\OneToMany(targetEntity="Role", mappedBy="party", cascade={"persist"})
     * @var ArrayCollection|Role[]
     */
    protected $roles;

    /**
     * Party constructor.
     * @param $email
     * @param $telephone
     * @param $address
     */
    public function __construct($email, $telephone, $address) {
        $this->email = $email;
        $this->telephone = $telephone;
        $this->address = $address;
    }

    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email) {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getTelephone() {
        return $this->telephone;
    }

    /**
     * @param mixed $telephone
     */
    public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    /**
     * @return mixed
     */
    public function getAddress() {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address) {
        $this->address = $address;
    }

    public function addOrder(Order $order) {
        if (!$this->orders->contains($order)) {
            $this->orders->add($order);
        }
    }

    public function getOrders() {
        return $this->orders;
    }

    public function addRole(Role $role) {
        if (!$this->roles->contains($role)) {
            $this->roles->add($role);
        }
    }

    public function getRoles() {
        return $this->roles;
    }

    abstract public function getFullName();
}
