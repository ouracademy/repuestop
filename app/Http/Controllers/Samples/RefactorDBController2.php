<?php

namespace App\Http\Controllers\Samples;


use App\Http\Controllers\Controller;

use App\Repuest;
use App\Product;
use App\Type;
use App\Measurement;

class RefactorDBController2 extends Controller
{
    private $final;
    private $inicio;
    public function __construct() {
        $this->inicio=2459;
    }
      public function index()
    {
      
         $this->tramos(400);
  
    }
    public function tramos($quantity){
        $this->final=$this->inicio+ $quantity;
                
          $repuests = Product::where('id','>=',$this->inicio)
                ->where('id','<',$this->final)->get();
           $ids=array();
            foreach ($repuests as $r)
            {
                $brand=$r->brand;
              

                $m=Type::where('name',trim($brand))
                       
                        ->first();

              $r->brand_id=$m->id;
                $r->save();
               array_push($ids,$m->id);

            }
            $this->inicio= $this->final;
            
            dd($ids);
    }
}
