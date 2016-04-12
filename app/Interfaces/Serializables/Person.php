<?php

namespace App\Interfaces\Serializables;

class Person extends Serializable {

    public $id;
    public $firstname;
    public $motherLastname;
    public $fatherLastname;
    public $dni;
    public $email;
    public $telephone;
    public $address;

    public function __construct($id,  $firstname,$fatherLastname, $motherLastname,  $dni, $email, $telephone, $address) {


        $this->id = $id;
        $this->firstname = $firstname;
        $this->motherLastname = $motherLastname;
        $this->fatherLastname = $fatherLastname;
        $this->dni = $dni;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->address = $address;
    }

}
