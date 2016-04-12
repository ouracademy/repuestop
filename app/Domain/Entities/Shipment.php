<?php namespace App\Domain\Entities;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Entities\Order;

 
/**
 * @ORM\Entity
 * @ORM\Table(name="shipments")
 */
class Shipment{
    
   /**
     * @var integer $id
     * @ORM\Column(name="id", type="integer", unique=true, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     */
    private $id;

    /** 
    * @ORM\OneToOne(targetEntity="Order", inversedBy="shipment",cascade={"persist"})
    * @ORM\JoinColumn(name="orders_id", referencedColumnName="id")
   */ 
    private $order;

    /**
    * @ORM\Column(type="string") 
    */
    private $status;

 

    public function __construct()
    {
   }
   
   
 
   
}