<?php

namespace App\Interfaces\Assembler;

use App\Interfaces\Serializables\Account as DTO;

/**
 *
 * @author pc
 */
class Assembler {
    public $dataOutput;
    public function __construct() {
        $this->dataOutput= array();
    }

    public function assemble($collection, $assembler,$name) {
        $response = array();
        foreach ($collection as $item) {
            array_push($response, $assembler->toDTO($item));
        }
        $this->dataOutput[$name]= $response;
        return $this;
    }
    public function assembleItem($item, $assembler,$name) {
        $this->dataOutput[$name]=$assembler->toDTO($item);
        return $this;
    }
    
    public function getDataInJsonFormat(){
        return json_encode($this->dataOutput);
    }
    public function getData(){
        return $this->dataOutput;
    }


}
