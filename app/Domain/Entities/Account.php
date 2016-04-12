<?php

namespace App\Domain\Entities;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Entities\AccountType;
use App\Domain\Entities\Party;
use App\Domain\Entities\Quantity;
use App\Domain\Entities\Instrument;

/**
 * @ORM\Entity
 * @ORM\Table(name="accounts")
 */
class Account {

    /**
     * @var integer $id
     * @ORM\Column(name="id", type="integer", unique=true, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     */
    protected $id;

    /**
     * @ORM\JoinColumn(name="instruments_id", referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="Instrument", inversedBy="accounts",cascade={"persist"})
     */
    private $instrument;

    /**
     * @ORM\JoinColumn(name="account_type_id", referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="AccountType", inversedBy="accounts", cascade={"persist"})
     * @var AccountType
     */
    protected $type;

    /**
     * @ORM\JoinColumn(name="quantities_id", referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="Quantity", inversedBy="accounts",cascade={"persist"})
     * @var Quantity
     *
     */
    protected $quantity;

    /**
     * @ORM\JoinColumn(name="parties_id", referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="Party", inversedBy="accounts",cascade={"persist"})
     */
    protected $party;

    /**
     * @ORM\OneToMany(targetEntity="Transference", mappedBy="to", cascade={"persist"})
     * @var ArrayCollection|Transference[]
     */
    protected $deposits;

    /**
     * @ORM\OneToMany(targetEntity="Transference", mappedBy="from", cascade={"persist"})
     * @var ArrayCollection|Transference[]
     */
    protected $withdrawals;

    /**
     * @ORM\Column(name="balance",type="decimal")
     */
    protected $balance;

    public function __construct(Instrument $item, $amount) {
        $this->item = $item;
        $this->amount = $amount;
        $this->offeredPrice = $item->getCurrentPrice() * $amount;
    }

    /*
      public function add(Quantity $quantityToAdd) {
      $amountUpdated = $this->quantity->getAmount() + $quantityToAdd->getAmount();
      $this->quantity->setAmount($amountUpdated);
      }

      public function substract(Quantity $quantityToSubstract) {
      $amountUpdated = $this->quantity->getAmount() - $quantityToSubstract->getAmount();
      $this->quantity->setAmount($amountUpdated);
      }
     * */

    public function add($quantityToAdd) {
        $this->balance= $this->balance + $quantityToAdd; 
    }

    public function substract($quantityToSubstract) {
       $this->balance= $this->balance - $quantityToSubstract; 
  
    }

    public function getId() {
        return $this->id;
    }

    public function getParty() {
        return $this->party;
    }

    public function getType() {
        return $this->type;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function getInstrument() {
        return $this->instrument;
    }

}
