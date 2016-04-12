<?php  namespace App\Interfaces\Serializables;

class Account  extends Serializable {

    public $id;
    public $partyFullName;
    public $instrument;
    public $quantity;
    public $type;

    public function __construct($id, $name, $instrument, $quantity, $type) {


        $this->id = $id;
        $this->partyFullName = $name;
        $this->instrument = $instrument;
        $this->quantity  = $quantity;
        $this->type = $type;
    }

}
