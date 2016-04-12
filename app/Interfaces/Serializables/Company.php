<?php

namespace App\Interfaces\Serializables;

class Company extends Serializable {

    public $id;
    public $name;
    public $ruc;
    public $email;
    public $telephone;
    public $address;

    public function __construct($id, $name, $ruc,$email, $telephone, $address) {


        $this->id = $id;
        $this->name = $name;
        $this->ruc = $ruc;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->address = $address;
    }

}
