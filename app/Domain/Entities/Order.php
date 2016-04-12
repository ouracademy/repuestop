<?php namespace App\Domain\Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use App\Domain\Entities\LineOrder;
use App\Domain\Entities\Party;
 
/**
 * @ORM\Entity
 * @ORM\Table(name="orders")
 * @ORM\HasLifecycleCallbacks()
 */
class Order{
    /**
     * @var integer $id
     * @ORM\Column(name="id", type="integer", unique=true, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     */
    protected $id;
 
    /**
     * @ORM\Column(name="time_charged",type="datetime")
     */
    protected $timeCharged;
 
    /**
     * @ORM\Column(name="time_booked",type="datetime",nullable=true)
     */
    protected $timeBooked;
    
    /**
    * @ORM\ManyToOne(targetEntity="Party", inversedBy="orders")
    * @ORM\JoinColumn(name="parties_id", referencedColumnName="id")
    * @var Party
    */
    protected $party;
    
    /**
    * @ORM\OneToMany(targetEntity="LineOrder", mappedBy="order", cascade={"persist"})
    * @var ArrayCollection|LineOrder[]
    */
    protected $orderLines;
    
     /**
     * @ORM\OneToOne(targetEntity="Shipment", mappedBy="order")
     */
    private $shipment;
      /**
     * @ORM\Column(name="status",type="string")
     */
    protected $status;
    
    
    
 
    public function __construct($timeCharged,$timeBooked,Party $party,$status)
    {
        $party->addOrder($this);
        $this->party=$party;
        $this->setTimeCharged($timeCharged);
        $this->orderLines = new ArrayCollection;
        $this->status=$status;
    }
 
    public function getId()
    {
        return $this->id;
    }
 
    public function getTimeCharged()
    {
        return $this->timeCharged;
    }
 
    public function setTimeCharged($time)
    {
        $this->timeCharged = $time;
    }
    public function getTimeBooked()
    {
        return $this->timeBooked;
    }
    public function setTimeBooked($time)
    {
        $this->timeBooked = $time;
    }
 
 
     public function addLineOrder(LineOrder $lineOrder)
    {
        if(! $this->orderLines->contains($lineOrder)) 
        {
            $lineOrder->setOrder($this);
            $this->orderLines->add($lineOrder);
        }
    }

    public function getOrderLines()
    {
        return $this->orderLines;
    }
    
    public function getParty(){
        return $this->party;
    }
    public function getStatus(){
        return $this->status;
    }
    public function getOrderLinesByStatus($status){
        $collection =  array();
        foreach($this->orderLines as $line){
            if(strcmp($status,$line->getStatus())== 0)
            {
                array_push($collection,$line);
            }  
        }
        return $collection;
    }
}