<?php

namespace App\Domain\Entities;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Entities\Product;



 /**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="product_detail")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type_id", type="integer")
 * @ORM\DiscriminatorMap({"1" = "Repuest"})
 */

 
 abstract class ProductDetail {
     
    /**
     * @ORM\Id
     * @ORM\JoinColumn(name="id", referencedColumnName="id")
     * @ORM\OneToOne(targetEntity="Product", inversedBy="detail")
     */
    private $product;



    public function __construct() {
        
    }
    abstract public function getFullName();
  
  

}
