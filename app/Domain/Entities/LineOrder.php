<?php

namespace App\Domain\Entities;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Entities\Order;
use App\Domain\Entities\Instrument;
use App\Domain\Entities\Unit;

/**
 * @ORM\Entity
 * @ORM\Table(name="order_instrument")
 */
class LineOrder {

    /**
     * @ORM\Id
     * @ORM\JoinColumn(name="orders_id", referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="Order", inversedBy="orderLines")
     */
    private $order;

    /**
     * @ORM\Id
     * @ORM\JoinColumn(name="instrument_id", referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="Instrument", inversedBy="orderLines",cascade={"persist"})
     */
    private $instrument;

    /**
     * @ORM\Column(type="integer",name="amount") 
     */
    private $quantity;
     /**
     * @ORM\JoinColumn(name="units_id", referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="Unit", cascade={"persist"})
     * @var Unit
     */
    protected $unit;

    /**
     * @ORM\Column(type="decimal",name="offered_price") 
     */
    private $offeredPrice;

    /**
     * @ORM\Column(type="string",name="status") 
     */
    private $status;

    /**
     * @ORM\Column(type="string",name="type") 
     */
    private $type;

    public function __construct(Instrument $item, $quantity, $type,$unit) {
        $this->instrument = $item;
        $this->quantity = $quantity;
        $this->offeredPrice = $item->getCurrentPrice() * $quantity;
        $this->type = $type;
        $this->unit=$unit;
    }

    public function setOrder(Order $order) {
        $this->order = $order;
    }

    public function getType() {
        return $this->type;
    }

    public function getInstrument() {
        return $this->instrument;
    }
    public function getOfferedPrice(){
        return $this->offeredPrice;
                
    }

    public function getQuantity() {
        return $this->quantity;
    }
    public function getStatus(){
        return $this->status;
    }
    public function getUnit(){
        return $this->unit;
    }

}
