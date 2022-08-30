<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use PDF;
// use Barryvdh\DomPDF\PDF;
// use Barryvdh\DomPDF\Facade as Pdf;
use Barryvdh\DomPDF\Facade\Pdf as Pdf;

//$pdf = PDF::loadView('pdf',$tripdetails);

class PdfController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Welcome to Tutsmake.com',
            'date' => date('m/d/Y')
    );
           
        $pdf = Pdf::loadView('pages.pdftest', $data);
     
        return $pdf->download('tutsmake.pdf');
    }
}
