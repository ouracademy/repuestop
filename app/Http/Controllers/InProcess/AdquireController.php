<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repuest;

class AdquireController extends Controller
{
      public function index()
    {
        $repuests = Repuest::all();
        //return $repuests;
        return view('listProducts')
            ->with('repuests',$repuests);

    }
}
