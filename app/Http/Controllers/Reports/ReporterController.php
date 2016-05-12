<?php

namespace App\Http\Controllers\Reports;


use App\Http\Controllers\Controller;
use PDF;

class ReporterController extends Controller
{
      public function index()
    {
        //return PDF::loadFile('http://startbootstrap.com/')->stream('github.pdf'); 
        return \PDF::loadView('InProcess.boletaReview')->download('documentoVenta.pdf');
        // return \PDF::loadView('ruta.vista', $datos)->download('nombre-archivo.pdf');
    }
}
