<?php

namespace App\Domain\Entities;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Entities\Measurement;
use App\Domain\Entities\ProductDetail;


/**
 * @ORM\Entity
 * @ORM\Table(name="detail_retens")
 * @ORM\HasLifecycleCallbacks()
 */
 
class Repuest extends ProductDetail{

 

    /**
     * @ORM\Column(name="code_inter",type="string")
     */
    protected $codeInter;

    /**
     * @ORM\Column(name="code_owner",type="string")
     */
    protected $codeOwner;

    /**
     * @ORM\Column(name="design_type",type="string",nullable=true)
     */
    protected $designType;

    /**
     * @ORM\Column(name="gire_type",type="string",nullable=true)
     */
    protected $gireType;

    /**
     * @ORM\Column(name="application",type="string",nullable=true)
     */
    protected $application;

    /**
     * @ORM\Column(name="brand_application",type="string",nullable=true)
     */
    protected $brandApplication;

    /**
     * @ORM\Column(name="model_application",type="string",nullable=true)
     */
    protected $modelApplication;

 

    /**
     * @ORM\Column(name="identification",type="string",nullable=true)
     */
    protected $identification;

    /**
     * @ORM\Column(name="type",type="string",nullable=true)
     */
    protected $type;




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

    public function getFullName() {
        $fullName = "Reten"." ".$this->codeOwner;
        if (!is_null($this->codeInter)) {
            $fullName = $fullName . "\\" . $this->codeInter;
        }
        return $fullName;
    }

}
