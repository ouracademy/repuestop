<?php namespace App\Domain\Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use App\Domain\Entities\LineOrder;

/**
 * @ORM\Entity
 * @ORM\Table(name="items")
 */
class Item{
    
    /**
     * @ORM\Id 
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue 
    */
    private $id;

    /** @ORM\Column(type="integer",name="code_item")
    */
    private $codeItem;

    /** @ORM\Column(type="decimal",name="current_price")
    */
    private $currentPrice;
    
     /**
    * @ORM\OneToMany(targetEntity="LineOrder", mappedBy="item", cascade={"persist"})
    * @var ArrayCollection|LineOrder[]
    */
    
    protected $orderLines;
    
    public function __construct($codeItem,$currentPrice)
    {
        $this->codeItem = $codeItem;
        $this->currentPrice = $currentPrice;
        $this->orderLines = new ArrayCollection;
    }

    public function getCurrentPrice()
    {
        return $this->currentPrice;
    }
    
    public function addLineOrder(LineOrder $lineOrder)
    {
        if(! $this->orderLinea->contains($lineOrder)) 
        {
            $lineOrder->setOrder($this);
            $this->orderLines->add($lineOrder);
        }
    }

    public function getOrderLines()
    {
        return $this->orderLines;
    }
}