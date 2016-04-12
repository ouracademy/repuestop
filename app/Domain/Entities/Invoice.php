<?php namespace App\Domain\Entities;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Entities\Order;
use App\Domain\Entities\Item;
 
/**
 * @ORM\Entity
 * @ORM\Table(name="invoices")
 */
class Invoice{
    
    /** 
    * @ORM\Id
    * @ORM\JoinColumn(name="party_id", referencedColumnName="id")
    * @ORM\ManyToOne(targetEntity="Party", inversedBy="invoices")
    */
    private $party;

    /** 
    * @ORM\Id
    * @ORM\JoinColumn(name="shipment_id", referencedColumnName="id")
    * @ORM\ManyToOne(targetEntity="Shipment", inversedBy="invoices",cascade={"persist"})
    */ 
    private $shipment;

    /**
    * @ORM\Column(type="decimal") 
    */
    private $amount;

    /** 
    * @ORM\Column(type="datetime") 
    */
    private $date;
    /** 
    * @ORM\Column(type="string") 
    */
    private $specification;
    
    /** 
    * @ORM\Column(type="string") 
    */
    private $status;
     /** 
    * @ORM\Column(type="decimal") 
    */
    private $descuent;

    public function __construct(Item $item, $amount)
    {
        $this->item= $item;
        $this->amount=$amount;
        $this->offeredPrice = $item->getCurrentPrice()*$amount;
    }
    public function setOrder(Order $order){
        $this->order=$order;
    }
   
 
   
}