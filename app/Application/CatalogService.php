<?php

namespace App\Application;

use App\Domain\Repository\ProductRepository;
use App\Interfaces\Assembler\ProductAssembler;
use App\Interfaces\Assembler\BrandAssembler;
use App\Domain\Repository\BrandRepository;

class CatalogService {

    private $productRepository;
    private $brandRepository;
    private $assembler;

    public function __construct(ProductRepository $repository, BrandRepository $brandRepository, ProductAssembler $assembler) {
        $this->productRepository = $repository;
        $this->brandRepository = $brandRepository;
        $this->assembler = $assembler;
    }

    private function getAllProducts() {
        return $this->assemble($this->productRepository->getAll(),new ProductAssembler());
    }

    private function getAllBrands() {
        return $this->assemble($this->brandRepository->getAll(),new BrandAssembler());
    }

    public function getData() {
        $data =  array(
            'products' => $this->getAllProducts(),
            'brands'=>$this->getAllBrands()
        );
        return json_encode($data);
    }

    private function assemble($collection, $assembler) {
        $response = array();
        foreach ($collection as $item) {
            array_push($response, $assembler->toDTO($item));
        }
        return $response;
    }

}
