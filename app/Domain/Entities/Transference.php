<?php namespace App\Domain\Entities;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Entities\Order;
use App\Domain\Entities\Account;
use App\Domain\Entities\Quantity;

 
/**
 * @ORM\Entity
 * @ORM\Table(name="transferences")
 * @ORM\HasLifecycleCallbacks()
 */
class Transference{
    /**
     * @var integer $id
     * @ORM\Column(name="id", type="integer", unique=true, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     */
    protected $id;
   
    /**
     *@ORM\JoinColumn(name="accounts_from_id", referencedColumnName="id")
    * @ORM\ManyToOne(targetEntity="Account", inversedBy="withdrawals", cascade={"persist"})
    * @var Account
    */
    protected $from;

      /**
      *@ORM\JoinColumn(name="accounts_to_id", referencedColumnName="id")
    * @ORM\ManyToOne(targetEntity="Account", inversedBy="deposits", cascade={"persist"})
    * @var Account
    */
    protected $to;

    /**
     * @ORM\Column(name="status",type="string")
     */
    protected $status;
    
     /**
    * @ORM\OneToOne(targetEntity="Quantity", mappedBy="Transference", cascade={"persist"})
    * @var Quantity
    */
    protected $amount;
    
    /**
    *@ORM\JoinColumn(name="orders_id", referencedColumnName="id")
    * @ORM\ManyToOne(targetEntity="Order", inversedBy="transferences", cascade={"persist"})
    * @var Order
    */
    protected $order;
      /**
     * @ORM\JoinColumn(name="quantities_id", referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="Quantity", inversedBy="transferences",cascade={"persist"})
     * @var Quantity
     *
     */
    protected $quantity;
    
    public function __construct(Account $from, Account $to,Quantity $quantity,Order $order) {
        $this->to=$to;
        $this->from=$from;
        $this->quantity= $quantity;
        $this->order= $order;
        $this->status = "Test";
    }
    public function setStatus($status){
        $this->status = $status;
    }
    public function setOrder(Order $order){
        $this->order=$order;
    }

  


  
}