<?php  namespace App\Interfaces\Serializables;

class Brand  extends Serializable {

    public $name;
    public $id;

    public function __construct($id, $name) {

        $this->id = $id;
        $this->name = $name;
     
    }

}
