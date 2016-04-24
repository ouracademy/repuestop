<?php

namespace App\Http\Controllers\InProcess;


use App\Http\Controllers\Controller;
use PDF;

class ReporterController extends Controller
{
      public function index()
    {
        return PDF::loadFile('http://startbootstrap.com/')->stream('github.pdf'); 
       // return \PDF::loadView('boletaReview')->download('nombre-archivo.pdf');
        // return \PDF::loadView('ruta.vista', $datos)->download('nombre-archivo.pdf');
    }
}
