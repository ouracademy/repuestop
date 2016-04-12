<?php namespace App\Domain\Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use App\Domain\Entities\Product;
 
/**
 * @ORM\Entity
 * @ORM\Table(name="measurement")
 * @ORM\HasLifecycleCallbacks()
 */
class Measurement{
    /**
     * @var integer $id
     * @ORM\Column(name="id", type="integer", unique=true, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     */
    protected $id;
 
    /**
     * @ORM\Column(type="decimal")
     */
    protected $interior;
    
    /**
     * @ORM\Column(type="decimal")
     */
    protected $exterior;
    
    /**
     * @ORM\Column(name="exterior_2",type="decimal")
     */
    protected $exterior2;
    
    /**
     * @ORM\Column(name="altura", type="decimal")
     */
    protected $height;
    
    /**
     * @ORM\Column(name="altura_2" ,type="decimal")
     */
    protected $height2;
 
   
    
    /**
    * @ORM\OneToMany(targetEntity="Product", mappedBy="measurement", cascade={"persist"})
    * @var ArrayCollection|Product[]
    */
    protected $products;
 
    public function __construct()
    {
      
        $this->products = new ArrayCollection;
    }
 
    public function getId()
    {
        return $this->id;
    }
 
    public function getInterior()
    {
        return $this->interior;
    }
 
    public function setInterior($interior)
    {
        $this->interior = $interior;
    }
     public function getExterior()
    {
        return $this->exterior;
    }
 
    public function setExterior($exterior)
    {
        $this->exterior = $exterior;
    }
     public function getExterior2()
    {
        return $this->exterior2;
    }
 
    public function setExterior2($exterior2)
    {
        $this->exterior2 = $exterior2;
    }
     public function getHeight()
    {
        return $this->height;
    }
 
    public function setHeight($height)
    {
        $this->height = $height;
    }
      public function getHeight2()
    {
        return $this->height2;
    }
 
    public function setHeight2($height2)
    {
        $this->height2 = $height2;
    }
    
    
    
    
 
  
    public function addProduct(Product $product)
    {
        if(! $this->products->contains($product)) 
        {
            $this->orders->add($product);
        }
    }

    public function getProducts()
    {
        return $this->products;
    }
}