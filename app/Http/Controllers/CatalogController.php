<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Application\CatalogService;
class CatalogController extends Controller
{
    private $catalog;
    
    public function __construct(CatalogService $catalog)
    {
        $this->catalog=$catalog;
    }
    public function index(){
       return  $this->catalog->getData(); 
    }
 
     
            
}
