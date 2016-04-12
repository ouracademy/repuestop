<?php namespace App\Interfaces\Serializables;


class Order extends Serializable
{
    public $nameCustomer;
    public $dateCharged;
    public $status;
    public $dateBooked;
    public $id;
    
    public function __construct($id,$customer,$dateCharged,$dateBooked,$status)
    {
        $this->id = $id;
        $this->nameCustomer=$customer;
        
        $this->dateCharged=$dateCharged;
        
        $this->dateBooked=$dateBooked;
        
        $this->status=$status;  
    }
    
    

    
    
}
