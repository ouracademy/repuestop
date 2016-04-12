<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repuest;

class RepuestController extends Controller
{
      public function index()
    {
       // $repuests = Repuest::all();
        return view('public/index');
        //dd($repuest);
       // return view('flight.index', ['flights' => $flights]);
    }
}
