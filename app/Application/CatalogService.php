<?php

namespace App\Application;

use App\Domain\Repository\InstrumentRepository;
use App\Interfaces\Assembler\BrandAssembler;
use App\Interfaces\Assembler\InstrumentAssembler;
use App\Domain\Repository\BrandRepository;

class CatalogService {

    private $productRepository;
    private $brandRepository;
    private $assembler;

    public function __construct(InstrumentRepository $repository, 
                                BrandRepository $brandRepository
                                ) {
        $this->productRepository = $repository;
        $this->brandRepository = $brandRepository;
    }

    private function getAllProducts() {
        return $this->assemble($this->productRepository->getAll(),new InstrumentAssembler());
    }

    private function getAllBrands() {
        return $this->assemble($this->brandRepository->getAll(),new BrandAssembler());
    }

    public function getData() {
        $data =  array(
            'products' => $this->getAllProducts(),
            'brands'=>$this->getAllBrands()
        );
        return $data;
    }

    private function assemble($collection, $assembler) {
        $response = array();
        foreach ($collection as $item) {
            array_push($response, $assembler->toDTO($item));
        }
        return $response;
    }

}
