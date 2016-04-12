<?php

namespace App\Http\Controllers\Samples;


use App\Http\Controllers\Controller;

use App\Repuest;
use App\Product;
use App\Type;
use App\Measurement;

class RefactorDBController extends Controller
{
      public function index()
    {
        $repuests = Repuest::where('id','>',0)
                ->where('id','<',200)->get();
              

            $ids=array();
            foreach ($repuests as $r)
            {
                $interior=$r->interior;
                $exterior=$r->exterior;
                $exterior2=$r->exterior2;
                $altura=$r->altura;
                $altura2=$r->altura2;

                $m=Measurement::where('interior',$interior)
                        ->where('exterior',$exterior)
                        ->where('exterior_2',$exterior2)
                        ->where('altura',$altura)
                        ->where('altura_2',$altura2)
                        ->first();

                //$r->update(['medida_id',$m->id]);
                $r->medida_id=$m->id;
                $r->save();
               // array_push($ids,$m->id);

            }
        
       // dd($ids);
       
    }
}
