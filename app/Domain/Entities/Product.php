<?php

namespace App\Domain\Entities;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Entities\Measurement;
use App\Domain\Entities\Brand;
use App\Domain\Entities\Type;
use App\Domain\Entities\Instrument;


/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="products")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type_id", type="integer")
 * @ORM\DiscriminatorMap({"1" = "Repuest"})

 */
 class Product extends Instrument {

   

 

    /**
     * @ORM\Column(name="price",type="decimal",nullable=true)
     */
    protected $price;

    /**
     * @ORM\ManyToOne(targetEntity="Measurement", inversedBy="products")
     * @ORM\JoinColumn(name="measurement_id", referencedColumnName="id")
     * @var Measurement
     */
    protected $measurement;
    /**
     * @ORM\ManyToOne(targetEntity="Type", inversedBy="products")
     * @ORM\JoinColumn(name="type_id", referencedColumnName="id")
     * @var Type
     */
    protected $type;
    /**
     * @ORM\ManyToOne(targetEntity="Brand", inversedBy="products")
     * @ORM\JoinColumn(name="brand_id", referencedColumnName="id")
     * @var Brand
     */
    protected $brand;
    
    
    

    public function __construct() {
        
    }

  

    public function setCodeInter($codeInter) {
        $this->codeInter = $codeInter;
    }

    public function getCodeInter() {
        return $this->codeInter;
    }

    public function setCodeOwner($codeOwner) {
        $this->codeOwner = $codeOwner;
    }

    public function getCodeOwner() {
        return $this->codeOwner;
    }

    public function setDesignType($designType) {
        $this->designType = $designType;
    }

    public function getDesignType() {
        return $this->designType;
    }

    public function setGireType($gireType) {
        $this->gireType = $gireType;
    }

    public function getGireType() {
        return $this->gireType;
    }

    public function setApplication($application) {
        $this->application = $application;
    }

    public function getApplication() {
        return $this->application;
    }

    public function setBrand($brand) {
        $this->brand = $brand;
    }

    public function getBrand() {
        return $this->brand;
    }

    public function setIdentification($identification) {
        $this->identification = $identification;
    }

    public function getIdentification() {
        return $this->identification;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function getType() {
        return $this->type;
    }

    public function setBrandApplication($brandApplication) {
        $this->brandApplication = $brandApplication;
    }

    public function getBrandApplication() {
        return $this->brandApplication;
    }

    public function setModelApplication($modelApplication) {
        $this->modelApplication = $modelApplication;
    }

    public function getModelApplication() {
        return $this->modelApplication;
    }
    public function setPrice($price) {
        $this->price = $price;
    }

    public function getCurrentPrice() {
        return $this->price;
    }

    public function getMeasurement() {
        return $this->measurement;
    }

    public function getFullName() {
        return $this->type->getName();
    }

}
